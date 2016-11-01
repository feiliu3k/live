@extends('admin.layout')

@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
@stop

@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>微直播详细信息 <small>» 新建</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">新建窗口</h3>
                </div>
                <div class="panel-body">

                    @include('admin.partials.errors')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/weblive').'/'.$liveid.'/liveinfo' }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" class="form-control" name="liveid" id="liveid" value="{{ $liveid }}">

                            @include('admin.webinfo._form')

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i>
                                        添加
                                    </button>
                                </div>
                            </div>

                        </form>

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

<script>
    try{
        if (editor) {editor.destroy();}
    }
    finally {
        var editor = new UE.ui.Editor();
        editor.ready(function() {
        editor.execCommand( 'fontfamily', '微软雅黑' );
    });
    editor.render("ifocontent");}

    $(function() {
        //datetimepacker;
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            language: "zh-CN",
            autoclose: true,
            todayBtn: true
        });


    });
</script>
@stop