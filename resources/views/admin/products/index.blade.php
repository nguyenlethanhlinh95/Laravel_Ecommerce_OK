@extends('layout.admin.master')

@section('header')
    <div class="row content_header_product">
        <div class="col-lg-6">
            <div class="button-group">
                <button class="btn btn-danger active">All @if($count>0) {{ '('. $count .')' }} @endif</button>
                <button class="btn btn-info">Published</button>
                <button class="btn btn-info">Not published</button>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <div class="form-group">
                <div class="col-sm-10">
                    <input id="search_product" class="form-control" type="text" placeholder="Search">
                </div>
                <button class="btn btn-dark col-sm-2" id="btn_search">Search</button>
            </div>

            <div class="form-group">
                <a href="{{ route('print_priview') }}" class="btnprn btn">Print Preview</a>
            </div>
        </div>
    </div>

    <div class="mgt-20">
        Product <span><a href="{{ route('product.create') }}">Add new</a></span>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List product
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="table_product" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="70px">STT</th>
                                    <th>Mã SP</th>
                                    <th>Tên sp</th>
                                    <th width="100px">Hình ảnh</th>
                                    <th>Mã code</th>
                                    <th>Giá</th>
                                    <th>Giá giảm</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($products as $pro)
                                    <tr @if ($i %2 == 1) {{ 'class="odd gradeX"'  }} @else {{ 'class="even gradeC"' }} @endif>
                                        <th>{{ $i }}</th>
                                        <td>{{ $pro->id }}</td>
                                        <td>{{ $pro->pro_name }}</td>
                                        <td>
                                            @if ($pro->image == null)
                                                <img style="width: 100px; height: 70px; object-fit: cover" src="images/image_null.jpg" alt="{{ $pro->pro_name }}">
                                            @else
                                                <img style="width: 100px; height: 70px; object-fit: cover" src="images/{{ $pro->image }}" alt="{{ $pro->pro_name }}">

                                            @endif

                                        </td>
                                        <td class="center">{{ $pro->pro_code }}</td>
                                        <td class="center">{{ $pro->pro_price }}</td>
                                        <td class="center">{{ $pro->spl_price }}</td>
                                        <td class="center">
                                            <a href="{{ route('product.edit', ['id'=>$pro->id]) }}" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true">

                                                </i>
                                            </a> |
                                            <a href="{{ route('product.show', ['id'=>$pro->id]) }}" title="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <?php $i ++; ?>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>

                        <div class="pagination text-center" style="margin: 0 auto; display: block;">
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--Xu ly ajax--}}
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dom = {
            init: function () {
                dom.registerEvent();
            },
            registerEvent: function () {
                $('#btn_search').off('click').on('click', function () {
                   var value = $('#search_product').val();
                   if (value != '')
                   {
                       $.ajax({
                           type: 'POST',
                           dataType: 'json',
                           url: '{{ route('testAjax') }}',
                           data:{str:value},
                           success: function (response) {
                               var data = response.data;
                               const count = data.length;

                               var url = "<?php route('product.edit', 2) ?>";
                               if (count > 0)
                               {
                                    var elementDom = '';
                                    for (var i=0; i<count; i++)
                                    {
                                        var url_edit = '{{ route("product.edit", ":id") }}';
                                        url_edit = url_edit.replace(':id', data[i].id);

                                        var url_delete = '{{ route("product.show", ":id") }}';
                                        url_delete = url_delete.replace(':id', data[i].id);

                                        var image_url = '{{ URL::asset('/images') }}/' + data[i].image;
                                        elementDom +=
                                            '<tr>' +
                                                '<td>' + i+1 +'</td>' +
                                                '<td>' + data[i].id +'</td>' +
                                                '<td>'+ data[i].pro_name +'</td>' +
                                                '<td><img width="100px" height="70px" src="' + image_url + '" alt="'+ data[i].pro_name +'"></td>' +
                                                '<td>' + data[i].pro_code +'</td>' +
                                                '<td>' + data[i].pro_price + '</td>' +
                                                '<td>'+ data[i].spl_price +'</td>' +
                                                '<td>' +
                                                    '<a href='+ url_edit +'>' +
                                                        "<i class='fa fa-pencil' aria-hidden='true'></i>" +
                                                    '</a> | '+
                                                    '<a href='+ url_delete +'>' +
                                                        "<i class='fa fa-trash-o' aria-hidden='true'></i>" +
                                                    '</a>'+
                                                '</td>' +
                                            '</tr>'
                                    }

                                    //console.log(elementDom);
                                   $('#table_product tbody').empty();
                                   $('#table_product tbody').append(elementDom);
                               }
                           }
                       });
                   }
                   else
                   {
                       alert('Data empty !!');
                   }
                });
            }
        }
        dom.init();
    </script>
@endsection