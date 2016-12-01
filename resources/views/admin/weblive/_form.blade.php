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
    <label for="pnum" class="col-md-3 control-label">
        观看人数
    </label>
    <div class="col-md-8">
        <input type="text" class="form-control" name="pnum" id="pnum" value="{{ $pnum }}">
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
    <label for="livecontent" class="col-md-3 control-label">
        内容简介
    </label>
    <div class="col-md-8">
         <script id="livecontent" name="livecontent" type="text/plain" style="width:100%;height:300px;">{!! $livecontent !!}</script>
    </div>
</div>
