<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyCreateRequest;
use App\Models\Company;
use App\Models\Products;
use App\Models\Branch;
use App\Models\CompanyDiscount;
use App\Models\CompanyLimit;
use App\Jobs\SendTransactionEmail;

class CompaniesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $companies  = Company::whereIn('status',array(1, 2));

        if($request->get('search')){
            $companies = $companies->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('fis_number','like','%'.$search.'%');
                $query->orWhere('contact_person','like','%'.$search.'%');
                $query->orWhere('tel_number','like','%'.$search.'%');
                $query->orWhere('email','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $companies = $companies->orderBy('name','ASC')
                                ->paginate(15);
            return view('admin/companies/home',compact('companies'));
        } else {
            $companies = $companies->orderBy($sort_by,$sort_type)
                                ->paginate(15);
            return view('/admin/companies/table_data',compact('companies'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $products   = Products::pluck('name','id')->all();
        $branches   = Branch::pluck('name','id')->all();

        return view('admin/companies/create',compact('products','branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request) {
        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayDiscount = array_values($request->input('discount'))[0];

        //$firstValueOfArrayBranch  = array_values($request->input('branch'))[0];
        //$firstValueOfArrayLimit   = array_values($request->input('limit'))[0];

        if($request->input('has_limit') == 1){
            $limit_left = $request->input('limits') - $request->input('starting_balance');
        }else{
            $limit_left = 0;
        }

        // Save photo to public/company folder
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $image->move(public_path('images/company'),$fileNameToStore);
        }else {
            $fileNameToStore = NULL;
        }


        $id = Company::insertGetId([
            'name'              => $request->input('name'),
            'fis_number'        => $request->input('fis_number'),
            'bis_number'        => $request->input('bis_number'),
            'tax_number'        => $request->input('tax_number'),
            'res_number'        => $request->input('res_number'),
            'tel_number'        => $request->input('tel_number'),
            'email'             => $request->input('email'),
            'send_email'        => $request->input('send_email'),
            'address'           => $request->input('address'),
            'starting_balance'  => $request->input('starting_balance') ? : 0,
            'contact_person'    => $request->input('contact_person'),
            'city'              => $request->input('city'),
            'images'            => $fileNameToStore,
            'country'           => $request->input('country'),
            'status'            => $request->input('status'),
            'limits'            => $request->input('limits') ? : 0,
            'has_receipt'       => $request->input('has_receipt') ? : 0,
            'has_receipt_nr'    => $request->input('has_receipt_nr') ? : 0,
            'has_limit'         => $request->input('has_limit'),
            'limit_left'        => $limit_left,
            'on_transaction'    => $request->input('on_transaction'),
            'send_email'        => $request->input('send_email'),
            'daily_at'       	=> $request->input('daily_at'),
            'monthly_report'    => $request->input('monthly_report'),
            'display_users_by_plates' => $request->input('display_users_by_plates'),
            'created_at'        => now()->timestamp,
            'updated_at'        => now()->timestamp
        ]);



        if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayDiscount)){
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){

                $company_product = new CompanyDiscount();

                $company_product->company_id    = $id;
                $company_product->product_id    = $product;
                $company_product->discount      = $discount;
                $company_product->save();
            }
        }
        /*
        if($firstValueOfArrayBranch !== 0 && !empty($firstValueOfArrayLimit)){
            foreach(array_combine($request->input('branch'), $request->input('limit')) as $branch => $limit){

                $company_branch = new CompanyLimit();

                $company_branch->company_id     = $id;
                $company_branch->branch_id      = $branch;
                $company_branch->limit          = $limit;
                $company_branch->save();
            }
        }
        */
        session()->flash('info','Success');

        return redirect('admin/companies/' . $id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  {
        $company            = Company::findOrFail($id);
        $branches           = Branch::pluck('name','id')->all();
        $products           = Products::pluck('name','id')->all();
        $companies          = Company::pluck('name','id')->all();
        $company_limits     = CompanyLimit::where('company_id',$id)->get();
        $company_discounts  = CompanyDiscount::where('company_id',$id)->get();

        return view('admin/companies/edit',compact('company','company_limits','company_discounts','branches','products','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $company = Company::findOrFail($id);
			//dd($request->all());
        // Edit photo if exist to public/company folder
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $image->move(public_path('images/company'),$fileNameToStore);
        }

        if($request->hasFile('image')){
            $company->images = $fileNameToStore;
        }

        if($company->has_limit == 1){
            $new_limit   = $request->input('limits') - $request->input('starting_balance');
            $old_limit   =  $company->limits - $company->starting_balance;
            $limit_left  =  $company->limit_left + ($new_limit - $old_limit);
        }else{
            $limit_left = 0;
        }
        $request->merge(['limit_left' => $limit_left]);

        $company->update($request->all());

        // DELETE Discount
        //if(empty($request->input('deleteDiscount'))){
            CompanyDiscount::where('company_id',$id)->delete();
        //}else{
            //CompanyDiscount::where('company_id',$id)->whereNotIn('id',$request->input('deleteDiscount'))->delete();
        //}

        // DELETE Limit
        //if(empty($request->input('deleteLimit'))){
        //    CompanyLimit::where('company_id',$id)->delete();
        //}else{
        //    CompanyLimit::where('company_id',$id)->whereNotIn('id',$request->input('deleteLimit'))->delete();
        //}

        // UPDATE Discount(Product - Discount)
        /*if(!empty($request->input('product'))){
            // Update Product Discount
            for($i=0; $i < count($request->input('product')); $i++) {

                CompanyDiscount::where('company_id', $id)
                    ->where('id',$request->input('hidden_input_product')[$i])
                    ->update(['discount' => $request->input('discount')[$i],'product_id' => $request->input('product')[$i]]);
            }
        }
        // UPDATE Limit(Branch - Limit)
        if(!empty($request->input('branch'))){
            // Update Branch Limit
            for($i=0; $i < count($request->input('branch')); $i++) {

                CompanyLimit::where('company_id', $id)
                    ->where('id',$request->input('hidden_input_branch')[$i])
                    ->update(['limit' => $request->input('limit')[$i],'branch_id' => $request->input('branch')[$i]]);
            }
        }
        */
        // ADD new Discount
        if(($request->input('product')[0] != 0) && (!empty($request->input('discount')[0]))){
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){

                if(!empty($product) && !empty($discount) && $discount !== 0){
                    $company_product = new CompanyDiscount();

                    $company_product->company_id    = $id;
                    $company_product->product_id    = $product;
                    $company_product->discount      = $discount;
                    $company_product->save();
                }
            }
        }
        /*
        // ADD new Limit
        if(($request->input('new_branch')[0] != 0) && (!empty($request->input('new_limit')[0]))){
            foreach(array_combine($request->input('new_branch'), $request->input('new_limit')) as $branch => $limit){

                $company_branch = new CompanyLimit();

                $company_branch->company_id     = $id;
                $company_branch->branch_id      = $branch;
                $company_branch->limit          = $limit;
                $company_branch->save();
            }
        }
        */
        session()->flash('info','Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Company::where('id',$id)->update(['status' => 3]);

        session()->flash('info','Success');

        return redirect('/admin/companies');
    }

	public function send_email($id){
		$recepit = new SendTransactionEmail($id, 'idealbakija@gmail.com');
		dispatch($recepit);
    }

    public function delete_all(Request $request)
    {
        $company_id_array = $request->input('id');
        $company = Company::whereIn('id',$company_id_array);
        if($company->update(['status' => 3])){
            echo "Data deleted";
        }
    }
}
