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
        <h3>Articals</h3>&nbsp;&nbsp;<span>Create Articals</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h5 class="text-center text-success">Create New Artical</h5>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminArticalsController@store']) !!}
            <div class="form-group">
                {!! Form::label('title','Artical Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cat_id','Artical Category:') !!}
                {!! Form::select('cat_id', $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content','Artical Content:') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control','id'=>'editor']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tags','Artical Tags:') !!}
                {!! Form::text('tags', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <a href="./" class="btn btn-warning">Cancel</a>
                {!! Form::submit('Create Artical', ['class'=>'btn btn-success  float-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    <!-- end dashboard content -->
</div>


@endsection
