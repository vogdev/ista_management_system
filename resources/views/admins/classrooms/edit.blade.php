@extends('layouts.admin')

@section('content')
<div class="form shadow">
  <form method="post" action="{{action('Admin\ClassroomController@update', $classroom->id)}}">
     {{ csrf_field() }}
     {{ method_field('PUT') }}
       <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="label">name</label>
            <div class="control">
                <input id="name" type="text" class="input" name="name" value="{{ old('name') ? old('name') : $classroom->name }}" required autofocus>
            </div>
    </div>
  <div class="control">
      <div class="select is-multiple">
        <select  name="teachers_id[]" multiple>
            @foreach ($teachers as $teacher)
                 <option value="{{ $teacher->id }}" @if(in_array($teacher->id, $classroom_teachers)) selected='selected' @endif>{{ $teacher->name }}</option>
            @endforeach
        </select>
      </div>
  </div>

    <div class="field">
      <div class="control">
         <input class="input button is-primary submit" type="submit" value="Save">
      </div>
    </div>
  </form>
</div>
@endsection