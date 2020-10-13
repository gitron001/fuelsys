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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::pluck('name',DB::RAW('pfc_pr_id as id'))->all();
        return view('/admin/tanks/create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TankRequest $request)
    {
        $tank = Tank::create($request->all());

        session()->flash('info','Success');

        return redirect('admin/tanks/' . $tank->id . '/edit');
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
        $tank = Tank::findOrFail($id);
        $products = Products::pluck('name',DB::RAW('pfc_pr_id as id'))->all();

        return view('/admin/tanks/edit',compact('tank','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TankRequest $request, $id)
    {
        $tank = Tank::findOrFail($id);

        $tank->update($request->all());

        session()->flash('info','Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function import_excel_file_view(){
        $tanks = Tank::where('status',1)->get();
        return view('import_excel_file',compact('tanks'));
    }

    public function import_excel_file(Request $request){
        $cm = '';
        $path = $request->file('select_file')->getRealPath();
        $data = Excel::load($path)->get();
        $tank_id = $request->input('tank_id');

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

        session()->flash('info','Success');
        return redirect('/tanks_details');
    }
}
