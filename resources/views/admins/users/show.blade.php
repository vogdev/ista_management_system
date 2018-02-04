@extends('layouts.admin')

@section('content')
<div class="columns" style="margin-bottom: 0;">
    <div class="column">
     <a href="{{route('admin.users.edit',[$user->id])}}">edit</a>
            <p>teacher name  : {{$user->name}}</p>     
    </div>
  </div>
@endsection