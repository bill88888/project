@extends('Admin.adminPublic')
@section('title','商品列表')
@section('main')

<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>商品列表</span> 
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
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 193px;">名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">分类</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">图片</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">描述</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">数量</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 180px;">价格</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">Action</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
     @foreach($shops as $row)
       <tr class="odd"> 
        <td>{{$row['sid']}}</td> 
        <td>{{$row['sname']}}</td>
        <td>{{$row['cname']}}</td>
        <td><img src="{{$row['pic']}}"></td>  
        <td>{!!$row['descr']!!}</td>  
        <td>{{$row['num']}}</td>  
        <td>{{$row['price']}}</td>  
        <td>
           <form action="/adminshops/{{$row['sid']}}" method="post">
            <a class="btn btn-info" href="/adminshops/{{$row['sid']}}/edit">修改</a>
            {{csrf_field()}}
            {{method_field('delete')}}
            <button class="btn btn-danger" type="submit">删除</button>
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
      
     </div> 
    </div> 
   </div>
  </div>
 </body>
</html>
@endsection