@extends('admin.layout')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/default.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/component.css') }}" >
@stop
@section('content')
    <div class="container">
        <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">{{ $live->livetitle }} <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/create' }}" class="btn btn-success btn-xs pull-right" >
                <i class="fa fa-plus-circle"></i> 新建
            </a></div>
            <div class="panel-body">
                <div class="col-md-12">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                    <div class="main">
                        <ul class="cbp_tmtimeline">
                            @if $live->webInfos
                                foreach($liveinfo in $live->webInfos)
                            <li>
                                <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>4/10/13</span> <span>18:30</span></time>
                                <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                <div class="cbp_tmlabel">
                                    <h2>{{$liveinfo->ifotitle}}
                                         <a href="" class="btn btn-xs btn-success">
                                            <i class="fa fa-edit" ></i> 编辑
                                        </a>
                                        <a href="" class="btn btn-xs btn-danger">
                                            <i class="fa fa-trash" ></i> 删除
                                        </a>
                                    </h2>
                                    {!! $liveinfo->ifocontent !!}
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ URL::asset('assets/js/jquery.form.js') }}"></script>
    <script charset="UTF-8" src="{{ URL::asset('assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script charset="UTF-8" src="{{ URL::asset('assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/ueditor.config.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/ueditor.all.min.js') }}"></script>
    <script type="text/javascript" charset="utf-8" src="{{ URL::asset('assets/ueditor/lang/zh-cn/zh-cn.js') }}"></script>
@stop