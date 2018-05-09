@extends('layouts.app')

@section('content')
<div class="columns" style="margin-bottom: 0;">
    <div class="column">
      <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="#">Bulma</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">Components</a></li>
          <li class="is-active"><a href="#" aria-current="page">Breadcrumb</a></li>
        </ul>
      </nav>
    </div>
      <div class="level">
    <div class="column">
        <div class="level-right">
              <a class="button is-success level-item">Success</a>
              <a class="button is-warning level-item">Warning</a>
             <a class="button is-danger level-item" href="/students/flag/" id="flag">Flag</a>  
        </div>
      </div>
    </div>
  </div>
<div class="columns ">
  <div class="column">
<table class="table">
  <thead>
    <tr>
      <th>
        <abbr title="checkbox">        
          <label class="label--checkbox">
                <input type="checkbox" class="checkbox" id="checkAll">
            </label>
        </abbr>
      </th>
      <th>Nom & prénom</th>
      <th>Date de naissance</th>
      <th>CIN</th>
      <th>REF</th>
      <th>Groupe</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>


@foreach ($classroom->students as $student)
    <tr class="{{  $student->status === "red" ? "is-flaged" : "" }}">
      <th>        
        <label class="label--checkbox">
            <input type="checkbox" class="checkbox Checked" data-id="{{ $student->id }}" id="checkItem">
        </label>
      </th>
      <td>{{$student->name}}</td>
      <td>{{$student->birthday}}</td>
      <td>{{$student->cn}}</td>
      <td>{{$student->ref}}</td>
      <td>{{$classroom->name}}0{{ $classroom->pos_year}}G{{ ucfirst($classroom->group)}}</td>
      <td><p class="status {{  $student->status === "red" ? "red" : "green" }}">Outlined</p></td>
    </tr>
 @endforeach
  </tbody>
</table>
  </div>
</div>
@endsection