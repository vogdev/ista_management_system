@extends('layouts.admin')

@section('content')
<div class="form shadow">
  <form method="post" action="{{action('Admin\StudentController@update', $student->id)}}">
     {{ csrf_field() }}
     {{ method_field('PUT') }}
       <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="label">name</label>
            <div class="control">
                <input id="name" type="text" class="input" name="name" value="{{ old('name') ? old('name') : $student->name }}" required autofocus>
            </div>
    </div>
       <div class="field {{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label class="label">birthday</label>
            <div class="control">
                <input id="birthday" type="date" class="input" name="birthday" value="{{ old('birthday') ? old('birthday') : $student->birthday }}" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('cn') ? ' has-error' : '' }}">
        <label class="label">cn</label>
            <div class="control">
                <input id="cn" type="text" class="input" name="cn" value="{{ old('cn') ? old('cn') : $student->cn }}" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('ref') ? ' has-error' : '' }}">
        <label class="label">ref</label>
            <div class="control">
                <input id="ref" type="ref" class="input" name="ref" value="{{ old('ref') ? old('ref') : $student->ref }}" required>
            </div>
    </div>
  <div class="control">
      <div class="select">
        <select name="classroom_id">
            @foreach ($classrooms as $classroom)
                 <option value="{{ $classroom->id }}" @if($classroom->id==$student->classroom->id) selected='selected' @endif>{{ $classroom->name }}0{{ $classroom->pos_year}}G{{ ucfirst($classroom->group)}}</option>
            @endforeach
        </select>
      </div>
  </div>
    <div class="field">
      <div class="control">
        <input class="input button is-primary submit" type="submit" >
      </div>
    </div>
  </form>
</div>
@endsection