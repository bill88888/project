<!doctype html>
<html>
 <head>
	<meta charset="UTF-8">
	<meta name="Generator" content="EditPlus®">
	<meta name="Author" content="">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
	<meta name="renderer" content="webkit">
    <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
    <meta content="歪秀购物，购物商城。" name="description">
	<title>购物车</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/member.css">
  <link rel="stylesheet" type="text/css" href="/homeStatic/css/home.css">
    <script type="text/javascript" src="/homeStatic/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="/homeStatic/js/top.js"></script>
  <script type="text/javascript" src="/homeStatic/js/MSClass.js"></script>

   
     <script>
         $(function(){

             $("#H-table li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over").hide();
                         $(".H-over:eq(" + _index + ")").show();
                     }
                 })(i));
             });
             $("#H-table1 li").each(function(i){
                 $(this).click((function(k){
                     var _index = k;
                     return function(){
                         $(this).addClass("cur").siblings().removeClass("cur");
                         $(".H-over1").hide();
                         $(".H-over1:eq(" + _index + ")").show();
                     }
                 })(i));
             });
         });
     </script>
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                <li style="display:none;"><a href="#" style="float:left;">嘻哈杂货铺</a> <a href="#" style="float:left;">退出</a> </li>
               
                
                <li class="headerul">|</li>
                <li><a href="/emailregister/create">免费注册</a> </li>
                <li class="headerul">|</li>
                <li><a href="my-d.html">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="my-s.html">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="my-user.html" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="my-d.html">我的订单</a>
                        <a href="my-s.html">我的收藏</a>
                        <a href="my-user.html">账户安全</a>
                        <a href="my-add.html">地址管理</a>
                        <a href="my-p.html">我要评价</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                    <li id="pc-nav1" class="menu"><a href="#" class="tit M-iphone">手机悦商城</a>
                   <div class="subnav">
                       <a href="#"><img src="/homeStatic/icon/ewm.png" width="115" height="115" title="扫一扫，有惊喜！"></a>
                   </div>
                </li>
                @if(session('email'))
                 <li>    
                    <a href="/selfcenter">欢迎你:{{session('email')}}</a>
                </li>
                <li>
                    <a href="/homelogin">退出</a>
                </li>
                @else
                <li>
                    <a href="/homelogin/create" style="color:#ea4949;">请登录</a> 
                </li>
                @endif

            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl" style="width:212px;"><h1><a href="#"><img src="/homeStatic/icon/logo.png"></a></div>
        <div class="pc-order-titlei fl"><h2 style="line-height:30px;width:80px">购物车</h2></div>
        <div class="pc-step-title fl">
            <ul>
                <li class="cur"><a href="#">1 . 我的购物车</a></li>
                <li class="cur2"><a href="#">2 . 填写提交订单</a></li>
                <li class="cur2"><a href="#">3 . 成功提交付款</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->


<!-- 商城快讯 begin -->

<section id="member">
    <div class="member-center clearfix">
        @if(count($shop))
        <div class="member-right fr" >
            
            <div class="member-whole clearfix">
                <ul id="H-table" class="H-table">
                    <li class="cur"><a href="#">全部商品</a></li>
                    <li><a href="#">降价商品</a></li>
                    <li><a href="#">库存紧缺</a></li>
                </ul>
            </div>
            <div class="member-border">
               <div class="member-return H-over">
                   <div class="member-cancel clearfix">
                    <!-- <span class="be2"> </span> -->
                       <span class="be1">商品信息</span>
                       <span class="be3">单价</span>
                       <span class="be3">数量</span>
                       <span class="be3">金额</span>
                       
                       <span class="be3">操作</span>
                   </div>
                   <!--遍历statr-->
                   
                   @foreach($shop as $v)
                   <div class="member-sheet clearfix">
                       <ul>
                           <li>
                               <div class="member-circle clearfix">
                                   <div class="ci6">
                                    <input type="checkbox" name="box" value="{{$v['id']}}">

                                   </div>
                                   <div class="ci1"><img src="{{$v['pic']}}" style="float:left"><h3 style="float:left;color:black;">{{$v['name']}}</h3><div style="float:left;margin-left:20px">{!!$v['descr']!!}</div></div>
                                   <div class="ci5" style="font-size:15px;color:black;">￥{{$v['price']}}</div>
                                   <div class="ci5">
                                    <a class="subtract" name="{{$v['id']}}" href="JavaScript:void(0)" style="font-family:'微软雅黑';font-size:24px;color:black">-</a>
                                    <input type="text" value="{{$v['num']}}" style="width:20px;height:20px">
                                    <a class="add" name="{{$v['id']}}" href="JavaScript:void(0)" style="font-family:'微软雅黑';font-size:20px;color:black">+</a>
                                   </div>
                                   <div class="ci5"><div style="font-size:15px;color:#ff4400;">￥{{$v['price']*$v['num']}}</div></div>
                                   <div class="ci5">
                                    <a href="">移入收藏夹</a>
                                    <a href="javascript:void(0)" class="del" name="{{$v['id']}}">删除</a>

                                    <!-- <form action="/homecart/{{$v['id']}}" method="post">
                                      {{csrf_field()}}
                                      {{method_field('delete')}}
                                          <input type="submit" value="删除">
                                    </form>   -->      
                                   </div>
                               </div>
                           </li>
                       </ul>
                   </div>
                   @endforeach
                   <!--遍历end-->
               </div>
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                           <li>
                              
                               <div class="member-circle clearfix">
                                   <div class="ci1">
                                       
                                   </div>
                                   <div class="ci2"></div>
                                   <div class="ci3"></div>
                                   <div class="ci4"></div>
                                   <div class="ci5"><p>等待付款</p> <p><a href="#">物流跟踪</a></p> <p><a href="#">订单详情</a></p></div>
                                   <div class="ci5 ci8"><p>剩余15时20分</p> <p><a href="#" class="member-touch">立即支付</a> </p> <p><a href="#">取消订单</a> </p></div>
                               </div>
                           </li>  
                       </ul>
                   </div>
               </div>
               <div style="background-color:#e5e5e5;height:50px">
                   <a href="/alldel" style="line-height:50px;font-size:15px;margin-left:40px;margin-right:20px;">全部删除</a>
                   <a href="/index" style="line-height:50px;font-size:15px">继续购物</a>

                   <div style="background-color:#b0b0b0;height:50px;width:150px;text-align:center;font-size:20px;color:white;line-height:50px;float:right;cursor:no-drop;" id="account">结算</div>
                   <div style="margin-left:40px;float:right;line-height:50px;font-family:'微软雅黑';">合计(不含运费):&nbsp;&nbsp;  <b style="color:#ff4400;font-size:20px;" id="b1">￥0.00</b>&nbsp;&nbsp;&nbsp;&nbsp;
                   </div> 
                   <div style="float:right;line-height:50px;font-family:'微软雅黑';">已选商品&nbsp;&nbsp;
                     <b style="color:#ff4400;font-size:20px;" id="b2">0</b>&nbsp;&nbsp;件
                   </div>
               </div>                
            </div>
        </div>
    @else
    <div class="member-right fr" >
      <img src="/homeStatic/img/T1TvXUXnNjXXXXXXXX-100-100.png" style="margin-left:350px">
      <span>您的购物车还是空的,赶紧行动吧!您可以<a href="/index" style="font-size:15px;margin-left:5px">去购物</a></span>
    </div>
    @endif
    </div>
