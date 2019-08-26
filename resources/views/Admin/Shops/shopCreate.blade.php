@extends('Admin.adminPublic')
@section('title','商品添加')

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
    <span>商品添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminshops" method="post" class="mws-form" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">名字:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="large" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">类别:</label> 
       <div class="mws-form-item"> 
        <select name="cate_id" class="large">
          <option value="0">--请选择--</option>
          @foreach($cates as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片:</label> 
       <div class="mws-form-item"> 
        <input type="file" name="pic" class="large" /> 
       </div> 
      </div>  
      <div class="mws-form-row"> 
       <label class="mws-form-label">描述:</label> 
       <div class="mws-form-item"> 
        <textarea name="descr"></textarea>
       </div> 
      </div>
      <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">数量:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="large" name="num" /> 
       </div> 
      </div> 
      <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">价格:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="large" name="price" /> 
       </div> 
      </div>
     <div class="mws-button-row">
      {{csrf_field()}} 
      <input type="submit" class="btn btn-danger" value="添加" /> 
      <input type="reset" class="btn " value="重置" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
 <script type="text/javascript"> 
 //实例化编辑器 
 //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接 调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
 </script>
</html>
@endsection