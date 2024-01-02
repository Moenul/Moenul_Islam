@extends('layouts.admin')
@section('style')

<!-- Bootstrap 5 CDN Link  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Database CSS link ( includes Bootstrap 5 )  -->
<link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

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
        <h3>Gallery</h3>&nbsp;&nbsp;<span>View Galleries</span>
        <hr>
    </div>
    <!-- end header -->

    <!-- start dashboard content -->

    <div class="container">
        <div class="row">

            <div class="col-7">
                <table id="table" class="table table-dark table-hover mx-auto">
                    {{ csrf_field() }}
                    <thead>
                    <tr>
                        <th style="width:40px; text-align:center;">Order</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th style="width:80px; text-align:center;">Action</th>
                    </tr>
                    </thead>
                    @if ($galleries)
                    <tbody id="tableBodyContents">
                        @foreach ($galleries as $gallery)
                        <tr class="tableRow" data-id="{{ $gallery->id }}">
                            {{-- <td style="width:40px; text-align:center;">{{$gallery->id}}</td> --}}
                            <td style="width:40px; text-align:center;">{{$gallery->order}}</td>
                            <td>
                                <div style=" width: 160px; height: 100px; overflow: hidden;" class="border border-secondary">
                                    <img width="100%" height="max-content" src="{{ $gallery->photo ? $gallery->photo->file : '/images/Empty_Images_Landscape.jpg' }}">
                                </div>
                            </td>
                            <td>{{$gallery->desc}}</td>
                            <td>
                                @if ($gallery->status == 1)
                                    {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminGalleriesController@update', $gallery->id]]) !!}
                                    <input type="hidden" name="status" value="0">
                                    <div class='form-group'>
                                    {!! Form::submit('Off', ['class'=>'btn btn-sm btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::open(['method'=>'PATCH', 'action'=> ['AdminGalleriesController@update', $gallery->id]]) !!}
                                    <input type="hidden" name="status" value="1">
                                    <div class='form-group'>
                                    {!! Form::submit('On', ['class'=>'btn btn-sm btn-success']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            </td>

                            <td style="display: flex; justify-content: center; align-items: center;">
                            <a class="btn" href="{{ Route('admin.galleries.edit', $gallery->id) }}"><i class="far fa-edit text-warning"></i></a>

                            {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminGalleriesController@destroy', $gallery->id]]) !!}
                                {{ Form::button('<i class="fas fa-trash-alt text-danger"></i>', ['type' => 'submit', 'class' => 'btn'] )  }}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>


            <div class="col-5">
                <h5 class="text-center text-success">Add New Gallery</h5>
                {!! Form::open(['method'=>'POST', 'action'=>'AdminGalleriesController@store', 'files'=>true]) !!}
                <div style=" width: 200px; height: 150px; overflow: hidden; margin:0 auto;" class="border border-secondary">
                    <img class="action_field" width="100%" height="max-content" id="preview_img" src="{{ '/images/Empty_Images_Landscape.jpg' }}">
                </div>
                <div class="form-group">
                    <small class="form-text text-muted">Image Aspect Ratio 4:3</small>
                    {!! Form::label('photo_id', 'Image:') !!}
                    {!! Form::file('photo_id', ['id' => 'imgInp'], null) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('desc','Gallery Description:') !!}
                    {!! Form::textarea('desc', null, ['class'=>'form-control', 'rows'=>2]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('link','Gallery Link:') !!}
                    {!! Form::text('link', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-success  float-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>


        </div>
    </div>

    <!-- end dashboard content -->


@endsection


@section('script')

 <!-- Bootstrap 5 Bundle CDN Link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

 <!-- jQuery UI CDN Link -->
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

 <!-- DataTables JS CDN Link -->
 <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

 <!-- DataTables JS ( includes Bootstrap 5 for design [UI] ) CDN Link -->
 <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>



<script type="text/javascript">
    $(function () {

        $("#table").DataTable();

        $("#tableBodyContents").sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
                sendOrderToServer();
            }
        });

        function sendOrderToServer() {

            var order = [];
            var token = $('meta[name="csrf-token"]').attr('content');

            $('tr.tableRow').each(function(index,element) {
                order.push({
                    id: $(this).attr('data-id'),
                    position: index+1
                });
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ url('/admin/galleries-reorder') }}",
                data: {
                    order: order,
                    _token: token
                },
                success: function(response) {
                    if (response.status == "success") {
                        console.log(response);
                    } else {
                        console.log(response);
                    }
                }
            });
        }
    });
</script>

@endsection
