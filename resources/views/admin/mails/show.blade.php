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
        <h3>Mail</h3>&nbsp;&nbsp;<span>Manage Mail</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            @if ($mail)
                <div class="col-6">
                    <p class="border-left p-2">
                        <span class="d-block"><label>From : </label><b> {{$mail->email}}</b></span>
                        <span class="d-block"><label>Date : </label> {{ \Carbon\Carbon::parse($mail->created_at)->format('d M Y | H:i A') }}</span>
                        <span class="d-block"><label>Subject : </label> {{$mail->subject}}</span>
                    </p>
                    <p class="border p-2">{{$mail->message}}</p>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-6">
                <p class="text-info pl-3 border-left">Reply this email</p>
                {!! Form::open(['method'=>'POST', 'action'=>'AdminMailsController@store', 'files'=>true]) !!}
                    @csrf

                    @if ($mail)
                        <input type="hidden" name="email" value="{{$mail->email}}">
                        <input type="hidden" name="subject" value="{{$mail->subject}}">
                        <input type="hidden" name="message" value="{{$mail->message}}">
                    @endif

                    <div class="form-group">
                        {!! Form::textarea('desc', null, ['class'=>'form-control','id'=>'editor','rows'=>4, 'cols'=>20, 'placeholder'=>'Write Here ...']) !!}
                    </div>
                    <div class="form-group">
                        <label for="file">Add Atachments :</label>
                        <input type="file" name="attachment[]" multiple>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Reply Mail', ['class'=>'btn btn-info bg-info float-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- start dashboard content -->

@endsection
