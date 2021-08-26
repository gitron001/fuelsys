<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\ProductBranches;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{

    public function index(Request $request) {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $branches = new Branch;

        if($request->get('search')){
            $branches = $branches->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
                $query->orWhere('address','like','%'.$search.'%');
                $query->orWhere('city','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $branches = $branches->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/branches/home',compact('branches'));
        } else {
            $branches = $branches->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/branches/table_data',compact('branches'))->render();
        }
    }


    public function create() {
        $products   = Products::select('name','pfc_pr_id')->where('status', 1)->get();
        return view('/admin/branches/create',compact('products'));
    }


    public function store(BranchRequest $request) {
        $branch   = new Branch();

        $branch->name           = $request->input('name');
        $branch->address        = $request->input('address');
        $branch->city           = $request->input('cty');
        $branch->status         = $request->input('status');
        $branch->remember_token = str_random(32);
        $branch->created_at     = now()->timestamp;
        $branch->updated_at     = now()->timestamp;
        $branch->save();

        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayProductPfcId = array_values($request->input('product_pfc_id'))[0];

        if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayProductPfcId)){
            foreach(array_combine($request->input('product'), $request->input('product_pfc_id')) as $product => $product_pfc_id){

                $product_branch = new ProductBranches();

                $product_branch->branch_pfc_product_id  = $product_pfc_id;
                $product_branch->master_pfc_product_id  = $product;
                $product_branch->branch_id              = $branch->id;

                $product_branch->save();
            }
        }

        session()->flash('info','Success');
        return redirect('admin/branches/' . $branch->id . '/edit');
    }


    public function edit($id) {
        $branch = Branch::findOrFail($id);
        $products = Products::select('name','pfc_pr_id')->where('status', 1)->get();
        $products_branch = ProductBranches::where('branch_id',$id)->get();
        return view('/admin/branches/edit',compact('branch','products','products_branch'));
    }


    public function update(Request $request, $id) {
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());

        // DELETE Product Branch
        ProductBranches::where('branch_id',$id)->delete();

        $firstValueOfArrayProduct  = array_values($request->input('product'))[0];
        $firstValueOfArrayProductPfcId = array_values($request->input('product_pfc_id'))[0];
        if($firstValueOfArrayProduct !== 0 && !empty($firstValueOfArrayProductPfcId)){
            foreach(array_combine($request->input('product'), $request->input('product_pfc_id')) as $product => $product_pfc_id){

                $product_branch = new ProductBranches();

                $product_branch->branch_pfc_product_id  = $product_pfc_id;
                $product_branch->master_pfc_product_id  = $product;
                $product_branch->branch_id              = $branch->id;

                $product_branch->save();
            }
        }
        session()->flash('info','Success');

        return redirect()->back();
    }


    public function destroy($id) {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        session()->flash('info','Success');

        return redirect('/admin/branches');
    }

    public function delete_all(Request $request) {
        $branch_id_array = $request->input('id');
        $branch = Branch::whereIn('id',$branch_id_array);
        if($branch->delete()){
            echo "Data deleted";
        }
    }
}
