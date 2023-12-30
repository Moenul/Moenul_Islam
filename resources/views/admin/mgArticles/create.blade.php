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
        <h3>Articles</h3>&nbsp;&nbsp;<span>Create Articles</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h5 class="text-center text-success">Create New Article</h5>
                {!! Form::open(['method'=>'POST', 'action'=>'AdminMgArticlesController@store']) !!}

                @if (Auth::check())
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                @endif

                <div class="form-group">
                    {!! Form::label('title','Article Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cat_id','Article Category:') !!}
                    {!! Form::select('cat_id', $categories, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content','Article Content:') !!}
                    {!! Form::textarea('content', null, ['class'=>'form-control','id'=>'editor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content_bn','Article Content BN:') !!}
                    {!! Form::textarea('content_bn', null, ['class'=>'form-control','id'=>'editor2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('read_time','Read to time:') !!}
                    {!! Form::text('read_time', "5 Min to Read", ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags','Article Tags:') !!}
                    {!! Form::text('tags', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <a href="./" class="btn btn-warning">Cancel</a>
                    {!! Form::submit('Create Article', ['class'=>'btn btn-success  float-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    <!-- end dashboard content -->

@endsection
