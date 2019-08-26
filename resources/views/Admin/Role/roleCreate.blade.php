@extends('Admin.adminPublic')
@section('title','管理角色添加')
@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>管理角色添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminrole" method="post" class="mws-form"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">管理角色名称:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="small" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label"><u></u>权限信息</label> 
        <div class="mws-form-item clearfix"> 
          @foreach($nodes as $row)
          <ul class="mws-form-list inline">
            <li><input type="checkbox" name="nid[]" value="{{$row->id}}" >&nbsp;&nbsp;<label>{{$row->name}}</label></li>  
          </ul>
          @endforeach
        </div>
       </div> 
      </div>

      	{{csrf_field()}}
     <div class="mws-button-row"> 
      <input type="submit" class="btn btn-danger" value="添加" /> 
      <input type="reset" class="btn " value="重置" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection