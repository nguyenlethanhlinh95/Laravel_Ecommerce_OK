@extends('layout.admin.master')

@section('header')
    <div class="row content_header_product" id="content_header_product">
        <h1>Report</h1>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Products
                </div>

                <div class="panel-body">
                    {{--@if ( ! $products->isEmpty())--}}
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
                                        {{--@if ($pro->image == null)--}}
                                            {{--<img style="width: 100px; height: 70px; object-fit: cover" src="images/image_null.jpg" alt="{{ $pro->pro_name }}">--}}
                                        {{--@else--}}
                                            {{--<img style="width: 100px; height: 70px; object-fit: cover" src="images/{{ $pro->image }}" alt="{{ $pro->pro_name }}">--}}

                                        {{--@endif--}}

                                    </td>
                                    <td class="center">{{ $pro->pro_code }}</td>
                                    <td class="center">{{ $pro->pro_price }}</td>
                                    <td class="center">{{ $pro->spl_price }}</td>
                                    <?php $i ++; ?>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        {{--<div class="pagination text-center" style="margin: 0 auto; display: block;">--}}
                            {{--{{ $products->links() }}--}}
                        </div>

                    </div>
                        {{--@else--}}
                        {{--<h4>Data not found !.</h4>--}}
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@stop
