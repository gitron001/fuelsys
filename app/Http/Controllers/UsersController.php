<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Products;
use App\Models\Branch;
use App\Models\RFID_Discounts;
use Illuminate\Support\Facades\Input;
use App\Models\RFID_Limits;
use App\Models\Company;
use DB;
use Hash;
use Excel;

class UsersController extends Controller
{
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

        $users      = Users::whereIn('status',array(1, 2));

        if($request->get('search')){
            $users  = $users->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('email','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $users  = $users->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/users/home',compact('users'));
        } else {
            $users  = $users->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/users/table_data',compact('users'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products   = Products::pluck('name','id')->all();
        $branches   = Branch::pluck('name','id')->all();
        $companies  = Company::pluck('name','id')->all();

        return view('/admin/users/create',compact('products','branches','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayDiscount = array_values($request->input('discount'))[0];

        $firstValueOfArrayBranch  = array_values($request->input('branch'))[0];
        $firstValueOfArrayLimit   = array_values($request->input('limit'))[0];

        $password = $request->input('password');

        $id = Users::insertGetId([
            'rfid'          => $request->input('rfid'),
            'name'          => $request->input('name'),
            'email'         => $request->input('email'),
            'company_id'    => $request->input('company_id') ? : 0,
            'one_time_limit'=> $request->input('one_time_limit') ? : 0,
            'plates'        => $request->input('plates') ? : 0,
            'vehicle'       => $request->input('vehicle') ? : 0,
            'type'          => $request->input('type'),
            'password'      => Hash::make($password),
            'status'        => 1,
            'created_at'    => now()->timestamp,
            'updated_at'    => now()->timestamp
        ]);

        if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayDiscount)){
            foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){

                $rfid_product = new RFID_Discounts();

                $rfid_product->rfid_id      = $id;
                $rfid_product->product_id   = $product;
                $rfid_product->discount     = $discount;
                $rfid_product->save();
            }
        }

        if($firstValueOfArrayBranch !== 0 && !empty($firstValueOfArrayLimit)){
            foreach(array_combine($request->input('branch'), $request->input('limit')) as $branch => $limit){

                $rfid_branch = new RFID_Limits();

                $rfid_branch->rfid_id      = $id;
                $rfid_branch->branch_id    = $branch;
                $rfid_branch->limit        = $limit;
                $rfid_branch->save();
            }
        }

        session()->flash('info','Success');

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user           = Users::findOrFail($id);
        $branches       = Branch::pluck('name','id')->all();
        $products       = Products::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();
        $rfid_limits    = RFID_Limits::where('rfid_id',$id)->get();
        $rfid_discounts = RFID_Discounts::where('rfid_id',$id)->get();

