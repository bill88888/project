@extends('Admin.adminPublic')
@section('title','分类列表')
@section('main')

<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>用户列表</span> 
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
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 193px;">分类名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">pid</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">path</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($cates as $row)
	       <tr class="odd"> 
	       		<td>{{$row->id}}</td> 
	       		<td>{{$row->name}}</td> 
	       		<td>{{$row->pid}}</td> 
	       		<td>{{$row->path}}</td>
            <td>
              <form action="/admincates/{{$row->id}}" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
              <input type="submit" value="删除" class="btn btn-danger">  
              <a href="/admincates/{{$row->id}}/edit" class="btn btn-info">修改</a>
              </form>
              
            </td> 
	       </tr>
        @endforeach
      </tbody> 
     </table> 
     <div class="dataTables_info" id="DataTables_Table_0_info">
      Showing 1 to 10 of 57 entries
     </div> 
     <div class="dataTables_paginate paging_full_numbers" id="pages" "="">
     	{{$cates->appends($request)->render()}}
     </div> 
    </div> 
   </div>
  </div>
 </body>
</html>
@endsection
