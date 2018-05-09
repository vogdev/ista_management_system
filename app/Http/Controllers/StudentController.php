<?php

namespace App\Http\Controllers;

use App\Student;
use \Auth;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    public function flag($students_ids){
        $ids = explode(",", $students_ids);   // 1,2  -->   ["1","2"]
        DB::table('students')->whereIn('id', $ids)->update(['status' => 0]);
        return response(200);
    }  
    public function unflag($students_ids){
        $ids = explode(",", $students_ids);   // 1,2  -->   ["1","2"]
        DB::table('students')->whereIn('id', $ids)->update(['status' => 1]);
        return response(200);
      }    

    public function store(Request $request)
    {
        //
    }


    public function show(Student $student)
    {
        //
    }


    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}
