<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function index(){
        $hospital = DB::select('select * from hospitals');
        return response()->json($hospital);
    }
    public function hospital($id){
        $hospital = DB::select('select * from hospitals where id = :id',['id'=>$id]);
        return response()->json($hospital[0]);
    }
}
