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
        <h3>Social</h3>&nbsp;&nbsp;<span>View Social</span>
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
                    <th>Icon</th>
                    <th>Link</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($socials)
                <tbody>
                    @foreach ($socials as $social)
                    <tr>
                        <td style="width:40px; text-align:center;">{{$social->id}}</td>
                        <td style="font-size:40px; line-height:0">
                            <span style="color:{{$social->icon_color}};" class="iconify" data-icon="{{$social->social_icon}}"></span>
                        </td>
                        <td>{{$social->social_link}}</td>
                        <td style="width:80px; text-align:center; font-size: 20px;"><a href="{{ Route('admin.socials.edit', $social->id) }}"><i class="far fa-edit text-warning"></i></a></td>
                        <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminSocialsController@destroy', $social->id]]) !!}
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
            <h5 class="text-center text-success">Add New Social Item</h5>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminSocialsController@store']) !!}
            <div class="form-group">
                {!! Form::label('social_icon','Icon:') !!}
                {!! Form::text('social_icon', null, ['class'=>'form-control']) !!}
                <small class="form-text text-muted">iconify SVG Framework data-icon code</small>
            </div>
            <div class="form-group">
                {!! Form::label('icon_color','Icon Color:') !!}
                {!! Form::text('icon_color', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('social_link','Social Link:') !!}
                {!! Form::text('social_link', null, ['class'=>'form-control']) !!}
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
