<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PFC;
use App\Models\RunninProcessModel as Process;
use Artisan;
use App\Jobs\StartPFC;

class PFCController extends Controller
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

        $pfc        = new PFC;

        if($request->get('search')){
            $pfc    = $pfc->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('ip','like','%'.$search.'%');
                $query->orWhere('port','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $pfc    = $pfc->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/pfc/home',compact('pfc'));
        } else {
            $pfc    = $pfc->orderBy($sort_by,$sort_type)
                        ->paginate(15);

            return view('/admin/pfc/table_data',compact('pfc'))->render();
        }
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
        $pfc = PFC::create($request->all());
        session()->flash('info','Success');

        return redirect('admin/pfc/' . $pfc->id . '/edit');
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

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import_data($pfc_id, $type = null)
    {
		if($type == 6){
			$type = 1;
			Process::where('pfc_id', $pfc_id)->where('type_id', 5)->delete();

            // Stop Task Scheduler(Queue Work task)
            $stop = public_path('/').'TaskScheduler/StopQueueWork.lnk';
            exec("START ".$stop);

            // Start Task Scheduler(Queue Work task)
            $start = public_path('/').'TaskScheduler/StartQueueWork.lnk';
            exec("START ".$start);
		}else{
			Process::insert(array('start_time'=> time(),
				'refresh_time' => time(),
				'faild_attempt'=> 0,
				'class_name'=>'',
				'pfc_id' =>$pfc_id,
				'type_id' =>$type,
				'created_at' => time(),
				'updated_at' => time()
			));
		}
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

    public function delete_all(Request $request)
    {
        $pfc_id_array = $request->input('id');
        $pfc = PFC::whereIn('id',$pfc_id_array);
        if($pfc->delete()){
            echo "Data deleted";
        }
    }
}
