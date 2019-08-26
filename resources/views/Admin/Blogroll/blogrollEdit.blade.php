@extends('Admin.adminPublic')
@section('title','友情链接修改')

@section('main')
	
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>友情链接修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminblogroll/{{$res->id}}" method="post" class="mws-form" enctype="multipart/form-data"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">名字:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->name}}" type="text" class="large" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">网址:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->blog}}" type="text" class="large" name="blog" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">图片:</label> 
       <div class="mws-form-item"> 
        <input type="file" name="pic" class="large" />
        <img src="{{$res->pic}}"> 
       </div>
       
     </div> 
     <div class="mws-button-row"> 
      <input type="hidden" name="zhi" value="{{$res->blog}}">
      <input type="hidden" name="ming" value="{{$res->name}}">
      {{csrf_field()}}
      {{method_field('put')}}
      <input type="submit" class="btn btn-danger" value="修改" /> 
      <input type="reset" class="btn " value="重置" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection