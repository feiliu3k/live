{{-- 新建Info --}}
<div class="modal fade" id="modal-info-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('/admin/upload/folder') }}" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="liveid" id="liveid" value="{{ $liveid }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">新建Info</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ifotitle" class="col-md-3 control-label">
                            小标题
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ifotitle" id="ifotitle" value="{{ $ifotitle }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ifotime" class="col-md-3 control-label">
                            时间
                        </label>
                        <div class="col-md-8 input-append date form_datetime">
                            <input type="text" class="form-control datetimepicker" readonly name="ifotime" id="ifotime"  value="{{ $ifotime }}">
                            <span class="add-on"><i class="icon-remove"></i></span>
                            <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ifocontent" class="col-md-3 control-label">
                            内容简介
                        </label>
                        <div class="col-md-8">
                             <script id="ifocontent" name="ifocontent" type="text/plain" style="width:100%;height:300px;">{!! $ifocontent !!}</script>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        新建
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 编辑Info --}}
<div class="modal fade" id="modal-info-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('/admin/upload/folder') }}" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="liveid" id="liveid" value="{{ $liveid }}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        ×
                    </button>
                    <h4 class="modal-title">编辑Info</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="ifoid" id="liveid" value="{{ $ifoid }}">
                    <div class="form-group">
                        <label for="ifotitle" class="col-md-3 control-label">
                            ifotitle
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="ifotitle" id="ifotitle" value="{{ $ifotitle }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ifotime" class="col-md-3 control-label">
                            时间
                        </label>
                        <div class="col-md-8 input-append date form_datetime">
                            <input type="text" class="form-control datetimepicker" readonly name="ifotime" id="ifotime"  value="{{ $ifotime }}">
                            <span class="add-on"><i class="icon-remove"></i></span>
                            <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ifocontent" class="col-md-3 control-label">
                            内容简介
                        </label>
                        <div class="col-md-8">
                             <script id="ifocontent" name="ifocontent" type="text/plain" style="width:100%;height:300px;">{!! $ifocontent !!}</script>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-primary">
                        创建目录
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 删除Info --}}
<div class="modal fade" id="modal-info-delete">
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
                        是否要删除此
                        <kbd><span id="delete-folder-name1">folder</span></kbd>
                        信息?
                 </p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ url('/admin/upload/folder') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="ifoid" id="delete-ifoid">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        取消
                    </button>
                    <button type="submit" class="btn btn-danger">
                        删除
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
