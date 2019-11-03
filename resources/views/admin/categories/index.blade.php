@extends('layout.admin.master')

@section('header')
    Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List category
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="70px">STT</th>
                                    <th>Mã danh mục</th>
                                    <th>Tên Danh mục</th>
                                    <th width="100px">Slug</th>
                                    <th width="100px">Mô tả</th>
                                    <th>Danh Mục cha</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($categories as $cat)
                                    <tr @if ($i %2 == 1) {{ 'class="odd gradeX"'  }} @else {{ 'class="even gradeC"' }} @endif>
                                        <th>{{ $i }}</th>
                                        <td>{{ $cat->id }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td class="center">{{ $cat->slug }}</td>
                                        <td class="center">{{ $cat->description	 }}</td>
                                        <td class="center">{{ $cat->parent_id }}</td>
                                        <td class="center">
                                            <a href="{{ route('category.create') }}" title="Create">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a> |
                                            <a href="{{ route('category.edit', ['id'=>$cat->id]) }}" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true">

                                                </i>
                                            </a> |
                                            <a href="{{ route('category.show', ['id'=>$cat->id]) }}" title="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <?php $i ++; ?>
                                    </tr>


                                    @endforeach

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