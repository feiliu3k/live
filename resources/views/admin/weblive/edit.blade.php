@extends('admin.layout')
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
@stop
@section('content')
<div class="container">
    <div class="row page-title-row">
        <div class="col-md-12">
            <h3>微直播活动 <small>» 编辑</small></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑窗口</h3>
                </div>
                <div class="panel-body">

                    @include('admin.partials.errors')
                    @include('admin.partials.success')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/weblive').'/'. $liveid }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="liveid" value="{{ $liveid }}">



                        @include('admin.weblive._form')

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button type="submit" class="btn btn-primary btn-md">
                                    <i class="fa fa-save"></i>
                                    保存修改
                                </button>
                                <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-times-circle"></i>
                                    删除
                                </button>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="upload-mask">
    </div>
    <div class="panel panel-info upload-file">
        <div class="panel-heading">
            上传文件
            <span class="close pull-right">关闭</span>
        </div>
        <div class="panel-body">
            <div id="validation-errors"></div>
            <form method="POST" action="{{ url('upload/uploadImgFile') }}" id="imgForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label>文件上传</label>
                    <span class="require">(*)</span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input id="thumb" name="file" type="file"  required="required">
                    <input id="filetype"  type="hidden" name="filetype" value="">
                </div>
            </form>
        </div>
        <div class="panel-footer">
        </div>
    </div>
</div>

{{-- 确认删除 --}}
<div class="modal fade" id="modal-delete" tabIndex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    ×
                </button>
                <h4 class="modal-title">请确认</h4>
            </div>
            <div class="modal-body">
                <p class="lead">
                    <i class="fa fa-question-circle fa-lg"></i>
                    你是否要删除此活动?
                </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ url('/admin/weblive').'/'.$liveid }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-times-circle"></i> 确定
                    </button>
                </form>
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
    editor.render("livecontent");}

    $(function() {
        //datetimepacker;
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii",
            language: "zh-CN",
            autoclose: true,
            todayBtn: true
        });

        //上传图片相关

        $('.upload-mask').on('click',function(){
            $(this).hide();
            $('.upload-file').hide();
        });

        $('.upload-file .close').on('click',function(){
            $('.upload-mask').hide();
            $('.upload-file').hide();
        });


        $('.img-upload').on('click',function(){
            $('.upload-mask').show();
            $('.upload-file').show();

            $('#filetype').attr('value','image');
        });




        //ajax 上传
        $(document).ready(function() {
            var options = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                dataType: 'json'
            };
            $('#imgForm input[name=file]').on('change', function(){
                //$('#upload-avatar').html('正在上传...');
                $('#imgForm').ajaxForm(options).submit();
            });
        });

        function showRequest() {
            $("#validation-errors").hide().empty();
            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {
            if(!response.success)
            {
                var responseErrors = response.errors;

                $("#validation-errors").append('<div class="alert alert-error"><strong>'+ responseErrors +'</strong><div>');

                $("#validation-errors").show();
            } else {

                $('.upload-mask').hide();
                $('.upload-file').hide();
                if (response.filetype=='image'){
                    $("#liveimg").val(response.src);
                }

            }
        }

    });
</script>
@stop