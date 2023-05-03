<?php

namespace App\Http\Controllers\Api;

use App\Models\Wali;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nama'  => 'required|string:191',
            'pekerjaan'  => 'required|string:191',
            'student_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors'    => $validator->messages()
            ], 422);

        }else{
            $wali = Wali::create([
                'nama'  => $request->nama,
                'pekerjaan'     => $request->pekerjaan,
                'student_id'  => $request->student_id,
            ]);

            if($wali){
                return response()->json([
                    'status' =>200,
                    'message' => "Wali Created Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'    => 200,
                    'message'   => "Something Went Wrong"
                ], 500); 

            }
        }
    }

    // public function show($id){
    //     $wali = Wali::find($id);
    //     if($wali){
    //         return response()->json([
    //             'status'    => 200,
    //             'wali'      => $wali
    //         ], 200); 
            
    //     }else{
    //         return response()->json([
    //             'status'    => 404,
    //             'message'   => "No Such Wali Found!"
    //         ], 404); 
    //     }
    // }

    // public function update(Request $request, int $id){
    //     $validator = Validator::make($request->all(), [
    //         'nama'  => 'required|string:191',
    //         'pekerjaan' => 'required|string:191',
    //         'student_id' => 'required'
    //     ]);
    //     if($validator->fails()){
    //         return response()->json([
    //             'status' => 422,
    //             'errors'    => $validator->messages()
    //         ], 422);

    //     }else{
    //         $wali = Wali::find($id);
           
    //         if($wali){
    //             $wali->update([
    //                 'nama'  => $request->nama,
    //                 'pekerjaan' => $request->pekerjaan,
    //                 'student_id'  => $request->student_id,
    //             ]);

    //             return response()->json([
    //                 'status' =>200,
    //                 'message' => "Wali Updated Successfully"
    //             ], 200);
    //         }else{
    //             return response()->json([
    //                 'status'    => 404,
    //                 'message'   => "No Such Wali Found!"
    //             ], 404); 

    //         }
    //     }
    // }

    // public function destroy($id){
    //     $wali= Wali::find($id);
    //     if($wali){
    //         $wali->delete();
    //         return response()->json([
    //             'status'    => 200,
    //             'message'   => "Wali Deleted Successfuly!"
    //         ], 200); 
    //     }else{
    //         return response()->json([
    //             'status'    => 404,
    //             'message'   => "No Such Wali Found!"
    //         ], 404); 
    //     }
    // }

}
