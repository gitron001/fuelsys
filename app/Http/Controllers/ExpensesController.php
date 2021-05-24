<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Users;
use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $users          = Users::where('status',1)->where('type',1)->orderBy('name','asc')->pluck('name','id')->all();

        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
        $user           = $request->input('user');
        $sort_by         = "expenses".".".$request->get('sortby');
        $sort_type       = $request->get('sorttype');

        $query          = Expenses::select(DB::RAW('users.name as user_name'), 'users.type as user_type', 'expenses.amount', 'expenses.date','expenses.created_at','expenses.updated_at','expenses.id', 'creator.name as p_creater')
            ->leftJoin('users', 'users.id', '=', 'expenses.user_id')
            ->leftJoin('users as creator', 'creator.id', '=', 'expenses.created_by');

        if ($request->input('user')) {
            $query = $query->whereIn('users.id',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('expenses.date',[$from_date, $to_date]);
        }

        if($request->ajax() == false){
            $query->orderBy('expenses.date', 'DESC');
            $expenses = $query->paginate(15);
            return view('/admin/expenses/home',compact('expenses','users'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $expenses = $query->paginate(15);
            return view('/admin/expenses/table_data',compact('expenses','users'))->render();
        }
    }

    public function create() {
		$users      = Users::where('status',1)->where(function ($users) {
			$users->where('company_id', 0)
            ->orWhereNull('company_id');
		})->where('type', 1)->where('branch_id',NULL)->pluck('name','id')->all();

        return view('/admin/expenses/create',compact('users'));
    }

    public function store(Request $request) {
        $expenses   = new Expenses();

        $expenses->date         = strtotime($request->input('date'));
        $expenses->amount       = $request->input('amount');
        $expenses->description  = $request->input('description');
        $expenses->user_id      = $request->input('user_id');
        $expenses->created_at   = now()->timestamp;
        $expenses->created_by   = Auth::user()->id;
        $expenses->updated_at   = now()->timestamp;
        $expenses->save();

        session()->flash('info','Success');

        return redirect('admin/expenses/' . $expenses->id . '/edit');
    }

    public function update(Request $request, $id) {
        $expenses = Expenses::findOrFail($id);

        $expenses->user_id      = $request->input('user_id');
        $expenses->date         = strtotime($request->input('date'));
        $expenses->description  = $request->input('description');
        $expenses->amount       = $request->input('amount');
        $expenses->edited_by    = Auth::user()->id;
        $expenses->updated_at   = now()->timestamp;
        $expenses->update();

        session()->flash('info','Success');

        return redirect()->back();

    }

    public function edit($id) {
        $expenses   = Expenses::findOrFail($id);
        $users      = Users::where('status',1)->where(function ($users) {
                            $users->where('company_id', 0)
                            ->orWhereNull('company_id');
                        })->where('type', 1)->where('branch_id',NULL)->pluck('name','id')->all();
        return view('/admin/expenses/edit',compact('expenses','users'));
    }

    public function destroy($id) {
        $expenses = Expenses::findOrFail($id);

        $expenses->delete();
        session()->flash('info','Success');

        return redirect('/admin/expenses');
    }

    public function delete_all(Request $request) {
        $expenses_id_array = $request->input('id');

        foreach($expenses_id_array as $expenses_id) {

            $expenses = Expenses::findOrFail($expenses_id);

            if($expenses->delete()){
                echo "Data deleted";
            }
        }

    }
}
