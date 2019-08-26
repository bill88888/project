@extends('Admin.adminPublic')
@section('title','分类添加')
@section('main')

<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>分类添加</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/admincates" method="post" class="mws-form"> 
     <div class="mws-form-inline"> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">分类名称:</label> 
       <div class="mws-form-item"> 
        <input value="" type="text" class="small" name="name" /> 
       </div> 
      </div> 
      <div class="mws-form-row"> 
       <label class="mws-form-label">父类:</label> 
       <div class="mws-form-item"> 
        <!-- <input type="password" name="password" class="small" />  -->
        <select class="small" name="pid">
			<option value="0">--请选择--</option>
			@foreach($cates as $row)
				<option value="{{$row->id}}">{{$row->name}}</option>
			@endforeach
        </select>
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