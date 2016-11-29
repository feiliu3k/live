@extends('admin.layout')
@section('meta')
    <meta name="_token" content="{{ csrf_token() }}"/>
@stop
@section('styles')
    <link rel="stylesheet" href="{{ URL::asset('css/upload.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/default.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('assets/css/component.css') }}" >
@stop
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $live->livetitle }} <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/create' }}" class="btn btn-success btn-xs pull-right" >
                <i class="fa fa-plus-circle"></i> 新建
            </a></div>
            <div class="panel-body">
                <div class="col-md-12">
                    @include('admin.partials.errors')
                    @include('admin.partials.success')
                    <div class="main">
                        <ul class="cbp_tmtimeline">
                            @if ($live->webInfos)
                                @foreach ($live->webInfos as $liveinfo)
                                <li>
                                    <time class="cbp_tmtime" datetime="{{ $liveinfo->ifotime }}"><span>{{ $liveinfo->publishDate }}</span> <span>{{ $liveinfo->publishTime }}</span></time>
                                    <div class="cbp_tmicon cbp_tmicon-phone"></div>
                                    <div class="cbp_tmlabel">
                                        <h2>{{$liveinfo->ifotitle}}
                                            <div class="pull-right">
                                            <a href="{{ url('/admin/weblive').'/'. $live->liveid.'/liveinfo/'.$liveinfo->ifoid.'/edit' }}" class="btn btn-xs btn-success">
                                                <i class="fa fa-edit" ></i> 编辑
                                            </a>
                                            </div>
                                        </h2>
                                        {!! $liveinfo->ifocontent !!}
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-panel  panel panel-default">
            <div class="panel-heading">
                <div class="total">评论列表</div>
            </div>
            <div class="panel-body">
                <ul class="list-group row" >
                 @if ($live->comments)
                    @foreach ($live->comments as $comment)
                        <li class="list-group-item media" style="margin-top: 0px;">
                            <div class="infos">
                                <div class="media-heading meta">
                                    <span  class="remove-padding-left author">
                                        {{$comment->nickname}}
                                    </span>
                                    <span> • </span>
                                    <span>{{$comment->mobile}}</span>
                                    <span> • </span>
                                    <abbr class="time" >{{$comment->ctime}}</abbr>
                                    @if (Auth::check())
                                        <span class="operate pull-right">
                                            <button type="button" class="btn btn-danger btn-xs btn-delete" data-ucid="{{ $comment->ucid }}" data-liveid="{{ $comment->liveid }}" >
                                                <i class="fa fa-times-circle"></i>
                                                删除
                                            </button>
                                            <button type="button" class="btn btn-success btn-xs btn-verify" data-ucid="{{ $comment->ucid }}" data-liveid="{{ $comment->liveid }}" >
                                                <i class="fa fa-check-square-o"></i>
                                                @if ($comment->verifyflag==0)
                                                    通过
                                                @else
                                                    取消
                                                @endif
                                            </button>
                                        </span>
                                    @endif
                                </div>
                                <div class="media-body markdown-reply content-body">
                                    <p> {{$comment->ucomment}}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
                </ul>
            </div>
                {!! $live->comments()->orderby('ctime','desc')->paginate(config('weblive.posts_per_page'))->render() !!}
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
            $(function(){
            $(".btn-delete").click(function(event) {
                var _self=this;
                var sure=confirm('你确定要删除吗?');
                if (sure){
                    var ucid=$(this).attr("data-ucid");
                    var liveid=$(this).attr("data-liveid");

                    $.ajax({
                        type: 'POST',
                        url: '{{ url("admin/comment/destroy") }}',
                        data: {'ucid': ucid},
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(data){
                            $(_self).parents("li").remove();
                            //window.location.href='{{ url("/news") }}/'+tipid;
                        },
                        error: function(xhr, type){
                            alert('删除评论失败！');
                        }
                    });
                }
            });
            $(".btn-verify").click(function(event) {
                var _self=this;
                var ucid=$(this).attr("data-ucid");
                var liveid=$(this).attr("data-liveid");

                $.ajax({
                    type: 'POST',
                    url: '{{ url("admin/comment/verify") }}',
                    data: {'ucid': ucid},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    success: function(data){
                        //window.location.href='{{ url("/news") }}/'+tipid;
                       if(data.verifyflag===0){
                            $(_self).html('<i class="fa fa-check-square-o"></i> 通过 ');
                       }else{
                            $(_self).html('<i class="fa fa-check-square-o"></i> 取消 ');
                       }
                    },
                    error: function(xhr, type){
                        alert('审核修改失败！');
                    }
                });

            });

        });
    </script>
@stop