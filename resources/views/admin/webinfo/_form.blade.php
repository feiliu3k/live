
<div class="form-group">
    <label for="ifotitle" class="col-md-2 control-label">
        小标题
    </label>
    <div class="col-md-10">
        <input type="text" class="form-control" name="ifotitle" id="ifotitle" value="{{ $ifotitle }}">
    </div>
</div>

<div class="form-group">
    <label for="ifotime" class="col-md-2 control-label">
        时间
    </label>
    <div class="col-md-10 input-append date form_datetime">
        <input type="text" class="form-control datetimepicker" readonly name="ifotime" id="ifotime"  value="{{ $ifotime }}">
        <span class="add-on"><i class="icon-remove"></i></span>
        <span class="add-on"><i class="icon-calendar"></i></span>
    </div>
</div>

<div class="form-group">
    <label for="ifocontent" class="col-md-2 control-label">
        内容简介
    </label>
    <div class="col-md-10">
         <script id="ifocontent" name="ifocontent" type="text/plain" style="width:100%;height:300px;">{!! $ifocontent !!}</script>
    </div>
</div>
