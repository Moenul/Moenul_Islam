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
        <h3>Articals</h3>&nbsp;&nbsp;<span>View Articals</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="row">
        <div class="col-8">
            <table class="table table-dark table-hover mx-auto">
                <thead>
                <tr>
                    <th style="width:40px; text-align:center;">ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Views</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($articals)
                <tbody>
                    @foreach ($articals as $artical)
                    <tr>
                        <td style="width:40px; text-align:center;">{{$artical->id}}</td>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->cat_id}}</td>
                        <td>{{$artical->views}}</td>
                        <td style="width:80px; text-align:center; font-size: 20px;"><a href="{{ Route('admin.articals.edit', $artical->id) }}"><i class="far fa-edit text-warning"></i></a></td>
                        <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminArticalsController@destroy', $artical->id]]) !!}
                            {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
             </table>
        </div>
        <div class="col-4">
            <a href="{{ Route('admin.articals.create') }}" class="btn btn-success col-12">Create New Artical</a>
        </div>


    </div>


    <!-- end dashboard content -->
</div>


@endsection