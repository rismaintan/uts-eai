<?php

namespace App\Http\Controllers\Api;

use App\Models\Wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaliController extends Controller
{
    public function index(){
        $wali = Wali::all();
        if($wali->count()>0){
            return response()->json([
                'status' => 200,
                'wali' => $wali
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'no record'
            ], 404);
        }
    }
}
