<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        if($students->count()>0){
            return response()->json([
                'status' => 200,
                'students' => $students
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
            'nim'   => 'required',
            'nama'  => 'required|string:191',
            'email' => 'required|email:191',
            'phone' => 'required|digits:10',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors'    => $validator->messages()
            ], 422);

        }else{
            $students = Student::create([
                'nim'  => $request->nim,
                'nama'  => $request->nama,
                'email'  => $request->email,
                'phone'  => $request->phone,
            ]);

            if($students){
                return response()->json([
                    'status' =>200,
                    'message' => "Student Created Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'    => 200,
                    'message'   => "Something Went Wrong"
                ], 500); 

            }
        }
    }

    public function show($id){
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status'    => 200,
                'student'   => $student
            ], 200); 
            
        }else{
            return response()->json([
                'status'    => 404,
                'message'   => "No Such Student Found!"
            ], 404); 
        }
    }

    public function edit($id){
        $student = Student::find($id);
        if($student){
            return response()->json([
                'status'    => 200,
                'student'   => $student
            ], 200); 
            
        }else{
            return response()->json([
                'status'    => 404,
                'message'   => "No Such Student Found!"
            ], 404); 
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(), [
            'nim'   => 'required',
            'nama'  => 'required|string:191',
            'email' => 'required|email:191',
            'phone' => 'required|digits:10',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'errors'    => $validator->messages()
            ], 422);

        }else{
            $students = Student::find($id);
           
            if($students){
                $students->update([
                    'nim'  => $request->nim,
                    'nama'  => $request->nama,
                    'email'  => $request->email,
                    'phone'  => $request->phone,
                ]);

                return response()->json([
                    'status' =>200,
                    'message' => "Student Updated Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'    => 404,
                    'message'   => "No Such Student Found!"
                ], 404); 

            }
        }
    }

    public function destroy($id){
        $student= Student::find($id);
        if($student){
            $student->delete();
            return response()->json([
                'status'    => 200,
                'message'   => "Student Deleted Successfuly!"
            ], 200); 
        }else{
            return response()->json([
                'status'    => 404,
                'message'   => "No Such Student Found!"
            ], 404); 
        }
    }
}
