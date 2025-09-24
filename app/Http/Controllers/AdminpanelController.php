<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Attribute;
use Illuminate\Support\Str;

class AdminpanelController extends Controller
{
    public function showEdit(Request $request)
    {
        $table = DB::table($request->tableName);
        if ($request->ID != ''){
            $rows = $table->where("ID", $request->ID)->first();
        } else {
            $model = Str::studly(Str::singular($request->tableName));
            $model = 'App\Models\\'.$model;
            $rows = new $model;
            $rows = $rows->getFillable();
        }
        $table_info = collect(DB::select('DESC '.$request->tableName));
        return view('edit')->with(compact('table'))->with(compact('rows'))->with(compact('table_info'));
    }

    public function del(Request $request)
    {
        $table = DB::table($request->tableName);
        $rows = $table->where("ID", $request->ID);
        $rows->delete();
        return redirect()->route('tables', ['Name' => $request->tableName]);
    }


    public function tableItems(Request $request)
    {
        if (isset($request->Name))
        {
            $table_info = DB::select('DESC '.$request->Name);
            $table_items = DB::table($request->Name)->get();
            $table_name = $request->Name;
            $tables = DB::select('SHOW TABLES'); 
            return view('tables')->with(compact('tables'))->with(compact('table_items'))->with(compact('table_name'))->with(compact('table_info'));
        } else {
            $tables = DB::select('SHOW TABLES');
            return view('tables')->with(compact('tables'));
        }
    }

    public function save(Request $request)
    {
        $table = DB::table($request->tableName);
        if ($request->ID != '') {
            $row = $table->where("ID", $request->ID)->first();
            foreach($row as $key=>$value){
                foreach($request->all() as $key_r=>$value_r) {
                    if ($key_r == $key && $key != "id" && $key != "ID") {
                        $table->where("ID", $request->ID)->update(array(
                            $key=>$value_r,
                        ));
                    }
                }
            }
        } else {
            $model = Str::studly(Str::singular($request->tableName));
            $model = 'App\Models\\'.$model;
            $row = new $model;
            $rows = $row->getFillable();
            foreach($rows as $key){
                foreach($request->all() as $key_r=>$value_r) {
                    if ($key_r == $key && $key != "id" && $key != "ID") {
                        $row->fill([
                            $key=>$value_r,
                        ]);
                    }
                }
            }
            $row->save();
        }
        return redirect()->route('tables', ['Name' => $request->tableName]);
    }
}
