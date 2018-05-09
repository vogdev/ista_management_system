@extends('layouts.admin')

@section('content')
<div class="mbtn">
        <a class="button" href="{{route('admin.users.create')}}">
            <span>
                <i class="fa fa-plus fa-2x"></i>
            </span>
        </a>
</div>
<teacherSearch></teacherSearch>
  <teachers></teachers>
@endsection