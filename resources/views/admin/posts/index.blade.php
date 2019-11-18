@extends('layout.admin.master')

@section('header')
    Post
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Posts
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="50px">STT</th>
                                    <th width="75px">Mã tin tức</th>
                                    <th width="200px">Tên Tin tức</th>
                                    <th width="150px">Slug</th>
                                    <th width="150px">Hình Ảnh</th>
                                    <th width="350px">Mô tả</th>
                                    <th>Danh Mục tin tức</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($posts as $post)
                                    <tr @if ($i %2 == 1) {{ 'class="odd gradeX"'  }} @else {{ 'class="even gradeC"' }} @endif>
                                        <td>{{ $i }}</td>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td class="center">{{ $post->slug }}</td>
                                        <td>
                                            <div class="flex-center">
                                                <img @if($post->image == "posts/news_null.jpg") src="{{ 'images/posts/news_null.png' }}" @else src="{{ 'images/' . $post->image }}" @endif  alt="" style="width: 100px; height: 65px; object-fit:  contain">
                                            </div>
                                        </td>
                                        <td class="center">{{ $post->description}}</td>
                                        <td class="center">
                                            @foreach($categoryName as $cate => $value)
                                                @if($post->category_id == $value)
                                                    {{ $cate}}
                                                @endif
                                            @endforeach

                                        </td>
                                        <td class="center">
                                            <a href="{{ route('post.create') }}" title="Create">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a> |
                                            <a href="{{ route('post.edit', ['id'=>$post->id]) }}" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true">

                                                </i>
                                            </a> |
                                            <a href="{{ route('post.show', ['id'=>$post->id]) }}" title="Delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <?php $i ++; ?>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="pagination text-center" style="margin: 0 auto; display: block;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

