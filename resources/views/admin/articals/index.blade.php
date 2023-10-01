@extends('layouts.admin')

@section('style')
    @include('includes.JsDynamicSearchStyle')
@endsection

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
            <div class="col-6"></div>
            <div class="col-4">
                <div class="tb_search">
                    <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search Student by Keyward ..." class="form-control">
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
                    <th>Category</th>
                    <th>Today Views</th>
                    <th>Total Views</th>
                    <th>Unique Views</th>
                    <th>Show</th>
                    <th style="width:80px; text-align:center;">Edit</th>
                    <th style="width:80px; text-align:center;">Delete</th>
                </tr>
                </thead>
                @if ($articals)
                <tbody>
                    @foreach ($articals as $artical)
                    <tr>
                        <td>{!! Str::limit($artical->title, 40, ' ...') !!}</td>
                        <td>{{$artical->category->name}}</td>
                        <td>{!! views($artical)->period(CyrildeWit\EloquentViewable\Support\Period::create(\Carbon\Carbon::today()))->count(); !!}</td>
                        <td>{!! views($artical)->count() !!}</td>
                        <td>{!! views($artical)->unique()->count() !!}</td>
                        <td><a href="{{ Route('articals.show', $artical->slug) }}" class="btn btn-sm btn-primary">Show</a></td>
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
        {{-- <div class="col-4">
            <a href="{{ Route('admin.articals.create') }}" class="btn btn-success col-12">Create New Artical</a>
        </div> --}}


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

    <!-- end dashboard content -->
</div>


@endsection

@section('script')
    @include('includes.JsDynamicSearchScript')
@endsection
