<?php

namespace App\Http\Controllers\Admin;

use App\Classroom;
use Illuminate\Http\Request;
use App\User;


class ClassroomController extends Controller
{
    public function __construct()
    {
        /**
         * define admin guard  >  $this->middleware('auth:admin');
         */
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
         $classrooms = Classroom::groupBy('name')->pluck('name')->toArray();
         return view('admins.classrooms.index',compact('classrooms'));
    }
    public function showclassrooms($name){
         $classrooms1 = Classroom::where('name', $name)->where('pos_year',1)->get();
         $classrooms2 = Classroom::where('name', $name)->where('pos_year',2)->get();
         return view('admins.classrooms.showclassrooms',compact('classrooms1','classrooms2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::all();
        return view('admins.classrooms.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $classroom = new Classroom;
    $classroom->name = $request->name;
    $classroom->pos_year = $request->pos_year;
    $classroom->group = $request->group;
    $classroom->year = $request->year;
    $classroom->save();
    $classroom->users()->attach($request->teachers_id);
    return redirect()->route('admin.classrooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('admins.classrooms.show',compact('classroom'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $teachers = User::all();
        $classroom_teachers = $classroom->users->pluck('id')->toArray();
        return view('admins.classrooms.edit',compact('classroom','teachers','classroom_teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $classroom->name                   = $request->name;
        $classroom->users()->sync($request->teachers_id);
        $classroom->save();
        return redirect()->route('admin.classrooms.index')->with('success','Classroom updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Classroom $classroom)
    // {
    //     //
    // }
}
