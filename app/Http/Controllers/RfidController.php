<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rfid;
use App\Models\User;
use App\Models\Product;
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
        $products   = Product::pluck('name','id')->all();
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
            'car_id'        => $request->input('car_id') ? : 0,
            'status'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
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

        return redirect('/admin/rfids');

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
        $rfid       = Rfid::findOrFail($id);
        $users      = User::pluck('name','id')->all();
        $companies  = Company::pluck('name','id')->all();

        return view('/admin/rfids/edit',compact('rfid','users','companies'));
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
