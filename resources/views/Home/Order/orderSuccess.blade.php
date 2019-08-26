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
	<title>付款成功</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/member.css">
 <link href="/homeStatic/xiangmv/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
 <link href="/homeStatic/xiangmv/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/homeStatic/xiangmv/css/sustyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/homeStatic/xiangmv/basic/css/demo.css" rel="stylesheet" type="text/css" />  
  <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
    <link rel="stylesheet" type="text/css" href="/homeStatic/css/home.css">
    <script type="text/javascript" src="/homeStatic/js/jquery.js"></script>
  <script type="text/javascript" src="/homeStatic/xiangmv/js/address.js"></script> 
  
    <script type="text/javascript" src="/homeStatic/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
   
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
                 <li style="font-size: 12px">    
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
        <div class="pc-order-titlei fl"><h2 style="line-height:30px;width:80px"></h2></div>
        <div class="pc-step-title fl">
            <ul>
                <li class="cur2"><a href="#">1 . 我的购物车</a></li>
                <li class="cur2"><a href="#">2 . 填写提交订单</a></li>
                <li class="cur"><a href="#">3 . 成功提交付款</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->


<!-- 商城快讯 begin -->
  <div style="margin-left:250px;"> 
   <div class="status">
    <img src="/homeStatic/img/T13iv.XiFdXXa94Hfd-32-32.png" style="float:left;margin-left:10px;"> 
    <h2 style="line-height:40px;margin-left:55px;font-size:15px;margin-bottom:20px">您已成功付款!</h2> 
    <div class="successInfo"> 
     <ul> 
      <li>付款金额<em style="color:#ea4949;">&yen;{{$tot}}</em></li> 
      <div class="user-info"> 
       <p>收货人：{{$address->name}}</p> 
       <p>联系电话：{{$address->phone}}</p> 
       <p>收货地址：{{$address->huo}}</p> 
      </div> 请认真核对您的收货信息，如有错误请联系客服 
     </ul> 
     <div class="option"> 
      <span class="info">您可以</span> 
      <a href="person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a> 
      <a href="person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a> 
     </div> 
    </div> 
   </div> 
  </div>               
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

</script>
</html>