        return view('/admin/users/edit',compact('user','companies','rfid_limits','rfid_discounts','branches','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $user = Users::findOrFail($id);
        
        $password = $request->input('password');

        $user->rfid         = $request->input('rfid');
        $user->name         = $request->input('name');
        $user->email        = $request->input('email');
        $user->company_id   = $request->input('company_id');
        $user->plates       = $request->input('plates');
        $user->status       = $request->input('status');
        $user->vehicle      = $request->input('vehicle');
        $user->type         = $request->input('type');
        $user->password     = bcrypt($password);
        $user->updated_at   = now()->timestamp;
        $user->update();

        // DELETE Discount
        if(empty($request->input('deleteDiscount'))){
            RFID_Discounts::where('rfid_id',$id)->delete();
        }else{
            RFID_Discounts::where('rfid_id',$id)->whereNotIn('id',$request->input('deleteDiscount'))->delete();
        }

        // DELETE Limit
        if(empty($request->input('deleteLimit'))){
            RFID_Limits::where('rfid_id',$id)->delete();
        }else{
            RFID_Limits::where('rfid_id',$id)->whereNotIn('id',$request->input('deleteLimit'))->delete();
        }

        // UPDATE Discount(Product - Discount)
        if(!empty($request->input('product'))){
            // Update Product Discount 
            for($i=0; $i < count($request->input('product')); $i++) { 

                RFID_Discounts::where('rfid_id', $id)
                    ->where('id',$request->input('hidden_input_product')[$i])
                    ->update(['discount' => $request->input('discount')[$i],'product_id' => $request->input('product')[$i]]);
            }
        }

        // UPDATE Limit(Branch - Limit)
        if(!empty($request->input('branch'))){
            // Update Branch Limit
            for($i=0; $i < count($request->input('branch')); $i++) { 

                RFID_Limits::where('rfid_id', $id)
                    ->where('id',$request->input('hidden_input_branch')[$i])
                    ->update(['limit' => $request->input('limit')[$i],'branch_id' => $request->input('branch')[$i]]);
            }
        }

        // ADD new Discount
        if(($request->input('new_product')[0] != 0) && (!empty($request->input('new_discount')[0]))){
            foreach(array_combine($request->input('new_product'), $request->input('new_discount')) as $product => $discount){

                $rfid_product = new RFID_Discounts();

                $rfid_product->rfid_id      = $id;
                $rfid_product->product_id   = $product;
                $rfid_product->discount     = $discount;
                $rfid_product->save();
            }
        }

        // ADD new Limit
        if(($request->input('new_branch')[0] != 0) && (!empty($request->input('new_limit')[0]))){
            foreach(array_combine($request->input('new_branch'), $request->input('new_limit')) as $branch => $limit){

                $rfid_branch = new RFID_Limits();

                $rfid_branch->rfid_id      = $id;
                $rfid_branch->branch_id    = $branch;
                $rfid_branch->limit        = $limit;
                $rfid_branch->save();
            }
        }
        
        session()->flash('info','Success');

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::where('id', $id)->update(['status' => 3]);
        session()->flash('info','Success');

        return redirect('/admin/users');
    }

    public function uploadExcel(){

        $products   = Products::pluck('name','id')->all();

        return view('/admin/users/upload_excel',compact('products'));
    }

    public function importExcel(Request $request){
        $this->validate($request, [
            'upload_file' => 'required|mimes:xls,xlsx'
        ]);

        $file       = Input::file('upload_file');
        $file_name  = $file->getRealPath();
        $results    = Excel::load($file_name, function($reader){
            $reader->all();
        })->get()->toArray();
        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayDiscount = array_values($request->input('discount'))[0];
        $type           = $request->input('type');
        $product        = $request->input('product');
        $discount       = $request->input('discount');

        
        foreach ($results as $result) {
            $rfid = substr($result['nr.karteles'],4);
            if(strpos($rfid, 'A')){
                $rfid = str_replace('A',1,$rfid);
            } else if(strpos($rfid, 'B')){
                $rfid = str_replace('B',2,$rfid);
            } else if(strpos($rfid, 'C')){
                $rfid = str_replace('C',3,$rfid);
            }

            $id = Users::insertGetId([
                'name'              => $result['emri'],
                'surname'           => $result['mbiemri'],
                'residence'         => $result['vendbanimi'],
                'contact_number'    => $result['nr.kontaktues'],
                'rfid'              => $rfid,
                'type'              => $type,
                'application_date'  => str_replace('.', '-', $result['data']),
                'created_at'        => now()->timestamp,
                'updated_at'        => now()->timestamp
            ]);

            if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayDiscount)){
                foreach(array_combine($request->input('product'), $request->input('discount')) as $product => $discount){
    
                    $rfid_product = new RFID_Discounts();
    
                    $rfid_product->rfid_id      = $id;
                    $rfid_product->product_id   = $product;
                    $rfid_product->discount     = $discount;
                    $rfid_product->save();
                }
            }
        }

        session()->flash('info','Success');

        return redirect('/admin/users');
    }
}
