@extends('Admin.adminPublic')
@section('title','公告列表')
@section('main')

<html>
 <head></head>
 <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>公告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"> 
     <!-- <div id="DataTables_Table_0_length" class="dataTables_length">
                        	</div> --> 
     <div class="dataTables_filter" id="DataTables_Table_0_filter"> 
      <label> 
       <form action="" method="get">
         搜索名字: 
        <input type="text" aria-controls="DataTables_Table_0" name="key" value="{{$request['key'] or ''}}" /> 
        <input type="submit" value="搜索" /> 
       </form> </label> 
     </div>
     <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">操作</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 193px;">Id</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">标题</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">作者</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">内容</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">操作</th>
       </tr> 
      </thead> 

      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($res as $row)
	       <tr class="odd">
            <td><input type="checkbox" name="" id="" value="{{$row['id']}}"></td> 
            <td>{{$row['id']}}</td>
	       		<td>{{$row['title']}}</td>
            <td>{{$row['author']}}</td> 
            <td><img src="{{$row['pic']}}"></td> 
	       		<td>{!!$row['descr']!!}</td> 
            <td>
              <form action="/adminarticles/" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
              <a href="/adminarticles/{{$row['id']}}/edit" class="btn btn-info">修改</a>
              <input type="submit" value="删除" class="btn btn-danger">  
       
              </form>
            </td> 
	       </tr>
        @endforeach
         <tr>
            <td colspan="7">
                <a href="javascript:void(0)" class="btn" id="id">全选</a>
                <a href="javascript:void(0)" class="btn">全不选</a>
                <a href="javascript:void(0)" class="btn">反选</a>  
                 <a href="javascript:void(0)" class="btn btn-danger" id="del">批量删除</a>
            </td>
         </tr>
      </tbody> 
     </table> 
     <div class="dataTables_info" id="DataTables_Table_0_info">
      Showing 1 to 10 of 57 entries
     </div> 
     <div class="dataTables_paginate paging_full_numbers" id="pages" "="">
   
     </div> 
    </div> 
   </div>
  </div>
 </body>
 <script type="text/javascript">
  // alert($);
  $('#id').click(function(){
    //全选
    $(':checkbox').attr('checked',true);
  }).next().click(function(){
    //全不选
    $(':checkbox').attr('checked',false);
  }).next().click(function(){
    $(':checkbox').each(function(){
      //反选
      $(this).attr('checked',!$(this).attr('checked'));
    })
  })

  //删除
  $('#del').click(function(){
    arr=[];
    //遍历
    $(':checkbox').each(function(){
      if($(this).attr('checked')){
        id=$(this).val();
        // alert(id);
        arr.push(id);
        // alert(arr);
      }
    });
      //ajax操作
      $.get('/articlesdel',{del:arr},function(data){
          // alert(data);
          if(data==1){
            //遍历
            for(var i=0;i<arr.length;i++){
              $("input[value="+arr[i]+"]").parents('tr').remove();
            }
            alert('删除成功!');
          }else{
            alert(data);
          }

      });
  });
  
 </script>
</html>
@endsection
