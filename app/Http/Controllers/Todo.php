<?php

namespace App\Http\Controllers;

use App\ModelTodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Todo extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index()
    {
        $data = DB::select("SELECT id, activity, description from todo");
        // $data = ModelTodo::all();
        if($data){
            $data = 
            ['data' => [
                'status' => 'true',
                'data' => $data
            ]];
        }else{
            $data = 
            ['data' => [
                'status' => 'true',
                'data' => 'Data Tidak Ada'
            ]];
        }
        return response($data);
    }

    public function show($id)
    {
        $data = ModelTodo::where('id',$id)->get();
        
        if($data){
            $data = 
            ['data' => [
                'status' => 'true',
                'data' => $data
            ]];
        }else{
            $data = 
            ['data' => [
                'status' => 'true',
                'data' => 'Data Tidak Ada'
            ]];
        }
        return response($data);
    }


    public function store(Request $request)
    {
        $data = new ModelTodo();
        $data->activity = $request->input('activity');
        $data->description  = $request->input('description');
        $data->save();

        return response(['data' => ['status' => 'true','msg' => 'Berhasil Menambah Data']]);
    }

    public function update(Request $request, $id){
        $data = ModelTodo::where('id',$id)->first();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response(['data' => ['status' => 'true','msg' => 'Berhasil Merubah Data']]);
    }

    public function destroy($id){
        $data = ModelTodo::where('id',$id)->first();
        $data->delete();
    
        return response(['data' => ['status' => 'true','msg' => 'Berhasil Menghapus Data']]);
    }
}
