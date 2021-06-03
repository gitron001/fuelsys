<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Models\Tank;
use App\Models\Products;
use App\Models\TankDetails;
use Illuminate\Http\Request;
use App\Http\Requests\TankRequest;

class TankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sort_by    = $request->get('sortby');
        $sort_type  = $request->get('sorttype');
        $search     = $request->get('search');

        $tanks      = new Tank;

        if($request->get('search')){
            $tanks  = $tanks->where(function($query) use ($search){
                $query->where('name','like','%'.$search.'%');
            });
        }

        if($request->ajax() == false){
            $tanks  = $tanks->orderBy('name','ASC')
                        ->paginate(15);
            return view('/admin/tanks/home',compact('tanks'));
        } else {
            $tanks  = $tanks->orderBy($sort_by,$sort_type)
                        ->paginate(15);
            return view('/admin/tanks/table_data',compact('tanks'))->render();
        }
    }

    public function create()
    {
        $products = Products::pluck('name',DB::RAW('pfc_pr_id as id'))->all();
        return view('/admin/tanks/create',compact('products'));
    }

    public function store(TankRequest $request)
    {
        $tank = new Tank();
        $tank->name = $request->input('name');
        $tank->product_id = $request->input('product_id');
        $tank->capacity = $request->input('capacity');
        $tank->status = $request->input('status');
        $tank->high_level_water = $request->input('high_level_water');
        $tank->alarm_email_water_level = $request->input('alarm_email_water_level');
        $tank->save();

        if(!empty($request->file('excel_file'))){
            $this->importExcelFileToDatabase($request->file('excel_file'), $tank->id);
        }

        session()->flash('info','Success');
        return redirect('admin/tanks/' . $tank->id . '/edit');
    }

    public function edit($id)
    {
        $tank = Tank::findOrFail($id);
        $products = Products::pluck('name',DB::RAW('pfc_pr_id as id'))->all();
        $excel_file = TankDetails::where('tank_id',$id)->first();

        return view('/admin/tanks/edit',compact('tank','products','excel_file'));
    }

    public function update(TankRequest $request, $id)
    {
        $tank = Tank::findOrFail($id);
        $tank->update($request->all());

        if(!empty($request->file('excel_file'))){
            TankDetails::where('tank_id', $id)->delete();

            $this->importExcelFileToDatabase($request->file('excel_file'), $tank->id);
        }

        session()->flash('info','Success');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $tank = Tank::findOrFail($id);
        $tank->delete();
        session()->flash('info','Success');

        return redirect('/admin/tanks');
    }

    public function delete_all(Request $request)
    {
        $tank_id_array = $request->input('id');
        $tank = Tank::whereIn('id',$tank_id_array);
        if($tank->delete()){
            echo "Data deleted";
        }
    }

    private function importExcelFileToDatabase($excelFile, $tankID) {
        $cm = '';
        $path = $excelFile->getRealPath();
        $data = Excel::load($path)->get();
        $tank_id = $tankID;

        if($data->count() > 0) {
            foreach($data->toArray() as $key => $value) {
                $insert_data[] = array(
                    $value,
                );
            }
        }

        foreach($insert_data as $values){
            foreach($values as $value){
                $cm = $value['cm'];
                for ($i=0; $i <= 9; $i++) {
                    TankDetails::insert([
                        'cm' => $cm + $i,
                        'value' => $value[$i],
                        'tank_id' => $tank_id,
                        'created_at' => now()->timestamp,
                        'updated_at' => now()->timestamp
                        ]);
                }
            }
        }
    }
}
