<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductGroup;
use App\Models\PFC;

class ProductController extends Controller
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

        $products   = new Products;

        if($request->get('search')){
            $products = $products->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('price','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $products = $products->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/products/home',compact('products'));
        } else {
            $products = $products->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/products/table_data',compact('products'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pfc            = PFC::pluck('name','id')->all();
        $product_group  = ProductGroup::pluck('name','id')->all();
        return view('/admin/products/create',compact('pfc','product_group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Products::create($request->all());
        session()->flash('info','Success');

        return redirect('/admin/products');
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
        $pfc  = PFC::pluck('name','id')->all();
        $product = Products::findOrFail($id);
        $product_group  = ProductGroup::pluck('name','id')->all();
        return view('/admin/products/edit',compact('product','pfc','product_group'));
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
        $product = Products::findOrFail($id);
        $product->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();
        session()->flash('info','Success');

        return redirect('/admin/products');
    }
}
