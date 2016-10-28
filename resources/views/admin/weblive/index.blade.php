@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>微直播 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('/admin/weblive/create') }}" class="btn btn-success btn-md">
                    <i class="fa fa-plus-circle"></i> 新建微直播活动
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="lives-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>编号</th>
                            <th>微直播标题</th>
                            <th>发送时间</th>
                            <th class="hidden-md">观看人数</th>
                            <th class="hidden-md">点击次数</th>
                        </tr>
                     </thead>
                    <tbody>
                    @foreach ($lives as $live)
                        <tr>
                            <td>{{ $live->liveid }}</td>
                            <td>{{ $live->livetitle }}</td>
                            <td>{{ $live->livetime }}</td>
                            <td class="hidden-sm">{{ $live->pnum }}</td>
                            <td class="hidden-md">{{ $live->readnum }}</td>
                            <td>
                                <a href="{{ url('/admin/weblive').'/'.$live->liveid.'/edit' }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="{{ url('/admin/liveinfo').'/'.$live->liveid.'/edit' }}" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 详细
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function() {
            $("#lives-table").DataTable({
            });
        });
    </script>
@stop