@extends('layouts.admin')

@section('content')
<div class="form shadow">
  <form action="{{ route('admin.students.store') }}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
       <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="label">name</label>
            <div class="control">
                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>
            </div>
    </div>
       <div class="field {{ $errors->has('birthday') ? ' has-error' : '' }}">
        <label class="label">birthday</label>
            <div class="control">
                <input id="birthday" type="date" class="input" name="birthday" value="{{ old('birthday') }}" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('cn') ? ' has-error' : '' }}">
        <label class="label">cn</label>
            <div class="control">
                <input id="cn" type="text" class="input" name="cn" required autofocus>
            </div>
    </div>
    <div class="field {{ $errors->has('ref') ? ' has-error' : '' }}">
        <label class="label">ref</label>
            <div class="control">
                <input id="ref" type="ref" class="input" name="ref" required>
            </div>
    </div>
    <select name="classroom_id">
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