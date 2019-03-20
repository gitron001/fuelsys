<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PFC;

class PFCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pfc   = PFC::orderBy('created_at', 'desc')->paginate(15);

        return view('/admin/pfc/home',compact('pfc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/pfc/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PFC::create($request->all());
        session()->flash('info','Success');

        return redirect('/admin/pfc');
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
        $pfc = PFC::findOrFail($id);
        return view('/admin/pfc/edit',compact('pfc'));
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
        $pfc = PFC::findOrFail($id);
        $pfc->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/pfc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pfc = PFC::findOrFail($id);
        $pfc->delete();
        session()->flash('info','Success');

        return redirect('/admin/pfc');
    }
}
