@extends('layouts.admin')


@section('admin_side_nav')
    @include('includes.admin_side_nav')
@endsection

@section('admin_nav_bar')
    @include('includes.admin_nav_bar')
@endsection


@section('content')

    <!-- start header -->
    <div class="header">
        <h3>Profile</h3>&nbsp;&nbsp;<span>View Profile</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">


        <section class="vh-90">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-10 col-lg-7 col-xl-5">
                  <div class="card shadow" style="border-radius: 15px;">
                    <div class="card-body p-4">
                      <div class="d-flex text-black">
                        <div class="flex-shrink-0">
                          <img src="{{ $profile->photo ? $profile->photo->file : '/images/DummyProfile.jpg' }}"
                            alt="Generic placeholder image" class="img-fluid"
                            style="width: 180px; border-radius: 10px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <h5 class="ml-1 mb-0">{{ $profile->name }}</h5>
                            <p class="ml-2 mb-1" style="color: #2b2a2a;">
                                @if ($profile->title == Null)
                                    {{"Null"}}
                                @else
                                    {{$profile->title}}
                                @endif
                                {{ $profile->email }}
                            </p>
                            {{-- <p class="ml-2 pb-1" style="color: #2b2a2a;">

                            </p> --}}
                          <div class="d-flex justify-content-start rounded-3 p-2 mb-0"
                            style="background-color: #efefef;">
                            <div>
                              <p class="small text-muted mb-1">Articles</p>
                              <p class="mb-0">{{ $profile->article()->count() }}</p>
                            </div>
                            <div class="px-3">
                              <p class="small text-muted mb-1">Followers</p>
                              <p class="mb-0">N/A</p>
                            </div>
                            <div>
                              <p class="small text-muted mb-1">Rating</p>
                              <p class="mb-0">N/A</p>
                            </div>
                          </div>
                          <p class="m-1" style="color: #2b2a2a;">Role - {{ $profile->role->name }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    {!! Form::model($profile, ['method'=>'PATCH', 'action'=> ['AdminProfileController@update', $profile->id], 'files'=>true]) !!}
                    <div class="mb-2 d-flex justify-content-center">
                        <img class="action_field border border-secondary" id="preview_img" width="150px" height="150px" src="{{ $profile->photo ? $profile->photo->file : '/images/DummyProfile.jpg' }}">
                    </div>
                    <div class="form-group">
                        <small class="form-text text-muted">Image Aspect Ratio 1:1</small>
                        {!! Form::label('photo_id', 'Image:') !!}
                        {!! Form::file('photo_id', ['id' => 'imgInp'], null) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title','Profile Title:') !!}
                        {!! Form::text('title', $profile->title, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{-- <a href="../" class="btn btn-warning">Cancel</a> --}}
                        {!! Form::submit('Update Profile', ['class'=>'btn btn-primary float-right']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <div class="col-md-4"></div>
              </div>
            </div>
        </section>

    <!-- end dashboard content -->


@endsection
