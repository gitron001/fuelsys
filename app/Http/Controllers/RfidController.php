<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;
use App\Models\User;
use App\Models\Products;
use App\Models\Branch;
use App\Models\RFID_Discounts;
use App\Models\RFID_Limits;
use App\Models\Company;
use DB;

class RfidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfids = Rfid::all();
        return view('/admin/rfids/home',compact('rfids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users      = User::pluck('name','id')->all();
        $products   = Products::pluck('name','id')->all();
        $branches   = Branch::pluck('name','id')->all();
        $companies  = Company::pluck('name','id')->all();

        return view('/admin/rfids/create',compact('users','products','branches','companies'));
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

        $id = Rfid::insertGetId([
            'rfid'          => $request->input('rfid'),
            'rfid_name'     => $request->input('rfid_name'),
            'user_id'       => $request->input('user_id'),
            'company_id'    => $request->input('company_id') ? : 0,
            'one_time_limit'=> $request->input('one_time_limit') ? : 0,
            'plates'        => $request->input('plates') ? : 0,
            'vehicle'        => $request->input('vehicle') ? : 0,
            'status'        => 1,
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
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

        return redirect('/admin/rfids');
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
        $rfid           = Rfid::findOrFail($id);
        $users          = User::pluck('name','id')->all();
        $branches       = Branch::pluck('name','id')->all();
        $products       = Products::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();
        $rfid_limits    = RFID_Limits::where('rfid_id',$id)->get();
        $rfid_discounts = RFID_Discounts::where('rfid_id',$id)->get();

        return view('/admin/rfids/edit',compact('rfid','users','companies','rfid_limits','rfid_discounts','branches','products'));
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

        $rfid = Rfid::findOrFail($id);
        $rfid->update($request->all());

        if(!empty($request->input('product'))){
            // Update Product Discount 
            for($i=0; $i < count($request->input('product')); $i++) { 

                RFID_Discounts::where('rfid_id', $id)
                    ->where('id',$request->input('hidden_input_product')[$i])
                    ->update(['discount' => $request->input('discount')[$i],'product_id' => $request->input('product')[$i]]);
            }
        }

        if(!empty($request->input('branch'))){
            // Update Branch Limit
            for($i=0; $i < count($request->input('branch')); $i++) { 

                RFID_Limits::where('rfid_id', $id)
                    ->where('id',$request->input('hidden_input_branch')[$i])
                    ->update(['limit' => $request->input('limit')[$i],'branch_id' => $request->input('branch')[$i]]);
            }
        }

        // Add new Discount
        if(($request->input('new_product')[0] != 0) && (!empty($request->input('new_discount')[0]))){
            foreach(array_combine($request->input('new_product'), $request->input('new_discount')) as $product => $discount){

                $rfid_product = new RFID_Discounts();

                $rfid_product->rfid_id      = $id;
                $rfid_product->product_id   = $product;
                $rfid_product->discount     = $discount;
                $rfid_product->save();
            }
        }

        // Add new Limit
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

        return redirect('/admin/rfids');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rfid = Rfid::findOrFail($id);
        $rfid->delete();
        session()->flash('info','Success');

        return redirect('/admin/rfids');
    }
}
