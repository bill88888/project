@extends('Admin.adminPublic')
@section('title','分配角色权限')

@section('main')
<html>
 <head></head>
 <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>分配角色权限</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form action="/adminnsave" method="post" class="mws-form"> 
     <div class="mws-form-inline"> 
       <div class="mws-form-row"> 
        <label class="mws-form-label"><u>{{$role->name}}</u>的权限信息:</label> 
        <div class="mws-form-item clearfix"> 
          
          @foreach($node as $row)
          <ul class="mws-form-list inline">
            <li><input type="checkbox" name="nid[]" value="{{$row->id}}" @if(in_array($row->id,$data)) checked @endif>&nbsp;&nbsp;<label>{{$row->name}}</label></li>  
          </ul>
          @endforeach

        </div>
         <a href="javascript:void(0)" class="btn btn-success xuan">全选</a>
         <a href="javascript:void(0)" class="btn btn-success">全不选</a>
         <a href="javascript:void(0)" class="btn btn-success">反选</a>
       </div> 
      </div> 
      <div class="mws-button-row">
        {{csrf_field()}}
        <input type="hidden" name="rid" value="{{$role->id}}">
       <input value="分配权限" class="btn btn-danger" type="submit"> 
       <input value="重置" class="btn " type="reset"> 
      </div> 
    </form> 
   </div> 
  </div>
 </body>
 <script>
  $('.xuan').click(function(){
      $(':checkbox').attr('checked',true);
  }).next().click(function(){
      $(':checkbox').attr('checked',false);
  }).next().click(function(){
      $(':checkbox').each(function(){
        $(this).attr('checked',!$(this).attr('checked'));
      })
  })
  $(':submit').click(function(){
      if($(':checkbox').attr('checked',false)){
         
         alert('请至少选择一个权限');
      }
  })

  
</script>

</html>

@endsection

