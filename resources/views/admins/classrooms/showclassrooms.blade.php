@extends('layouts.admin')

@section('content')
<div class="mbtn">
        <a class="button" href="{{route('admin.classrooms.create')}}">
            <span>
                <i class="fa fa-plus fa-2x"></i>
            </span>
        </a>
</div>
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
        <div class="level-right actions">
              <a class="button is-success level-item" href="/admin/unflag/" id="unflag" >Unflag</a>
		<a class="button is-warning level-item" href="{{route('admin.classrooms.create')}}">create  </a>
              <a class="button is-danger level-item" href="/admin/flag/" id="flag">Flag</a>
        </div>
      </div>
    </div>
  </div>
  <div class="columns">
    <p> {{$classrooms1[0]->name}} première année</p>
  </div>
  <div class="columns">
		@foreach ($classrooms1 as $classroom)
		  <div class="column">
                      <div class="card">
                          <div class="dropdown-links dropdown is-right">
                            <div class="dropdown-trigger">
                              <p  aria-haspopup="true" aria-controls="dropdown-menu3">
                                   <i class="fa fa-ellipsis-v fa-lg" aria-hidden="true"></i>
                              </p>
                            </div>
                            <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                              <div class="dropdown-content">
                                <a href="{{route('admin.classrooms.edit',[$classroom->id])}}" class="dropdown-item">
                                  Edit
                                </a>
                              </div>
                            </div>
                          </div>
                          <a href="{{ route('admin.classrooms.show',[$classroom->id])}}">
                            <div class="card-image">
                              <figure class="image is-4by3">
                               <img class="svg-img" src="/img/{{$classroom->name}}.svg" alt="{{ $classroom->name }}">
                              </figure>
                            </div>
                            <div class="card-content">
                              <div class="media">
                                <div class="media-content">
                                  <p class="title">{{ $classroom->name }}0{{ $classroom->pos_year}}{{ ucfirst($classroom->group)}}</p>
                                </div>
                              </div>  
                            </div>
                          </a>
                      </div>
		  </div>
		@endforeach
	</div>
      <div class="columns">
        <p>{{ $classrooms2[0]->name }} deuxième année</p>
      </div>
        <div class="columns">
    @foreach ($classrooms2 as $classroom)
      <div class="column">
            <div class="card">
              <div class="dropdown-links dropdown is-right">
                <div class="dropdown-trigger">
                  <p  aria-haspopup="true" aria-controls="dropdown-menu3">
                       <i class="fa fa-ellipsis-v fa-lg" aria-hidden="true"></i>
                  </p>
                </div>
                <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                  <div class="dropdown-content">
                    <a href="{{route('admin.classrooms.edit',[$classroom->id])}}" class="dropdown-item">
                      Edit
                    </a>

                  </div>
                </div>
              </div>
                <a href="{{ route('admin.classrooms.show',[$classroom->id])}}">
                  <div class="card-image">
                    <figure class="image is-4by3">
                      <img class="svg-img" src="/img/{{$classroom->name}}.svg" alt="{{ $classroom->name }}">
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <p class="title">{{ $classroom->name }}0{{ $classroom->pos_year}}{{ ucfirst($classroom->group)}}</p>
                      </div>
                    </div>  
                  </div>
                </a>
              </div>
      </div>
    @endforeach
  </div>
@endsection