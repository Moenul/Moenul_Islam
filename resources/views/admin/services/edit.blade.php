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
        <h3>Service</h3>&nbsp;&nbsp;<span>Edit Service</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            @if ($service)
            <div class="col-3"></div>
            <div class="col-6 m-0">
                {!! Form::model($service, ['method'=>'PATCH', 'action'=> ['AdminServicesController@update', $service->id]]) !!}

                <div class="form-group">
                    {!! Form::label('service_icon','Service Icon:') !!}
                    {!! Form::text('service_icon', $service->service_icon, ['class'=>'form-control']) !!}
                    <small class="form-text text-muted">iconify SVG Framework data-icon code</small>
                </div>
                <div class="form-group">
                    {!! Form::label('service_name','Service Name:') !!}
                    {!! Form::text('service_name',  $service->service_name, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service_desc','Service Description:') !!}
                    {!! Form::textarea('service_desc',  $service->service_desc, ['class'=>'form-control','rows'=> 2]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service_title','Service Title:') !!}
                    {!! Form::text('service_title',  $service->service_title, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service_type','Service Type:') !!}
                    {!! Form::text('service_type',  $service->service_type, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service_component_title','Service Component Title:') !!}
                    {!! Form::text('service_component_title',  $service->service_component_title, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('service_components','Service Components:') !!}
                    {!! Form::textarea('service_components',  $service->service_components, ['class'=>'form-control','id'=>'editor','rows'=> 5]) !!}
                </div>
                <div class="form-group">
                    <a href="../" class="btn btn-warning">Cancel</a>
                    {!! Form::submit('Update Service', ['class'=>'btn btn-primary float-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            @endif
        </div>
    </div>


    <!-- end dashboard content -->


@endsection
