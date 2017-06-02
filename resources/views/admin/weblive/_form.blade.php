<div class="form-group">
    <label for="proname" class="col-md-3 control-label">
        栏目名称
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="proname" id="proname" value="{{ $proname }}">
    </div>
</div>

<div class="form-group">
    <label for="livetitle" class="col-md-3 control-label">
        标题
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="livetitle" id="livetitle" value="{{ $livetitle }}">
    </div>
</div>

<div class="form-group">
    <label for="livetime" class="col-md-3 control-label">
        时间
    </label>
    <div class="col-md-8 input-append date form_datetime">
        <input type="text" class="form-control datetimepicker" readonly name="livetime" id="livetime"  value="{{ $livetime }}">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
</div>

<div class="form-group">
    <label for="liveimg" class="col-md-3 control-label">
        封面
    </label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="liveimg"  id="liveimg" value="{{ $liveimg }}" >
    </div>
    <div class="col-md-2 thumb-wrap">
        <div class="img-upload btn btn-block btn-info btn-flat" title="点击上传">点击上传</div>
    </div>
</div>

<div class="form-group">
    <label for="adname" class="col-md-3 control-label">
        广告名称
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="adname" id="adname" value="{{ $adname }}">
    </div>
</div>
<div class="form-group">
    <label for="adlink" class="col-md-3 control-label">
        广告链接
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="adlink" id="adlink" value="{{ $adlink }}">
    </div>
</div>
<div class="form-group">
    <label for="adimg" class="col-md-3 control-label">
        广告图片
    </label>
    <div class="col-md-6">
        <input type="text" class="form-control" name="adimg"  id="adimg" value="{{ $adimg }}" >
    </div>
    <div class="col-md-2 thumb-wrap">
        <div class="adimg-upload btn btn-block btn-info btn-flat" title="点击上传">点击上传</div>
    </div>
</div>

<div class="form-group">
    <label for="pnum" class="col-md-3 control-label">
        观看人数
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="pnum" id="pnum" value="{{ $pnum }}">
    </div>
</div>

<div class="form-group">
    <label for="realreadnum" class="col-md-3 control-label">
        真实点击数
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="realreadnum" id="realreadnum" value="{{ $realreadnum }}">
    </div>
</div>

<div class="form-group">
    <label for="readnum" class="col-md-3 control-label">
        点击次数
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="readnum" id="readnum" value="{{ $readnum }}">
    </div>
</div>

<div class="form-group">
    <label for="hlsurl" class="col-md-3 control-label">
        hls地址
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="hlsurl" id="hlsurl" value="{{ $hlsurl }}">
    </div>
</div>

<div class="form-group">
    <label for="hlsurl1" class="col-md-3 control-label">
        备用hls地址
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="hlsurl1" id="hlsurl1" value="{{ $hlsurl1 }}">
    </div>
</div>

<div class="form-group">
    <label for="rtmpurl" class="col-md-3 control-label">
        rtmp地址
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="rtmpurl" id="rtmpurl" value="{{ $rtmpurl }}">
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="verifyflag"  name="verifyflag" value=1 @if ($verifyflag==1) checked="checked" @endif >
                审核标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="commentflag"  name="commentflag" value=1 @if ($commentflag==1) checked="checked" @endif >
                评论标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="refreshcommentflag"  name="refreshcommentflag" value=1 @if ($refreshcommentflag==1) checked="checked" @endif >
                实时刷新评论标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="refreshliveflag"  name="refreshliveflag" value=1 @if ($refreshliveflag==1) checked="checked" @endif >
                实时刷新图文直播标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="showreadflag"  name="showreadflag" value=1 @if ($showreadflag==1) checked="checked" @endif >
                显示点击数标志
            </label>
         </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="countdownflag"  name="countdownflag" value=1 @if ($countdownflag==1) checked="checked" @endif >
                视频直播是否倒计时标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-8 col-md-offset-3">
        <div class="checkbox">
            <label>
                <input  type="checkbox" id="livelistorder"  name="livelistorder" value=1 @if ($livelistorder==1) checked="checked" @endif >
                图文直播排列顺序标志
            </label>
         </div>
    </div>
</div>

<div class="form-group">
    <label for="livecontent" class="col-md-3 control-label">
        内容简介
    </label>
    <div class="col-md-8">
         <script id="livecontent" name="livecontent" type="text/plain" style="width:100%;height:300px;">{!! $livecontent !!}</script>
    </div>
</div>
