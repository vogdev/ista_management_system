<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Classroom;

class UserController extends Controller
{
    public function __construct()
    {
        /**
         * define admin guard  >  $this->middleware('auth:admin');
         */
        $this->middleware('auth:admin');
    }

    // public function __construct()
    // {
    //     $this->middleware('auth', ['only' => ['index', 'show','edit','update']]);
    //     $this->middleware('auth:admin', ['only' => ['create', 'store','destroy']]);
    // }

    public function index()
    {
        $users = User::orderBy('created_at','desc')->with('classrooms')->get();
        return view('admins.users.index',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
      return view('admins.users.create',compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $user = new User;
    $this->validate($request,[
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    $user->classrooms()->attach($request->classrooms_id);
    return redirect()->route('admin.users.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
         $user->with('classrooms')->first();
        return view('admins.users.show',compact('user'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $classrooms = Classroom::all();
        $teacher_classrooms = $user->classrooms->pluck('id')->toArray();
        return view('admins.users.edit',compact('user','classrooms','teacher_classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    return $user;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->classrooms()->sync($request->classrooms_id);
    $user->save();
    return redirect()->route('admin.users.index')->with('success','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
