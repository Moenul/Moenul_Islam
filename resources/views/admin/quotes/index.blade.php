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
        <h3>Quote</h3>&nbsp;&nbsp;<span>View Quote</span>
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
                    <th>Quote</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($quotes)
                <tbody>
                    @foreach ($quotes as $quote)
                    <tr>
                        <td style="width:40px; text-align:center;">{{$quote->id}}</td>
                        <td>{!! $quote->content !!}</td>
                        <td style="width:80px; text-align:center; font-size: 20px;"><a href="{{ Route('admin.quotes.edit', $quote->id) }}"><i class="far fa-edit text-warning"></i></a></td>
                        <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminQuotesController@destroy', $quote->id]]) !!}
                            {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                        {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
             </table>
        </div>
        <div class="col-6">
            <h5 class="text-center text-success">Add New Quote</h5>
            {!! Form::open(['method'=>'POST', 'action'=>'AdminQuotesController@store']) !!}
            <div class="form-group">
                {!! Form::label('content','Quote Content:') !!}
                {!! Form::textarea('content', null, ['class'=>'form-control','id'=>'editor']) !!}
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