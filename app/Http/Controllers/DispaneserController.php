<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispaneser;
use App\Models\PFC;

class DispaneserController extends Controller
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

        $dispanesers = new Dispaneser;

        if($request->get('search')){
            $dispanesers = $dispanesers->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $dispanesers = $dispanesers->orderBy('name','ASC')
                            ->paginate(15);
            return view('/admin/dispanesers/home',compact('dispanesers'));
        } else {
            $dispanesers = $dispanesers->orderBy($sort_by,$sort_type)
                            ->paginate(15);
            return view('/admin/dispanesers/table_data',compact('dispanesers'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pfc  = PFC::pluck('name','id')->all();
        return view('/admin/dispanesers/create',compact('pfc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dispaneser = Dispaneser::create($request->all());
        session()->flash('info','Success');

        return redirect('admin/dispanesers/' . $dispaneser->id . '/edit');
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
        $dispaneser = Dispaneser::findOrFail($id);
        return view('/admin/dispanesers/edit',compact('dispaneser','pfc'));
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

        return redirect()->back();
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

    public function delete_all(Request $request)
    {
        $dispaneser_id_array = $request->input('id');
        $dispaneser = Dispaneser::whereIn('id',$dispaneser_id_array);
        if($dispaneser->delete()){
            echo "Data deleted";
        }
    }
}
