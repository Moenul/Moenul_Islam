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
        <h3>Social</h3>&nbsp;&nbsp;<span>Edit Social</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            @if ($social)
            <div class="col-md-3"></div>
            <div class="col-4 m-0">
                {!! Form::model($social, ['method'=>'PATCH', 'action'=> ['AdminSocialsController@update', $social->id]]) !!}

                <div class="form-group">
                    {!! Form::label('social_icon','Icon:') !!}
                    {!! Form::text('social_icon', $social->social_icon, ['class'=>'form-control']) !!}
                    <small class="form-text text-muted">iconify SVG Framework data-icon code</small>
                </div>
                <div class="form-group">
                    {!! Form::label('icon_color','Icon Color:') !!}
                    {!! Form::text('icon_color', $social->icon_color, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('social_link','Social Link:') !!}
                    {!! Form::text('social_link', $social->social_link, ['class'=>'form-control']) !!}
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
