@extends('admin.layout')
@section('styles')

    <link href="{{ URL::asset('assets/css/jrsx.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/lightbox.css') }}" rel="stylesheet">

@stop
@section('content')
    <div class="container-fluid">
        @include('admin.partials.errors')
        @include('admin.partials.success')
        <div class="col-md-8 col-md-offset-1 topics-index main-col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ul class="pull-right list-inline remove-margin-bottom topic-filter">
                        <li>
                            <i class="glyphicon glyphicon-time"></i> 评论列表
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body remove-padding-horizontal main-body">
                    <ul class="list-group row topic-list">
                        @if (count($comments)>0)
                            @foreach ($comments as $comment)
                                <li class="list-group-item media 1" style="margin-top: 0px;">                        
                                    <div class="infos">
                                        <div class="media-heading">
                                            {{ $comment->ucomment }}
                                        </div>
                                        <div class="add-margin-bottom">
                                            @if (count($comment->upimg)>0)
                                                @foreach ($comment->upimg as $img)
                                                    @if (!containsDescenders($img))
                                                        <img class="js-lightbox"
                                                        data-role="lightbox"
                                                        data-source="{{ config('weblive.comment_image_path').$img }}"
                                                        src="{{ config('weblive.comment_image_path').$img }}"
                                                        data-group="{{ $comment->ucid }}"
                                                        data-id="{{ $img }}"
                                                        data-caption="{{ $comment->nickname }}"
                                                        data-desc="{{ $comment->ucomment }}"
                                                        alt="{{ $img }}"
                                                        width="100px" height="100px" />
                                                    @else
                                                        <img class="js-videobox"
                                                        data-role="videobox"
                                                        data-source="{{ config('weblive.comment_image_path').$img }}"
                                                        src="{{ URL::asset('img/play.png') }}"
                                                        width="100px" height="100px" />
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="add-margin-bottom">
                                        <span class="username">昵称：{{ $comment->nickname }}</span>
                                            <span> • </span>
                                            <span class="dh">手机号码：{{ $comment->mobile }}</span>
                                            <span> • </span>
                                            <span class="postdate">发表时间：{{ $comment->ctime }}</span>
                                        </div>
                                        <div class="col-md-6">
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
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="panel-footer text-right">
                    {!! $comments->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script src="{{ URL::asset('assets/js/lightbox.js') }}"></script>
<script src="{{ URL::asset('assets/js/videobox.js') }}"></script>
<script>

    $(function() {
        var lightbox = new LightBox();
        var videobox = new VideoBox();
    });

</script>
@stop