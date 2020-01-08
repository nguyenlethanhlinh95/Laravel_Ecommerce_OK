@extends('layout.admin.master')

@section('header')
    Pages <span><a href="{{ route('page.create') }}">Add new</a></span>
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
                                    <th width="25px" class="text-center">
                                        <input id="cb-select-all-1" type="checkbox">
                                    </th>
                                    <th width="300px">
                                        <span>Title</span>
                                    </th>
                                    {{--<th width="150px">--}}
                                        {{--<span>Author</span>--}}
                                    {{--</th>--}}
                                    <th width="150px">
                                        <span>Date</span>
                                    </th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$getAllPage->isEmpty())
                                    @foreach($getAllPage as $page)
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox">
                                            </td>
                                            <td>{{ $page->title }}</td>
                                            {{--<td>Thanh Linh</td>--}}
                                            <td>{{ $page->created_at->format('m/d/Y') }}</td>
                                            <td>
                                                <a href="{{ route('page.create') }}" title="Create">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </a> |
                                                <a href="{{ route('page.edit', ['id'=>$page->id]) }}" title="Edit">
                                                    <i class="fa fa-pencil" aria-hidden="true">

                                                    </i>
                                                </a> |
                                                <a href="{{ route('page.show', ['id'=>$page->id]) }}" title="Delete">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">
                                            Data not found
                                        </td>
                                    </tr>
                                @endif
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

