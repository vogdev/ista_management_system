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
          <li><a href="/admin/">OFPPT</a></li>
          <li class="is-active"><a href="#">Filières</a></li>
        </ul>
      </nav>
    </div>
  <div class="level">
    <div class="column">
        <div class="level-right actions">
		<a class="button is-success level-item" href="{{route('admin.classrooms.create')}}">create  </a>
        </div>
      </div>
    </div>
  </div>
	<div class="columns is-desktop ">
		@foreach ($classrooms as $classroom)
		  <div class="column">
                      <div class="card">
                            <a href="{{ route('admin.filiere',[$classroom])}}">
      			      <div class="card-image">
      			        <figure class="image is-4by3">
      			          <img class="svg-img" src="/img/{{$classroom}}.svg" alt="{{ $classroom }}">
      			        </figure>
      			      </div>
      			      <div class="card-content">
      			        <div class="media">
      			          <div class="media-content">
      			            <p class="title">{{ $classroom }}</p>
      			          </div>
      			        </div>  
      			      </div>
      			    </a>
                        </div>
		  </div>
		@endforeach
	</div>
@endsection