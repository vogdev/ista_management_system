@extends('layouts.app')

@section('content')
	@foreach ($currentuser_classrooms->chunk(3) as $classrooms)
		<div class="columns is-desktop ">
			@foreach($classrooms as $classroom)
			<div class="column">
				<a href="{{ route('classrooms.show',[$classroom->id])}}">
					<div class="card">
						<div class="card-image">
							<figure class="image is-4by3">
								<img class="svg-img" src="/img/{{$classroom->name}}.svg" alt="{{ $classroom->name }}">
							</figure>
						</div>
						<div class="card-content">
							<div class="media">
								<div class="media-content">
									<p class="title">{{ $classroom->name }}0{{ $classroom->pos_year}}G{{ ucfirst($classroom->group)}}</p>
								</div>
							</div>  
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	@endforeach
@endsection