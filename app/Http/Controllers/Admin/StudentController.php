<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Classroom;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
         return view('admins.students.index');
    }

    public function create()
    {
        $classrooms = Classroom::all();
      return view('admins.students.create',compact('classrooms'));
    }

    public function store(Request $request)
    {
        $student = new Student;
        $this->validate($request,[
                'name' => 'required|string|max:255', 
            ]);
            $student->name               = $request->name;
            $student->birthday           = $request->birthday;
            $student->cn                 = $request->cn;
            $student->ref                = $request->ref;
            $student->classroom_id       = $request->classroom_id;
            $student->save();
            return redirect()->route('admin.students.index'); 
    }


    public function show(Student $student)
    {
        return view('admins.students.show',compact('student'));
    }


    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('admins.students.edit',compact('student','classrooms'));
    }

    public function update(Request $request, Student $student)
    {
        // return $student;
        $student->name            = $request->name;
        $student->birthday        = $request->birthday;
        $student->cn              = $request->cn;
        $student->ref             = $request->ref;
        $student->classroom_id    = $request->classroom_id;
        $student->save();
        return redirect()->route('admin.students.index')->with('success','Member updated successfully');
    }

    public function destroy(Student $student)
    {
        //
    }
}
