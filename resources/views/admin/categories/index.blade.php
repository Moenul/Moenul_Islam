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
        <h3>Category</h3>&nbsp;&nbsp;<span>View Category</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="row">
        <div class="col-6">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr>
                    <th style="width:40px; text-align:center;">ID</th>
                    <th>Name</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($categories)
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td style="width:40px; text-align:center;">{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td style="width:80px; text-align:center; font-size: 20px;"><a href="{{ Route('admin.categories.edit', $category->id) }}"><i class="far fa-edit text-warning"></i></a></td>
                        <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCategoriesController@destroy', $category->id]]) !!}
                            {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
             </table>
        </div>
        <div class="col-md-1"></div>
        <div class="col-4">
            <h5 class="text-center text-success">Add New Category Item</h5>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
