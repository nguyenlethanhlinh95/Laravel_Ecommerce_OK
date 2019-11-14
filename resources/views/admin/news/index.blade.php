@extends('layout.admin.master')

@section('header')
    News
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List News
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="70px">STT</th>
                                    <th>Mã tin tức</th>
                                    <th>Tên Tin tức</th>
                                    <th width="100px">Slug</th>
                                    <th width="100px">Mô tả</th>
                                    <th>Danh Mục tin tức</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>

                        <div class="pagination text-center" style="margin: 0 auto; display: block;">
                            {{ $categories->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection