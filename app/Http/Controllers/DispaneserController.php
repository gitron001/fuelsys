<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispaneser;

class DispaneserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispanesers = Dispaneser::paginate(15);
        return view('/admin/dispanesers/home',compact('dispanesers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/dispanesers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dispaneser::create($request->all());
        session()->flash('info','Success');

        return redirect('/admin/dispanesers');
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
        $dispaneser = Dispaneser::findOrFail($id);
        return view('/admin/dispanesers/edit',compact('dispaneser'));
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
        $dispaneser = Dispaneser::findOrFail($id);
        $dispaneser->update($request->all());
        session()->flash('info','Success');

        return redirect('/admin/dispanesers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispaneser = Dispaneser::findOrFail($id);
        $dispaneser->delete();
        session()->flash('info','Success');

        return redirect('/admin/dispanesers');
    }
}
