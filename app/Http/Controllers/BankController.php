<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use Illuminate\Http\Request;

class BankController extends Controller {
    public function index(Request $request) {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $banks = new Banks;

        if($request->get('search')){
            $banks = $banks->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('bank_number','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $banks = $banks->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/banks/home',compact('banks'));
        } else {
            $banks = $banks->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/banks/table_data',compact('banks'))->render();
        }
    }

    public function create() {
        return view('/admin/banks/create');
    }

    public function store(Request $request) {
        $bank = Banks::create($request->all());
        session()->flash('info','Success');

        return redirect('admin/banks/' . $bank->id . '/edit');
    }

    public function edit($id) {
        $bank = Banks::find($id);
        return view('/admin/banks/edit',compact('bank'));
    }

    public function update(Request $request, $id) {
        $bank = Banks::findOrFail($id);
        $bank->update($request->all());

        session()->flash('info','Success');

        return redirect()->back();
    }

    public function destroy($id) {
        $bank = Banks::findOrFail($id);
        $bank->delete();
        session()->flash('info','Success');

        return redirect('/admin/banks');
    }

    public function delete_all(Request $request) {
        $banks_id_array = $request->input('id');
        $banks = Banks::whereIn('id',$banks_id_array);
        if($banks->delete()){
            echo "Data deleted";
        }
    }
}
