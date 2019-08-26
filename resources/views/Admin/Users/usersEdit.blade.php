@extends('Admin.adminPublic')
@section('title','用户修改')

@section('main')
	
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>用户修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminusers/{{$res->id}}" method="post" class="mws-form"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">用户名:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->username}}" type="text" class="small" name="username" /> 
       </div> 
      </div> 
     
      <div class="mws-form-row"> 
       <label class="mws-form-label">邮箱:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->email}}" type="text" name="email" class="small" /> 
       </div> 
      </div>
      <div class="mws-form-row"> 
       <label class="mws-form-label">电话:</label> 
       <div class="mws-form-item"> 
        <input value="{{$res->phone}}" type="text" name="phone" class="small" /> 
       </div> 
      </div>  
     </div> 
     <div class="mws-button-row"> 
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