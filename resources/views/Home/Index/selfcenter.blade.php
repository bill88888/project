@extends('Home.selfcenterPublic')
@section('title','订单管理')
@section('main')
<div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>我的订单</h2></div>
                <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
                <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
            </div>
            <div class="member-whole clearfix">
                <ul id="H-table" class="H-table">
                    <li class="cur"><a href="JavaScript:void(0)">我的订单</a></li>
                    <li><a href="JavaScript:void(0)">待付款<em>(44)</em></a></li>
                    <li><a href="JavaScript:void(0)">待发货</a></li>
                    <li><a href="JavaScript:void(0)">待收货</a></li>
                    <li><a href="JavaScript:void(0)">已完成</a></li>
                </ul>
            </div>
            <div class="member-border">
               <!--全部订单-->
               <div class="member-return H-over">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                   @if($row->status==0)
                                   <div class="ci5">
                                    <p>等待付款</p>
                                   </div>
                                   <div class="ci5 ci8">
                                    <p><a href="/pay/{{$row->order_num}}" class="a member-touch">立即支付</a></p> 
                                    <p><a href="#">取消订单</a> </p>
                                   </div>
                                   @elseif($row->status==2)
                                   <div class="ci5">
                                    <p>等待卖家发货 </p> 
                                   </div>
                                   <div class="ci5 ci8">
                                    <p><a href="/fgoods/{{$row->id}}" class="member-touch">提醒发货</a> </p> 
                                    <p><a href="#">取消订单</a> </p>
                                  </div>
                                  @elseif($row->status==1)
                                  <div class="ci5">
                                    <p>已完成</p> 
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a></p> </p>
                                    <p><a href="/sgoods/{{$row->id}}" class="member-touch">确认收货</a></p>
                                  </div>
                                  @elseif($row->status==3)
                                  <div class="ci5">
                                    <p>已完成</p>
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a> | <a href="#">删除</a></p> </p>
                                    <p><a href="/evaluate/{{$row->id}}" class="member-touch">查看评价</a></p>
                                  </div>
                                  @else
                                    <div class="ci5">
                                    <p>已完成</p>
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a> | <a href="#">删除</a></p> </p>
                                  </div>
                                  @endif
                               </div>
                           </li>
                        @endforeach
                       </ul>
                   </div>
               </div>
               <!--待付款-->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                        @if($row->status==0)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                    <div class="ci5">
                                    <p>等待付款</p>
                                   </div>
                                   <div class="ci5 ci8">
                                    <p><a href="/pay/{{$row->order_num}}" class="member-touch">立即支付</a></p> 
                                    <p><a href="#">取消订单</a> </p>
                                   </div>
                               </div>
                           </li>
                           @endif
                        @endforeach
                       </ul>
                   </div>
               </div>
               <!--待发货-->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                        @if($row->status==2)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                    <div class="ci5">
                                    <p>等待卖家发货 </p> 
                                   </div>
                                   <div class="ci5 ci8">
                                    <p><a href="/fgoods/{{$row->id}}" class="member-touch">提醒发货</a> </p> 
                                    <p><a href="#">取消订单</a> </p>
                                  </div>
                               </div>
                           </li>
                           @endif
                        @endforeach
                       </ul>
                   </div>
               </div>
               <!--已发货-->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                        @if($row->status==1)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                    <div class="ci5">
                                    <p>已完成</p> 
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a></p> </p>
                                    <p><a href="/sgoods/{{$row->id}}" class="member-touch">确认收货</a></p>
                                  </div>
                               </div>
                           </li>
                           @endif
                        @endforeach
                       </ul>
                   </div>
               </div>
               <!--待评价-->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                        @if($row->status==3)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                  <div class="ci5">
                                    <p>已完成</p>
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a> | <a href="#">删除</a></p> </p>
                                    <p><a href="/evaluate/{{$row->id}}" class="member-touch">查看评价</a></p>
                                  </div>
                               </div>
                           </li>
                           @endif
                        @endforeach
                       </ul>
                   </div>
               </div>
               <!--已完成-->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix" >
                       <ul>
                        @foreach($order as $row)
                        @if($row->status==4)
                           <li>

                               <div class="member-minute clearfix">
                                   <span>{{$row->createtime}}</span>
                                   <span>订单号：<em class="dd">{{$row->order_num}}</em></span>
                                   <span><a href="#">以纯甲醇旗舰店</a></span>
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                    @foreach($row->info as $v)
                                       <div class="ci7 clearfix">
                                           <span class="gr1"><a href="#"><img src="{{$v->pic}}" width="60" height="60" title="" about=""></a></span>
                                           <span class="gr2"><a href="#" style="float:left;">{{$v->name}}</a><span style="float:left;">{!!$v->descr!!}</span></span>
                                           <span class="gr3">X{{$v->num}}</span>
                                       </div>
                                    @endforeach
                                   </div>   
                                   @foreach($data as $v)
                                   @if($row->address_id==$v->id)
                                      <div class="ci2" >{{$v->name}}</div>
                                   @endif
                                   @endforeach
                                   <div class="ci3"><b>￥{{$row->sum}}</b><p>货到付款</p><p class="iphone">手机订单</p></div>
                                   <div class="ci4"><p>{{$row->createtime}}</p></div>
                                  <div class="ci5">
                                    <p>已完成</p>
                                  </div>
                                   <div class="ci5 ci8">
                                    <p><a href="#">查看</a> | <a href="#">删除</a></p> </p>
                                    <p><a href="/evaluate/{{$row->id}}" class="member-touch">查看评价</a></p>
                                  </div>
                               </div>
                           </li>
                           @endif
                        @endforeach
                       </ul>
                   </div>
               </div>
            </div>
</div>
<script type="text/javascript">

</script>
@endsection