@extends('layouts.admin')

@section('style')
    @include('includes.JsDynamicSearchStyle')
@endsection


@section('admin_side_nav')
    @include('includes.admin_side_nav')
@endsection

@section('admin_nav_bar')
    @include('includes.admin_nav_bar')
@endsection


@section('content')

    <!-- start header -->
    <div class="header">
        <h3>Articles</h3>&nbsp;&nbsp;<span>View Articles</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->
    <div class="container">
        <div class="col-3 float-right">
            <a href="{{ Route('admin.mgArticles.create') }}" class="btn btn-success col-12">Create New Article</a>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2">
                    <select class  ="form-control" name="state" id="maxRows">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                        <option value="5000">Show ALL Rows</option>
                    </select>
                </div>
                <div class="col-4"></div>
                <div class="col-6">
                    <div class="tb_search">
                        <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search Article by Keyward ..." class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-hover table-class table-sm" id="table-id">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Today Views</th>
                        <th>Total Views</th>
                        <th>Unique Views</th>
                        <th style="width:80px; text-align:center;">Action</th>
                    </tr>
                    </thead>
                    @if ($articles)
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{!! Str::limit($article->title, 40, ' ...') !!}</td>
                            <td>{{$article->user->name}}</td>
                            <td>{{$article->category->name}}</td>
                            <td>{!! views($article)->period(CyrildeWit\EloquentViewable\Support\Period::create(\Carbon\Carbon::today()))->count(); !!}</td>
                            <td>{!! views($article)->count() !!}</td>
                            <td>{!! views($article)->unique()->count() !!}</td>

                            <td style="display: flex; justify-content: center; align-items: center;">
                                <a class="btn btn-sm btn-primary" href="{{ Route('articles.show', $article->slug) }}">Show</a>
                                <a class="btn" href="{{ Route('admin.mgArticles.edit', $article->id) }}"><i class="far fa-edit text-warning"></i></a>

                                {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminMgArticlesController@destroy', $article->id]]) !!}
                                    {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>



        </div>


        <!--	Start Pagination    -->
        <div>
            <div class='pagination-container'>
                <nav>
                <ul class="pagination">
                <!--	Here the JS Function Will Add the Rows -->
                </ul>
                </nav>
            </div>
            <div class="rows_count float-right text-secondary">Showing 11 to 20 of 91 entries</div>
        </div>
        <!--	End Pagination    -->
    </div>

    <!-- end dashboard content -->

@endsection

@section('script')
    @include('includes.JsDynamicSearchScript')
@endsection
