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
        <h3>Gallery</h3>&nbsp;&nbsp;<span>View Galleries</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="row">

        <div class="col-7">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr>
                    <th style="width:40px; text-align:center;">ID</th>
                    <th>Image</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($galleries)
                <tbody>
                    @foreach ($galleries as $gallery)
                    <tr>
                        <td style="width:40px; text-align:center;">{{$gallery->id}}</td>
                        <td>
                            <img class="action_field border border-secondary" id="preview_img" width="200px" height="150px" src="{{ $gallery->photo ? $gallery->photo->file : '/images/Empty_Images.jpg' }}">
                        </td>
                        <td style="width:80px; text-align:center; font-size: 20px;"><a href="{{ Route('admin.galleries.edit', $gallery->id) }}"><i class="far fa-edit text-warning"></i></a></td>
                        <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminGalleriesController@destroy', $gallery->id]]) !!}
                            {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
             </table>
        </div>


        <div class="col-5">
            <h5 class="text-center text-success">Add New Gallery</h5>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminGalleriesController@store', 'files'=>true]) !!}
            <div class="mb-2 d-flex justify-content-center">
                <img  class="action_field border border-secondary" id="preview_img" width="200px" height="150px"  src="{{ '/images/Empty_Images.jpg' }}">
            </div>
            <div class="form-group">
                <small class="form-text text-muted">Image Aspect Ratio 4:3</small>
                {!! Form::label('photo_id', 'Image:') !!}
                {!! Form::file('photo_id', ['id' => 'imgInp'], null) !!}
            </div>
            <div class="form-group">
                {!! Form::label('desc','Gallery Description:') !!}
                {!! Form::textarea('desc', null, ['class'=>'form-control', 'rows'=>2]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('link','Gallery Link:') !!}
                {!! Form::text('link', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-success  float-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>


    <!-- end dashboard content -->
</div>


@endsection
