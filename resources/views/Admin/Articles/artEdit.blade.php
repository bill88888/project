@extends('Admin.adminPublic')
@section('title','公告修改')

@section('main')

<html>
 <head></head>
 <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.config.js"></script>
 <script type="text/javascript" charset="utf-8" src="/static/ueditor/ueditor.all.min.js"></script>
  <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败--> <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加 载的中文，那最后就是中文--> 
 <script type="text/javascript" charset="utf-8" src="/static/ueditor/lang/zh-cn/zh-cn.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>公告修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminarticles/{{$res->id}}" method="post" class="mws-form" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">标题:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->title}}" type="text" class="large" name="title" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">作者:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->author}}" type="text" name="author" class="large" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片:</label> 
       <div class="mws-form-item"> 
        <input type="file" name="pic" class="large" />
        <img src="{{$res->pic}}"> 
       </div> 
      </div>  
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述:</label> 
       <textarea name="descr">{{$res->descr}}</textarea>
       <div class="mws-form-item"> 
       </div> 
      </div> 
     <div class="mws-button-row">
      {{csrf_field()}} 
      {{method_field('put')}} 
      <input type="submit" class="btn btn-danger" value="添加" /> 
      <input type="reset" class="btn " value="重置" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection