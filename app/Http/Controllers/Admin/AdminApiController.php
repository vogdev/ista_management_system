<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Classroom;
use App\Student;
use DB;

class AdminApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getStudents()
    {
        $students = Student::with('classroom')->select('id', 'classroom_id', 'name', 'birthday', 'cn', 'ref', 'status')->get();
        $classrooms = Classroom::all();
         return [$students,$classrooms];
    }
    public function studentSearch($query)
    {
        // the search() function is a scope
        $result = Student::latest()->search($query)->take(6)->get();
        return $result;
    }
    public function updateStudent($student_id, Request $request)
    {
        $student = Student::where('id',$student_id)->first();
        $student->name            = $request->name;
        $student->birthday        = $request->birthday;
        $student->cn              = $request->cn;
        $student->ref             = $request->ref;
        $student->classroom_id    = $request->classroom_id;
        $student->save();
        return response(200);
    }
    public function unflag($students_ids){
        $ids = explode(",", $students_ids);
        DB::table('students')->whereIn('id', $ids)->update(['status' => true]);
        return response(200);
    }
    public function flag($students_ids){
        $ids = explode(",", $students_ids);
        DB::table('students')->whereIn('id', $ids)->update(['status' => false]);
        return response(200);
    }    
    public function deleteStudent($student_id)
    {
        $student = Student::where('id',$student_id)->first();
        $student->delete();
    }


    public function getTeachers()
    {
        $teachers = User::orderBy('created_at','desc')->get();
        $classrooms = Classroom::all();
        return [$teachers, $classrooms];
    }
    public function teacherSearch($query)
    {
        // the search() function is a scope
        $result = User::latest()->search($query)->take(6)->get();
        return $result;
    }
    public function updateTeacher($teacher_id, Request $request)
    {
        $user = User::where('id',$teacher_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->change_password == true){
            $user->password = bcrypt($request->new_password);
        }
        $user->classrooms()->sync($request->classrooms_id);
        $user->save();
        return response(200);
    }

    public function deleteTeacher($teacher_id)
    {
        $teacher = User::where('id',$teacher_id)->first();
        $teacher->delete();
        return response(200);
    }
}
