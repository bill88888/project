@extends('Admin.adminPublic')
@section('title','订单列表')
@section('main')

<html>
 <head></head>
 <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>

 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>订单列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"> 
     <!-- <div id="DataTables_Table_0_length" class="dataTables_length">
                          </div> --> 
     <div class="dataTables_filter" id="DataTables_Table_0_filter"> 
      <label> 
       <form action="" method="get">
         搜索名字: 
        <input type="text" aria-controls="DataTables_Table_0" name="key" value="" /> 
        <input type="submit" value="搜索" /> 
       </form> </label> 
     </div>
      <table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 140px;">ID</th>
   
       
      

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">下单人</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">收货地址</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">详细收货地址</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">Action</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
       @foreach($res as $row)
       <tr class="odd"> 
        <td>{{$row->id}}</td>
        <td>{{$row->uname}}</td>
        <td>{{$row->phone}}</td>
        <td>{{$row->huo}}</td>
        <td>{{$row->xhuo}}</td>
        <td>
        <select class="sel">
          @if($row->status==0)
          <option value="{{$row->status}}">未付款</option>
          <option value="2">未发货</option>
          <option value="1">已发货</option>
          <option value="3">已完成</option>
          @elseif($row->status==2)
          <option value="{{$row->status}}">未发货</option>
          <option value="0">未付款</option>
          <option value="1">已发货</option>
          <option value="3">已完成</option>
          @elseif($row->status==1)
          <option value="{{$row->status}}">已发货</option>
          <option value="0">未付款</option>
          <option value="2">未发货</option>
          <option value="3">已完成</option>
          @elseif($row->status==3)
          <option value="{{$row->status}}">已完成</option>
          <option value="0">未付款</option>
          <option value="2">未发货</option>
          <option value="1">已发货</option>
          @endif
        </select>
        <input type="hidden" name="{{$row->id}}" class="inp">
        </td>
        <td> 
            <a href="/orderinfo/{{$row->id}}" class="btn btn-success">订单详情</a>     
        </td>  
       </tr> 
      @endforeach
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
    $('.sel').live("change",function(){
      var inp=$(this).next().attr('name');
        // alert(inp);
        // alert($(this).val());
        var me=$(this).val();
        $.get('/status',{sta:me,id:inp},function(res){
              // alert(res);
        });

    });
 </script>
</html>
@endsection