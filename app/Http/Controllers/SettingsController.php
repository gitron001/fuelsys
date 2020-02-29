<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\FaileAttempt;
use App\Models\TrackingCommands;
use App\Models\Dispaneser;
use App\Models\RunninProcessModel;

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
        $running_process = RunninProcessModel::first();
        return view('/admin/settings/edit',compact('company','running_process'));
    }

    public function get_refresh_time(Request $request)
    {
        $running_process = RunninProcessModel::first();

        return view('admin.settings.running_process',compact('running_process'));
    }

    public function delete_process(Request $request)
    {
        $delete = RunninProcessModel::where('id', $request->id)->delete();

        if($delete){
            echo json_encode('success');
        }else{
            echo json_encode('error');
        }

        exit();
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
		$query = $query->where('type', 18);

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
            $failed_attempts = $failed_attempts->orderBy('id','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/failed_attempts',compact('failed_attempts'));
        } else {
            $failed_attempts = $failed_attempts->orderBy('id','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/table_data',compact('failed_attempts'))->render();
        }

    }

	public function error_transactions(Request $request)
    {
		/*
        $error_trans = new Trasactions::where('error_log', 3);

        if($request->ajax() == false){
            $failed_attempts = $failed_attempts->orderBy('created_at','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/failed_attempts',compact('failed_attempts'));
        } else {
            $failed_attempts = $failed_attempts->orderBy('created_at','ASC')
                                ->paginate(15);
            return view('/admin/failed_attempts/table_data',compact('failed_attempts'))->render();
        }
		*/
    }

    public function test_email(Request $request)
    {
        $data = array('response' => 'Good');
        Mail::send('test_email', $data, function($message){
            $message->to('orges1@hotmail.com')->subject('Fuel System');
        });

        session()->flash('info','Success');
        return redirect()->back();

    }
}
