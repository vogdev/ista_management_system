@extends('layouts.app')

@section('content')
  <classrom-students :classromstudents="{{$classroom->students}}" :classroom="{{$classroom}}"></classrom-students>
@endsection