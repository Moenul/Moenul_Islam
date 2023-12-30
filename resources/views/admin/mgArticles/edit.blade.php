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
        <h3>Article</h3>&nbsp;&nbsp;<span>Edit Article</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="row">
            @if ($article)
            <div class="col-md-2"></div>
            <div class="col-8">
                <h5 class="text-center text-success">Update article</h5>
                {!! Form::model($article, ['method'=>'PATCH', 'action'=> ['AdminMgArticlesController@update', $article->id]]) !!}

                <div class="form-group">
                    {!! Form::label('title','Article Title:') !!}
                    {!! Form::text('title', $article->title, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cat_id','Article Category:') !!}
                    {!! Form::select('cat_id', [$article->cat_id => $article->category->name] + $categories, null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content','Article Content:') !!}
                    {!! Form::textarea('content', $article->content, ['class'=>'form-control','id'=>'editor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content_bn','Article Content BN:') !!}
                    {!! Form::textarea('content_bn', $article->content_bn, ['class'=>'form-control','id'=>'editor2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('read_time','Read to time:') !!}
                    {!! Form::text('read_time', $article->read_time, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tags','Article Tags:') !!}
                    {!! Form::text('tags', $article->tags, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <a href="../" class="btn btn-warning">Cancel</a>
                    {!! Form::submit('Update Article', ['class'=>'btn btn-primary float-right']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            @endif
        </div>
    </div>


    <!-- end dashboard content -->

@endsection
