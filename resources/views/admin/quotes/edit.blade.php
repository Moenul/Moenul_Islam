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
        <h3>Quote</h3>&nbsp;&nbsp;<span>Edit Quote</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            @if ($quote)
            <div class="col-md-2"></div>
            <div class="col-6">
                {!! Form::model($quote, ['method'=>'PATCH', 'action'=> ['AdminQuotesController@update', $quote->id]]) !!}

                <div class="form-group">
                    {!! Form::label('content','Quote Content:') !!}
                    {!! Form::textarea('content', $quote->content, ['class'=>'form-control','rows'=> 2]) !!}
                </div>

                <div class="form-group">
                    <a href="../" class="btn btn-warning">Cancel</a>
                    {!! Form::submit('Update Quote', ['class'=>'btn btn-primary float-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            @endif
        </div>
    </div>


    <!-- end dashboard content -->


@endsection