</section>
              
<!-- 商城快讯 End -->

<!--- footer begin-->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homeStatic/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homeStatic/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homeStatic/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/homeStatic/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
<!-- footer End -->
</body>
<script type="text/javascript">
// alert($);
//单个删除
$('.del').click(function(){
    var me=$(this);
    var id=$(this).attr('name');
    // alert(id);
    $.get('/del',{id:id},function(reslut){
        if(reslut==1){
            me.parents('.member-sheet').remove();
        }else if(reslut==2){
            me.parents('.member-right').html('<img src="/homeStatic/img/T1TvXUXnNjXXXXXXXX-100-100.png" style="margin-left:350px"><span style="margin-left:3.5px">您的购物车还是空的,赶紧行动吧!您可以<a href="/index" style="font-size:15px;margin-left:5px">去购物</a></span>');
        }
    });
});
//数量减1
$('.subtract').click(function(){
   var me=$(this);
   var id=me.attr('name');
   // alert(id);
   $.get('/subtract',{id:id},function(reslut){
        // alert(reslut);
        me.next().val(reslut.num);
        me.parent().next().find('div').html('￥'+reslut.sum);
   },'json');
});
//数量加1
$('.add').click(function(){
   var me=$(this);
   var id=me.attr('name');
    $.get('/add',{id:id},function(reslut){
        // alert(reslut);
        me.prev().val(reslut.num);
        me.parent().next().find('div').html('￥'+reslut.sum);
   },'json');
});
//选择结算商品
var arr=[];
$("input[name='box']").change(function(){
    if($(this).attr('checked')){
        //结算颜色变化
        $('#account').css('background-color','#ff4400');
        //结算按钮变化
        $('#account').hover(function(){$(this).css('cursor','pointer')},function(){});
        var id=$(this).val();
        // alert(id);
        //选中的商品 的id添加到数组里
        arr.push(id);
    }else{
        //结算按钮颜色变化
        $('#account').css('background-color','#b0b0b0');
        //结算按钮变化
        $('#account').hover(function(){$(this).css('cursor','no-drop')},function(){});
        //获取没有选中的商品 的id
        var nid=$(this).val();
        // alert($nid);
        //删除没有选中的商品id
        //1 找到元素索引
        Array.prototype.indexOf = function(val) {
            for (var i = 0; i < this.length; i++) {
                if (this[i] == val) return i;
            }
            return -1;
        };
        //2 通过元素索引 删除元素
        Array.prototype.remove = function(val) {
            var index = this.indexOf(val);
            if (index > -1) {
                this.splice(index, 1);
            }
        };
        //移出
        arr.remove(nid);
    }
    //发送ajax
    $.get('/homecarttot',{arr:arr},function(result){
        // alert(result);
        $('#b1').html('￥'+result.sum);
        $('#b2').html(result.nums);  
    },'json');
});
//结算
$('#account').click(function(){
    if($("input[name='box']").is(':checked')){
      // alert('跳转结算页');
      $.get('/account',{arr:arr},function(reslut){
          // alert(reslut);
          if(reslut){
              //跳转到结算页面
              window.location="/homeorder";
          }
      }); 
    } 
});
</script>
</html>