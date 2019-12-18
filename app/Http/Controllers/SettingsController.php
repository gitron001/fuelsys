<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\FaileAttempt;
use App\Models\TrackingCommands;
use App\Models\Dispaneser;

class SettingsController extends Controller
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
    public function index()
    {
        $company = Company::where('status',4)->first();
        return view('/admin/settings/edit',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $company = Company::findOrFail($id);
        
        // Edit photo if exist to public/company folder
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $image->move(public_path('images/company'),$fileNameToStore);
        }

        if($request->hasFile('image')){
            $company->images = $fileNameToStore;
        }

        $company->update($request->all());

        return redirect('/admin/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tracking_commands(Request $request)
    {
		$channels = Dispaneser::get();
        $query = new TrackingCommands;
		
		if($request->input('channel_id')){
			$query = $query->where('channel_id', $request->input('channel_id'));
		}

		if($request->input('from_date')){
			$query = $query->whereBetween('created_at', [strtotime($request->input('from_date')),  strtotime($request->input('to_date'))]);
		}
        
		$commands = $query->orderBy('created_at','DESC')->paginate(15);
			
        if($request->ajax() == false){			
            return view('/admin/settings/tracking',compact('commands', 'channels'));
        } else {
            return view('/admin/settings/tracking_data',compact('commands', 'channels'))->render();
        }

    }

    public function failed_attempts(Request $request)
    {
        $failed_attempts = new FaileAttempt;

        if($request->ajax() == false){
            $failed_attempts = $failed_attempts->orderBy('created_at','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/failed_attempts',compact('failed_attempts'));
        } else {
            $failed_attempts = $failed_attempts->orderBy('created_at','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/table_data',compact('failed_attempts'))->render();
        }

    }
}
