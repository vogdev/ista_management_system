@extends('layouts.admin')

@section('content')
<div class="mbtn">
        <a class="button" href="{{route('admin.students.create')}}">
            <span>
                <i class="fa fa-plus fa-2x"></i>
            </span>
        </a>
</div>
<studentsearch></studentsearch>
  <students></students>

@endsection