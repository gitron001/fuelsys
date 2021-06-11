<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\InvoiceModel as Invoice;
use App\Models\Transaction as Transactions;

class InvoicesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $invoices = new Invoice;

        if($request->get('search')){
            $invoices = $invoices->where(function($query) use ($search){
                $query->where('id','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $invoices = $invoices->orderBy('date','DESC')
                            ->paginate(15);
            return view('/admin/invoices/home',compact('invoices'));
        } else {
            $invoices = $invoices->orderBy($sort_by,$sort_type)
                            ->paginate(15);
            return view('/admin/invoices/table_data',compact('invoices'))->render();
        }
    }

    public function show($id) {
        $invoice = Invoice::findOrFail($id);

        $from_company = Company::where('status', 4)->first();
        $to_company   = Company::where('id',5)->first();

        $transactions = self::invoice_data($id);

        return view('/admin/invoices/show_invoice', compact('invoice','from_company','to_company','transactions'));
    }

    public function invoice_to_pdf($id){
        $invoice = Invoice::findOrFail($id);

        $from_company = Company::where('status', 4)->first();
        $to_company   = Company::where('id',5)->first();

        $data               = self::invoice_data($id); // Display transactions group by PRICE
        $all_transactions   = self::invoice_all_transactions($id); // Display all transactions(Second page of PDF)

        $company            = $from_company;
        $to_company         = $to_company;
        $total_transactions = $data;
        $invoice_id         = $id;
        $date               = $invoice->date;

        $pdf = PDF::loadView('admin.invoices.invoice_pdf',compact('company','to_company','total_transactions','companies','date','invoice_id','all_transactions'));
        $file_name  = 'Invoice#'.$id.' - '.date('Y-m-d', time()).'.pdf';
        return $pdf->stream($file_name);
    }

    public static function invoice_data($id){
        $transactions = Transactions::select(DB::RAW('products.pfc_pr_id as product_id'), DB::raw('MAX(products.name) as product_name'), DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'),DB::raw('transactions.price as price'))
            ->where('transactions.invoice_id',$id)
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('products.pfc_pr_id')
            ->groupBy('transactions.price')
            ->get();
        return $transactions;
    }

    public static function invoice_all_transactions($id){
        $transactions = Transactions::select(DB::RAW('transactions.id as tr_id'),DB::RAW('transactions.created_at as date'),DB::RAW('products.pfc_pr_id as product_id'), DB::raw('MAX(products.name) as product_name'), DB::raw('SUM(lit) as lit'),DB::raw('SUM(money) as money'),DB::raw('transactions.price as price'))
            ->where('transactions.invoice_id',$id)
            ->leftJoin('users', 'users.id', '=', 'transactions.user_id')
            ->leftJoin('products', 'products.pfc_pr_id', '=', 'transactions.product_id')
            ->leftJoin('companies', 'companies.id', '=', 'users.company_id')
            ->groupBy('tr_id')
            ->get();
        return $transactions;
    }
}
