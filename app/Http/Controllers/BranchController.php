<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
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

        $branches = Branch::where('status',1);

        if($request->get('search')){
            $branches = $branches->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('address','like','%'.$search.'%');
                $query->orWhere('city','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $branches = $branches->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/branches/home',compact('branches'));
        } else {
            $branches = $branches->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/branches/table_data',compact('branches'))->render();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/branches/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Branch::create($request->all());
        session()->flash('info','Success');

        return redirect('/admin/branches');
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
        $branch = Branch::findOrFail($id);
        return view('/admin/branches/edit',compact('branch'));
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
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/branches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        session()->flash('info','Success');

        return redirect('/admin/branches');
    }
}
