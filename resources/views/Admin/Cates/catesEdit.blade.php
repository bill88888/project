@extends('Admin.adminPublic')
@section('title','分类修改')
@section('main')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>分类修改</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/admincates/{{$cate->id}}" method="post" class="mws-form"> 
     <div class="mws-form-inline">
      <div class="mws-form-row"> 
       <label class="mws-form-label">父类:</label> 
       <div class="mws-form-item"> 
        <!-- <input type="password" name="password" class="small" />  -->
        <select class="small" name="pid">
          @if(count($fcate))   
          <option value="{{$fcate->id}}">{{$fcate->name}}</option>
          @else
          <option value="0">--请选择--</option>
          @endif
        </select>
       </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称:</label> 
       <div class="mws-form-item"> 
        <input value="{{$cate->name}}" type="text" class="small" name="name" /> 
       </div> 
      </div> 
        {{method_field('put')}}
      	{{csrf_field()}}
     <div class="mws-button-row"> 
      <input type="submit" class="btn btn-danger" value="修改" /> 
      <input type="reset" class="btn " value="重置" /> 
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
@endsection