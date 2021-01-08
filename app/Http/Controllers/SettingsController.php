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
        $time = array('0' => 'Select date','1'=>'Older than 1 day','2'=>'Older than 2 days','3'=>'Older than 3 days','4'=>'Older than 4 days','5'=>'Older than 5 days','6'=>'Older than 6 days','7'=>'Older than 1 week','14'=>'Older than 2 weeks','21'=>'Older than 3 weeks','31'=>'Older than 1 month');
        $company = Company::where('status',4)->first();
        $running_process = RunninProcessModel::first();
        return view('/admin/settings/edit',compact('company','running_process','time'));
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
            $request['images'] = $fileNameToStore;
        }

        if($request->direct_login == 1){
            $request['show_transaction'] = 0;
            $request['show_transaction_time'] = 0;
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
        $command_types = array( 1 => 'Activate Card', 2 => 'Activate Card Response', 3 => 'Activate Card Discounts', 4 => 'Activate Card  Discounts Response', 5 => 'Read Transaction Commad', 6 => 'Transaction Data Response', 7=> 'Lock Transaction', 8 => 'Lock Transaction Response', 9 => 'Clear Transaction', 10 => 'Clear Transaction Response', 11 => 'Preset Command', 12 => 'Preset Command Response', 13 => 'Prepay Command', 14 => 'Prepay Command Response', 15 => 'Dispaly Text Command', 16 => 'Dispaly Text Command Response', 17 => 'Read Live Data', 18 => 'Read Live Data Response');

        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $query = new TrackingCommands;

        $from_date       = strtotime($request->input('fromDate'));
        $to_date         = strtotime($request->input('toDate'));


		if($request->input('channel_id')){
			$query = $query->where('channel_id', $request->input('channel_id'));
		}

		if($request->input('fromDate')){
            $query = $query->whereBetween('created_at',[$from_date, $to_date]);
		}

        if($request->ajax() == false){
            $commands = $query->orderBy('created_at','DESC')
                            ->paginate(15);
            return view('/admin/settings/tracking',compact('commands','channels','command_types'));
        } else {
            $commands = $query->orderBy($sort_by,$sort_type)
                            ->paginate(15);
            return view('/admin/settings/tracking_data',compact('commands','channels','command_types'))->render();
        }

    }

    public function delete_all_tracking_commands(Request $request) {
        $tracking_id_array = $request->input('id');
        $tracking = TrackingCommands::whereIn('id',$tracking_id_array);
        if($tracking->delete()){
            echo "Data deleted";
        }
    }

    public function failed_attempts(Request $request)
    {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $failed_attempts = new FaileAttempt;

        if($request->ajax() == false){
            $failed_attempts  = $failed_attempts->orderBy('id','DESC')
                        ->paginate(15);
            return view('/admin/failed_attempts/failed_attempts',compact('failed_attempts'));
        } else {
            $failed_attempts  = $failed_attempts->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/failed_attempts/table_data',compact('failed_attempts'))->render();
        }

    }

    public function delete_all_failed_attempts(Request $request)
    {
        $f_a_array = $request->input('id');
        $failed_attempts = FaileAttempt::whereIn('id',$f_a_array);
        if($failed_attempts->delete()){
            echo "Data deleted";
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
