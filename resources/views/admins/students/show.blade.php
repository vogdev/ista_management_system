@extends('layouts.admin')

@section('content')
<a href="{{route('admin.students.edit',[$student->id])}}">Edit</a>
<h1>{{$student->name}}</h1>
@endsection