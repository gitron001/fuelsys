<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use App\Models\Tank;
use App\Models\Dispaneser;
use Illuminate\Http\Request;

class PumpsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $tanks = Tank::all();
        $dispanesers = Dispaneser::all();

        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $pumps      = new Pump;

        if($request->get('search')){
            $pumps  = $pumps->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            });
        }

        if($request->get('tank')){
            $pumps  = $pumps->where('tank_id',$request->get('tank'));
        }

        if($request->get('dispaneser')){
            $pumps  = $pumps->where('channel_id',$request->get('dispaneser'));
        }

        if($request->ajax() == false){
            $pumps  = $pumps->orderBy('channel_id','ASC')->orderBy('name', 'ASC')
                        ->paginate(15);
            return view('/admin/nozzle/home',compact('pumps','tanks','dispanesers'));
        } else {
            if($request->get('sortby') == 'name'){
                $pumps  = $pumps->orderBy('channel_id','ASC')->orderBy('name', 'ASC')
                        ->paginate(15);
            }else{
                $pumps  = $pumps->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            }
            return view('/admin/nozzle/table_data',compact('pumps','tanks','dispanesers'))->render();
        }
    }

    public function create()
    {
        $tanks = Tank::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','channel_id as id')->all();

        return view('/admin/nozzle/create',compact('tanks','dispanesers'));
    }

    public function store(Request $request)
    {
        $pump = Pump::create($request->all());

        session()->flash('info','Success');

        return redirect('admin/nozzle/' . $pump->id . '/edit');
    }

    public function edit($id)
    {
        $pump = Pump::findOrFail($id);
        $tanks = Tank::pluck('name','id')->all();
        $dispanesers = Dispaneser::pluck('name','channel_id as id')->all();

        return view('/admin/nozzle/edit',compact('pump','tanks','dispanesers'));
    }

    public function update(Request $request, $id)
    {
        $pump = Pump::findOrFail($id);

        $pump->update($request->all());

        session()->flash('info','Success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $pump = Pump::findOrFail($id);
        $pump->delete();
        session()->flash('info','Success');

        return redirect('/admin/nozzle');
    }

    public function delete_all(Request $request)
    {
        $pump_id_array = $request->input('id');
        $pump = Pump::whereIn('id',$pump_id_array);
        if($pump->delete()){
            echo "Data deleted";
        }
    }
}
