@extends('Admin.adminPublic')
@section('title','友情链接添加')

@section('main')
	
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>友情链接添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminblogroll" method="post" class="mws-form" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">名字:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="large" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">网址:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="large" name="blog" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片:</label> 
       <div class="mws-form-item"> 
        <input type="file" name="pic" class="large" /> 
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
</html>
@endsection