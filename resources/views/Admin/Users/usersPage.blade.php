<table class="mws-datatable mws-table dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 80px;">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 80px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 30px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">创建时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">修改时间</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 180px;">Action</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($users as $row)
       <tr class="odd"> 
        <td>{{$row->id}}</td> 
        <td>{{$row->username}}</td> 
        <td>{{$row->email}}</td> 
        <td>{{$row->phone}}</td> 
        <td>{{$row->status}}</td> 
        <td>{{$row->created_at}}</td> 
        <td>{{$row->updated_at}}</td> 
        <td>
            <form action="/adminusers/{{$row->id}}" method="post">
              {{csrf_field()}}
              {{method_field('delete')}}
            <a class="btn btn-success" href="/usersaddress/{{$row->id}}">用户地址信息</a>
            <a class="btn btn-success" href="/usersinfo/{{$row->id}}">用户详情</a>
            <a class="btn btn-info" href="/adminusers/{{$row->id}}/edit">修改</a>
            <button class="btn btn-danger" type="submit">删除</button>
           </form>
        </td> 
       </tr> 
        @endforeach
      </tbody> 
     </table>