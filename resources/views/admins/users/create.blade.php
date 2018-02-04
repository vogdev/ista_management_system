@extends('layouts.admin')

@section('content')
<div class="form shadow">
  <form action="{{ route('admin.users.store') }}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
       <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="label">name</label>
            <div class="control">
                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>
            </div>
    </div>
       <div class="field {{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="label">email</label>
            <div class="control">
                <input id="email" type="text" class="input" name="email" value="{{ old('email') }}" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="label">password</label>
            <div class="control">
                <input id="password" type="password" class="input" name="password" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="label">password</label>
            <div class="control">
                <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
            </div>
    </div>
    <select name="classrooms_id[]" multiple>
        @foreach ($classrooms as $classroom)
             <option value="{{ $classroom->id }}">{{ $classroom->name }}0{{ $classroom->pos_year}}G{{ ucfirst($classroom->group)}}</option>
        @endforeach
    </select>
    <div class="field">
      <div class="control">
        <input class="input button is-primary submit" type="submit" >
      </div>
    </div>
  </form>
</div>
@endsection