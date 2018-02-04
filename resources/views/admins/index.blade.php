@extends('layouts.admin')

@section('content')
  <div class="columns">
    <div class="column">
      <div class="dashboard-item">
      <h3 class="dashboard-item-title">Flagged students</h3>
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
              <th class="ms-dn">Date de naissance</th>
              <th class="ms-dn">CIN</th>
              <th class="ms-dn">REF</th>
              <th>Groupe</th>
              <th>Status</th>

            </tr>
          </thead>
          <tbody>
            @foreach ($flaggedStudents as $student)
              <tr >
                <th>        
                  <label class="label--checkbox">
                    <input type="checkbox" class="checkbox Checked" data-id="{{ $student->id }}" id="checkItem">
                  </label>
                </th>
                <td><a href="{{route('admin.students.show',[$student->id])}}">{{$student->name}}</a></td>
                <td class="ms-dn">{{$student->birthday}}</td>
                <td class="ms-dn">{{$student->cn}}</td>
                <td class="ms-dn">{{$student->ref}}</td>
                <td>{{$student->classroom->name}}0{{ $student->classroom->pos_year}}G{{ ucfirst($student->classroom->group)}}</td>
                <td>
                  @if($student->status === "red")
                    <p class="status red">{{$student->updated_at->format('Y/m/d')}}</p>
                  @else
                    <p class="status green">{{$student->updated_at->format('d/m/Y')}}</p>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="columns">
    <div class="column">
      <div class="dashboard-item">
      <h3 class="dashboard-item-title">First column</h3>
             <canvas id="myChart" width="400" height="300"></canvas>
      </div>
    </div>
    <div class="column">
      <div class="dashboard-item">
             <h3 class="dashboard-item-title">First column</h3>
      </div>
    </div>
  </div>
@endsection
