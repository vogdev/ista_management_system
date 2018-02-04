@extends('layouts.admin')

@section('content')
<div class="form shadow">
  <form action="{{ route('admin.classrooms.store') }}" enctype="multipart/form-data" method="post">
     {{ csrf_field() }}
       <div class="field {{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="label">name</label>
            <div class="control">
                <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>
    <select name="pos_year">
      <option value="1">première année</option>
      <option value="2">deuxième année</option>
    </select>
      <select name="group">
      <option value="a">A</option>
      <option value="b">B</option>
      <option value="c">C</option>
      <option value="d">D</option>
      <option value="e">E</option>
    </select>
    <select name="year">
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>
      <option value="2021">2021</option>
      <option value="2022">2022</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2026">2026</option>
      <option value="2027">2027</option>
      <option value="2028">2028</option>
      <option value="2029">2029</option>
      <option value="2030">2030</option>
    </select>
    @if (!$teachers->isEmpty())
      <select name="teachers_id[]" multiple>
        @foreach ($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
      </select>
    @endif
    <div class="field">
      <div class="control">
        <input class="input button is-primary submit" type="submit" >
      </div>
    </div>
  </form>
</div>
@endsection