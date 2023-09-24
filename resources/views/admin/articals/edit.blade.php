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
        <h3>Artical</h3>&nbsp;&nbsp;<span>Edit Artical</span>
        <a href="{{ url('/') }}"><i class="fas fa-home"></i>Home</a>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="row">
        @if ($artical)
        <div class="col-md-2"></div>
        <div class="col-8">
            <h5 class="text-center text-success">Update Artical</h5>
            {!! Form::model($artical, ['method'=>'PATCH', 'action'=> ['AdminArticalsController@update', $artical->id]]) !!}

            <div class="form-group">
                {!! Form::label('title','Artical Title:') !!}
                {!! Form::text('title', $artical->title, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('cat_id','Artical Category:') !!}
                {!! Form::select('cat_id', [$artical->cat_id => $artical->category->name] + $categories, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content','Artical Content:') !!}
                {!! Form::textarea('content', $artical->content, ['class'=>'form-control','id'=>'editor']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tags','Artical Tags:') !!}
                {!! Form::text('tags', $artical->tags, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <a href="../" class="btn btn-warning">Cancel</a>
                {!! Form::submit('Update Artical', ['class'=>'btn btn-primary float-right']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        @endif
    </div>


    <!-- end dashboard content -->
</div>


@endsection
