<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;

class AjaxController extends Controller
{
    public function saveData(Request $request) {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(),[
                    'name' => 'required|min:5',
                    'email' => 'required|email|unique:students,email,NULL,id,deleted_at,NULL|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                    'phone' => 'required|digits_between:10,15',
                    'choice' => 'sometimes|required|array|distinct|min:1',
                    'gender' => 'required|numeric|min:1|max:2',
                    'password' => 'required|min:5',
                    'images.*' => 'image|mimes:jpeg,png,jpg'
                ]);

            if ($validator->fails()) return response()->json(['errors'=>$validator->errors()]);
                    

            $imageNameArr = [];
            if($request->hasFile('images')) {
                
                if(is_array($request->images)) {
                    foreach($request->images as $image) {
                        $imgName = Storage::disk('public')->putFile('student', $image);
                        array_push($imageNameArr, $imgName);
                    }
                } else {
                    $imgName = Storage::disk('public')->putFile('student', $request->images);
                    array_push($imageNameArr, $imgName);
                }
            }

            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->choice = $request->choice ? implode(',', $request->choice) : null;
            $student->gender = $request->gender;
            $student->password = Hash::make($request->password);
            $student->description = $request->description ?? '';
            $student->images = implode(',',$imageNameArr);
            $student->save();
            DB::commit();

            if($student->id) {
                return response()->json(['success'=>'Data inserted successfully!!']);
            }
        } catch(Exception $e) {
            DB::rollBack();
            return redirect('insert')->with('failed',"operation failed");
        }
    }

    public function studentList () {
        $data = Student::select('*')->get();
        return view("stdList", ["datas" => $data]);
    }
}
