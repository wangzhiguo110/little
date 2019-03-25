@extends('common.admin_base')

@section('title','管理后台-小说添加')

<!--页面顶部信息-->
@section('pageHeader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 小说添加 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
@endsection

@section('content')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span id="error_msg"></span>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-btns">
                <a href="" class="panel-close">&times;</a>
                <a href="" class="minimize">&minus;</a>
            </div>

            <h4 class="panel-title">小说添加表单</h4>
        </div>
        <div class="panel-body panel-body-nopadding">

            <form class="form-horizontal form-bordered" action="{{route('admin.novel.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说分类</label>
                    <div class="col-sm-6">
                        <select name="c_id" class="form-control">
                            @if(!empty($c_list))
                                @foreach($c_list as $cate)
                                    <option value="{{$cate['id']}}">{{$cate['c_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说作者</label>
                    <div class="col-sm-6">
                        <select name="a_id" class="form-control">
                            @if(!empty($a_list))
                                @foreach($a_list as $author)
                                    <option value="{{$author['id']}}">{{$author['author_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说标题</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="小说标题" class="form-control" name="name" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说封面</label>
                    <div class="col-sm-6">
                        <input type="file" placeholder="小说封面" class="form-control" name="image_url" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说标签</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="小说标签" class="form-control" name="tags" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说状态</label>
                    <div class="col-sm-6">
                        <div class="radio"><label><input type="radio" name="status" value="1" checked>连载</label></div>
                        <div class="radio"><label><input type="radio" name="status" value="2">完结</label></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">小说简介</label>
                    <div class="col-sm-8">
                        <textarea name="desc" style="border:none;" id="container"></textarea>
                    </div>
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button class="btn btn-primary btn-danger" id="btn-save">保存分类</button>&nbsp;
                        </div>
                    </div>
                </div><!-- panel-footer -->
            </form>

        </div><!-- panel-body -->

        <script src="/js/ueditor/ueditor.config.js"></script>
        <script src="/js/ueditor/ueditor.all.min.js"></script>
        <script>
            var ue = UE.getEditor('container');
        </script>
@endsection