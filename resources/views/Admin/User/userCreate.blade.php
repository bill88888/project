@extends('Admin.adminPublic')
@section('title','管理员添加')

@section('main')

<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>管理员添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminuser" method="post" class="mws-form"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">管理员名:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="small" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">密码:</label> 
       <div class="mws-form-item"> 
        <input type="password" name="password" class="small" /> 
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