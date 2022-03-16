<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Auth;
use Excel;
use App\Models\Users;
use App\Models\Company;
use App\Models\Expenses;
use App\Models\Categories;
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

        $query          = Expenses::select(DB::RAW('users.name as user_name'), 'users.type as user_type', 'expenses.amount', 'expenses.date','expenses.created_at','expenses.updated_at','expenses.id', 'creator.name as p_creater','expenses.expense_type','categories.name as category_name')
            ->leftJoin('users', 'users.id', '=', 'expenses.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'expenses.category_id')
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
        $categories = Categories::where('status',1)->pluck('name','id')->all();

        return view('/admin/expenses/create',compact('users','categories'));
    }

    public function store(Request $request) {
        $expenses   = new Expenses();

        $expenses->date         = strtotime($request->input('date'));
        $expenses->amount       = $request->input('amount');
        $expenses->description  = $request->input('description');
        $expenses->user_id      = $request->input('user_id');
        $expenses->category_id  = $request->input('category_id');
        $expenses->expense_type = $request->input('expense_type');
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
        $expenses->category_id  = $request->input('category_id');
        $expenses->date         = strtotime($request->input('date'));
        $expenses->description  = $request->input('description');
        $expenses->amount       = $request->input('amount');
        $expenses->expense_type = $request->input('expense_type');
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
        $categories = Categories::where('status',1)->pluck('name','id')->all();

        return view('/admin/expenses/edit',compact('expenses','users','categories'));
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

    public function exportPDF(Request $request) {
        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));

        $company    = Company::where('status', 4)->first();

        $expenses = self::generate_data($request);

        $pdf = PDF::loadView('admin.expenses.pdf_export',compact('expenses','company','from_date','to_date'));
        $file_name  = 'Expenses - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }

    public function exportExcel(Request $request) {
        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));

        $expenses = self::generate_data($request);

        $file_name  = 'Expenses - '.date('Y-m-d h-i', strtotime("now"));
        $myFile = Excel::create($file_name, function($excel) use( $expenses ) {

            $excel->sheet('Expenses', function($sheet) use( $expenses ) {

                $sheet->cell('A1:D1', function ($cells) {
                    $cells->setFontWeight('bold');
                });

                $sheet->appendRow(array(
                    trans('adminlte::adminlte.date'),
                    trans('adminlte::adminlte.user'),
                    trans('adminlte::adminlte.amount'),
                    trans('adminlte::adminlte.category'),
                    trans('adminlte::adminlte.expenses_details.created_by')
                ));

                foreach ($expenses as $expense) {
                    $sheet->appendRow(array(
                        date('m/d/Y H:i', $expense->date),
                        $expense->user_name ? $expense->user_name : ' ',
                        $expense->amount,
                        $expense->category_name,
                        $expense->p_creater,
                    ));
                }

            });

        });

        $myFile = $myFile->string('xlsx');
        $response =  array(
           'name' => $file_name,
           'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64,".base64_encode($myFile)
        );

        return response()->json($response);
    }

    public static function generate_data($request){
        $from_date      = strtotime($request->input('fromDate'));
        $to_date        = strtotime($request->input('toDate'));
        $user           = $request->input('user');

        $query          = Expenses::select(DB::RAW('users.name as user_name'), 'users.type as user_type', 'expenses.amount', 'expenses.date','expenses.created_at','expenses.updated_at','expenses.id', 'creator.name as p_creater','categories.name as category_name')
            ->leftJoin('users', 'users.id', '=', 'expenses.user_id')
            ->leftJoin('categories', 'categories.id', '=', 'expenses.category_id')
            ->leftJoin('users as creator', 'creator.id', '=', 'expenses.created_by');

        if ($request->input('user')) {
            $query = $query->whereIn('users.id',$user);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('expenses.date',[$from_date, $to_date]);
        }

        $expenses = $query->orderBy('expenses.date', 'DESC')->get();

        return $expenses;
    }
}
