<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGroup;

class ProductGroupController extends Controller
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

        $products_group = new ProductGroup;

        if($request->get('search')){
            $products_group = $products_group->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('state_code','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $products_group = $products_group->orderBy('name','ASC')
                                ->paginate(15);
            return view('/admin/products_group/home',compact('products_group'));
        } else {
            $products_group = $products_group->orderBy($sort_by,$sort_type)
                                ->paginate(15);
            return view('/admin/products_group/table_data',compact('products_group'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/products_group/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductGroup::create($request->all());
        session()->flash('info','Success');

        return redirect('/admin/products_group');
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
        $product_group = ProductGroup::find($id);
        return view('/admin/products_group/edit',compact('product_group'));
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
        $product_group = ProductGroup::findOrFail($id);
        $product_group->update($request->all());
        
        session()->flash('info','Success');

        return redirect('/admin/products_group');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_group = ProductGroup::findOrFail($id);
        $product_group->delete();
        session()->flash('info','Success');

        return redirect('/admin/products_group');
    }
}
