<?php

namespace App\Http\Controllers\Admin;

use \Auth;
use App\User;
use App\Student;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         * define admin guard  >  $this->middleware('auth:admin');
         */
        $this->middleware('auth:admin');
    }  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $flaggedStudents = Student::where('status', 'red')
               ->orderBy('updated_at','asc')
               ->take(10)
               ->get();
         return view('admins.index',compact('flaggedStudents'));
    }
}
