<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Transaction as Transactions;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use App\Models\PFC;
use App\Models\Dispaneser;
use App\Models\Company;
use App\Models\Payments;
use App\Models\Products;
use App\Services\TransactionService;
use Carbon\Carbon;
use Excel;
use DB;
use DateTime;
use PDF;
use Mail;

class ReportsController extends Controller
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
        $transactions   = Transactions::orderBy('created_at', 'desc')->paginate(15);
        $users          = Users::pluck('name','id')->all();
        $companies      = Company::pluck('name','id')->all();

        return view('/admin/reports/home',compact('transactions','users','companies'));
    }

    public function search(Request $request) {

        $from_date  = strtotime($request->input('fromDate'));
        $to_date    = strtotime($request->input('toDate'));
        $user       = $request->input('user');
        $company    = $request->input('company');

        $query = Transactions::select(DB::RAW('users.name as user_name'), 'users.type', DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),
           'transactions.price', 'transactions.lit','transactions.money','transactions.created_at')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id');

        if ($request->input('user')) {
            $query = $query->where('users.id',$user);
        }

        if ($request->input('company')) {
            $query = $query->where('companies.id',$company);
        }

        if ($request->input('fromDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }
        $query->orderBy('transactions.created_at', 'DESC');
        $data = $query->get();

        $output = '';
        $total_row = $data->count();
        if($total_row > 0) {
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.$row->user_name.'</td>
                    <td>'.$row->comp_name.'</td>
                    <td>'.$row->product.'</td>
                    <td>'.$row->price.'</td>
                    <td>'.$row->lit.'</td>
                    <td>'.$row->money.'</td>
                    <td>'.$row->created_at.'</td>
                </tr>
                ';
            }
        }else {
            $output .= '
            <tr>
                <td align="center" colspan="7">No Data Found</td>
            </tr>
            ';
        }
        $data['table_data'] = $output;

        echo json_encode($data);
    }

    public function searchWithPagination(Request $request) {
        $users              = Users::whereIn('type',[1,2,3,4,5])->pluck('name','id')->all();
        $bonus_users        = Users::select(DB::RAW('users.name as name'), DB::RAW('users.id as id'))
                                ->join('transactions', 'transactions.bonus_user_id', '=', 'users.id')
                                ->orderBy('name', 'ASC')
                                ->distinct()
                                ->get();
        $companies          = Company::where('status',1)->orderBy('name','asc')->pluck('name','id')->all();

        $from_date          = strtotime($request->input('fromDate'));
        $to_date            = strtotime($request->input('toDate'));
        $user               = $request->input('user');
        $bonus_user         = $request->input('bonus_user');
        $company            = $request->input('company');
        $sort_by_company 	= $request->get('sortby');

		if($sort_by_company == 'name'){
            $sort_by = "transactions.created_at";
            $sort_type = "DESC";
        }else{
            $sort_by         = ($sort_by_company == 'company_id' ? "companies.name" : "transactions".".".$request->get('sortby'));
            $sort_type       = $request->get('sorttype');
        }

        if(!$request->input('sorttype')){
            $sort_type = "DESC";
		}
        if(!$request->input('sortby')){
            $sort_by = "transactions.created_at";
		}
        $last_payment       = $request->input('last_payment');

        if($last_payment == 'Yes'){
            $from_date = self::last_payment_date($request);
        }

        $query = Transactions::select(DB::RAW('user1.name as user_name'), 'user1.type', DB::RAW('user2.name as bonus_name'), DB::RAW('companies.name as comp_name'), DB::RAW('products.name as product'),'transactions.price', 'transactions.lit','transactions.money','transactions.created_at')
                    ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
                    ->leftJoin('users as user1', 'user1.id', '=', 'transactions.user_id')
                    ->leftJoin('users as user2', 'user2.id', '=', 'transactions.bonus_user_id')
                    ->leftJoin('companies', 'companies.id', '=', 'user1.company_id');

        if ($request->input('user') && empty($request->input('company'))) {
            $query = $query->whereIn('user1.id',$user);
        }

        if ($request->input('company') && empty($request->input('user'))) {
            $query = $query->where('companies.id',$company);
        }

        if($request->input('user') && $request->input('company')){
            $query = $query->whereIn('user1.id',$user)->orWhere('companies.id',$company);
        }

        if ($request->input('fromDate') && $request->input('toDate')) {
            $query = $query->whereBetween('transactions.created_at',[$from_date, $to_date]);
        }

        if ($request->input('bonus_user')) {
            $query = $query->whereIn('user2.id',$bonus_user);
        }

        if($request->ajax() == false){
            $query->orderBy($sort_by,$sort_type);
            $transactions = $query->paginate(15);
            return view('/admin/reports/home',compact('transactions','users','companies','bonus_users'));
        } else {
            $query->orderBy($sort_by,$sort_type);
            $transactions = $query->paginate(15);
            return view('/admin/reports/table_data',compact('transactions','users','companies','bonus_users'))->render();
        }


   }

	public static function last_payment_date($request){
		if($request->input('user')){
			$query = Payments::where('user_id',$request->input('user') );
		}else{
			$query = Payments::where('company_id',$request->input('company') );
		}
		$payments = $query->orderBy('date', 'desc')->first();
		return $payments->date+1;
	}
}
