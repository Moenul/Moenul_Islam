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
        <h3>Category</h3>&nbsp;&nbsp;<span>Edit Category</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            @if ($category)
            <div class="col-md-3"></div>
            <div class="col-4 m-0">
                {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['AdminCategoriesController@update', $category->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <a href="../" class="btn btn-warning">Cancel</a>
                    {!! Form::submit('Update Item', ['class'=>'btn btn-primary float-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            @endif
        </div>
    </div>


    <!-- end dashboard content -->

@endsection
