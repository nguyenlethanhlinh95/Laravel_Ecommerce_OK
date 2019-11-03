@extends('layout.admin.master')

@section('header')
    Product
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
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                        <td class="center">{{ $pro->spl_pro }}</td>
                                        <td class="center">
                                            <a href="{{ route('product.create') }}" title="Create">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a> |
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