@extends('Home.selfcenterPublic')
@section('title','订单管理')
@section('main')
<div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>我的评价</h2></div>
            </div>
            <div class="member-border">
               @foreach($res as $row)
               <div class="member-column clearfix">
                   <span class="co1">商品信息</span>
                   <span class="co2">购买时间</span>
                   <span class="co3">评价状态</span>
               </div>
               
               @if($row->ostatus==1)
               <div class="member-class clearfix" id="div">
                   <ul>
                       <li class="clearfix">
                           <div class="sp1">
                               <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="{{$row->pic}}"></a></span>
                               <span class="gr2"><a href="#">{{$row->name}}</a></span>
                               <span class="gr3">X{{$row->num}}</span>
                           </div>
                           <div class="sp2">{{$row->time}}</div>
                           <div class="sp3">未评价</div>
                       </li>
                   </ul>
               </div>
               
               <div class="member-setup clearfix">
                   <ul>
                       <li class="clearfix">
                           <div class="member-score fl"><i class="reds">*</i>评分：</div>
                           <div class="member-star fl">
                               <ul>
                                   <li class="on"></li>
                                   <li class="on"></li>
                                   <li></li>
                                   <li></li>
                                   <li></li>
                               </ul>
                           </div>
                           <div class="member-judge fr"><input type="checkbox"> 匿名评价</div>
                       </li>

                       <li class="clearfix">
                        <form action="/index" method="post">
                           <div class="member-score fl"><i class="reds">*</i>商品评价：</div>
                           <div class="member-star fl">
                               <textarea maxlength="200" name="content" class="tex"></textarea>
                           </div>
                           <input type="hidden" name="shops_id" value="{{$row->goods_id}}">
                           <input type="hidden" name="order_id" value="{{$row->id}}">
                           <input type="hidden" name="user_id" value="{{$row->user_id}}">
                            {{csrf_field()}}
                           <input type="submit" value="发表评价" style="margin-left:820px;background-color:#ea4949; width:80px; height:30px;  color:white; cursor:pointer; border: #ea4949">
                        </form>
                       </li>
                       <li class="clearfix">
                           <div class="member-score fl">晒单：</div>
                           <div class="member-star fl">
                               <a href="#"><img src="/homeStatic/img/pd/m2.png"></a>
                               <a href="#"><img src="/homeStatic/img/pd/m2.png"></a>
                               <a href="#"><img src="/homeStatic/img/pd/m2.png"></a>
                           </div>
                       </li>
                       <li class="clearfix">
                           <div style="padding-left:85px;">最多可以增加<i class="reds">10</i>张</div>
                       </li>
                   </ul>
               </div>
               @elseif($row->ostatus==0)
               <div class="member-class clearfix" id="div">
                   <ul>
                       <li class="clearfix">
                           <div class="sp1">
                               <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="{{$row->pic}}"></a></span>
                               <span class="gr2"><a href="#">{{$row->name}}</a></span>
                               <span class="gr3">X{{$row->num}}</span>
                           </div>
                           <div class="sp2">{{$row->time}}</div>
                           <div class="sp3">已评价</div>
                       </li>
                   </ul>
               </div>
               @endif
               @endforeach

            </div>
        </div>
<script type="text/javascript">

</script>
@endsection