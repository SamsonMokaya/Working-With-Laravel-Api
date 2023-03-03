<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getAll(){
        $students=Student::all();
        return json_encode(['data'=>$students]);
    }

    public function getStudent($id = null){
        if($id){
            $student = Student::find($id);
            return json_encode(['data' => $student]);
        }
        $students = Student::all();
        return json_encode(['data' => $students]);
    }

    public function createStudent(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->save();

        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    public function updateStudent(Request $request, $id)
    {
        $student = new Student;
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->save();

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student
        ], 200);
    }


    public function deleteStudent($id)
{
    $student = Student::find($id);
    if (!$student) {
        return response()->json([
            'message' => 'Student not found'
        ], 404);
    }
    $student->delete();

    return response()->json([
        'message' => 'Student deleted successfully'
    ], 200);
}



    

}
