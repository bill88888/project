@extends('Admin.adminPublic')
@section('title','用户列表')
@section('main')
<html>
 <head></head>
 <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
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
       <form action="javascript:void(0)" method="get">
         搜索名字: 
        <input type="text" aria-controls="DataTables_Table_0" name="key" value="{{$key or ''}}" id="inp"/> 
        <input type="submit" value="搜索" /> 
       </form> 
     </label> 
     </div>
     
    <div id="div">
     <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">收货人</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 80px;">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">收货地址</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">详细收货地址</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @if(count($res))
        @foreach($res as $row)
       <tr class="odd"> 
        <td>{{$row->id}}</td> 
        <td>{{$row->aname}}</td> 
        <td>{{$row->phone}}</td> 
        <td>{{$row->uname}}</td> 
        <td>{{$row->huo}}</td> 
        <td>{{$row->xhuo}}</td> 
       </tr> 
      @endforeach
      @endif
      </tbody> 
     </table>
     </div> 
     <div class="dataTables_info" id="DataTables_Table_0_info">
      
     </div> 
     <div class="dataTables_paginate paging_full_numbers" id="pages" "="">
 
     </div> 
    </div>
   </div>
  </div>
 </body>
</html>
@endsection