@extends('layouts.admin')

@section('content')
<div class="mbtn">
        <a class="button" href="{{route('admin.users.create')}}">
            <span>
                <i class="fa fa-plus fa-2x"></i>
            </span>
        </a>
</div>
<teacherSearch></teacherSearch>
  <teachers></teachers>
    {{--  <div class="columns is-desktop ">
        @foreach ($users as $user)
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
                            <a href="{{route('admin.users.edit',[$user->id])}}" class="dropdown-item">
                              Edit
                            </a>

                          </div>
                        </div>
                      </div>
              <a href="{{ route('admin.users.show',[$user->id])}}">
                      <div class="card-image">
                        <figure class="image is-4by3">
                          <img class="svg-img" src="/img/user.svg" alt="{{ $user->name }}">
                        </figure>
                      </div>
                      <div class="card-content">
                        <div class="media">
                          <div class="media-content">
                            <p class="title">{{ $user->name }}</p>
                          </div>
                        </div>  
                      </div>
                    </div>
                </a>
          </div>
        @endforeach
    </div>  --}}
@endsection