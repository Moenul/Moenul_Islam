@extends('layouts.admin')

@section('admin_nav_bar')
    @include('includes.admin_nav_bar')
@endsection

@section('admin_side_nav')
    @include('includes.admin_side_nav')
@endsection


@section('content')

<div class="content_section">
    <!-- start header -->
    <div class="header">
        <h3>Gallery</h3>&nbsp;&nbsp;<span>Edit Gallery</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->



    <div class="row">
        @if ($gallery)

        <div class="col-2"></div>
        <div class="col-6">
            {!! Form::model($gallery, ['method'=>'PATCH', 'action'=> ['AdminGalleriesController@update', $gallery->id], 'files'=>true]) !!}

            <div class="mb-2 d-flex justify-content-center">
                <img class="action_field border border-secondary" id="preview_img" width="200px" height="150px" src="{{ $gallery->photo ? $gallery->photo->file : '/images/Empty _Images.jpg' }}">
            </div>
            <div class="form-group">
                <small class="form-text text-muted">Image Aspect Ratio 4:3</small>
                {!! Form::label('photo_id', 'Image:') !!}
                {!! Form::file('photo_id', ['id' => 'imgInp'], null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('desc','Gallery Description:') !!}
                {!! Form::textarea('desc', $gallery->desc, ['class'=>'form-control', 'rows'=>2]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('link','Gallery Link:') !!}
                {!! Form::text('link', $gallery->link, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <a href="../" class="btn btn-warning">Cancel</a>
                {!! Form::submit('Update Gallery', ['class'=>'btn btn-primary float-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        @endif
    </div>



    <!-- end dashboard content -->
</div>


@endsection
