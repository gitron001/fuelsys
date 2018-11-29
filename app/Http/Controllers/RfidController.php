<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rfid;
use App\User;

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
        $users = User::pluck('name','id')->all();
        return view('/admin/rfids/create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rfid::create($request->all());
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
        $rfid = Rfid::findOrFail($id);
        $users = User::pluck('name','id')->all();
        return view('/admin/rfids/edit',compact('rfid','users'));
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
