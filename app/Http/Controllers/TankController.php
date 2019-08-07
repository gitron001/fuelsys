<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tank;
use App\Models\Products;

class TankController extends Controller
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

        $tanks      = Tank::where('status',1);

        if($request->get('search')){
            $tanks  = $tanks->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $tanks  = $tanks->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/tanks/home',compact('tanks'));
        } else {
            $tanks  = $tanks->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/tanks/table_data',compact('tanks'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::pluck('name','id')->all();
        return view('/admin/tanks/create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tank::create($request->all());

        session()->flash('info','Success');

        return redirect('/admin/tanks');
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
        $tank = Tank::findOrFail($id);
        $products = Products::pluck('name','id')->all();
        
        return view('/admin/tanks/edit',compact('tank','products'));
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
        $tank = Tank::findOrFail($id);

        $tank->update($request->all());

        session()->flash('info','Success');

        return redirect('/admin/tanks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tank = Tank::findOrFail($id);
        $tank->delete();
        session()->flash('info','Success');

        return redirect('/admin/tanks');
    }
}
