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
	<title>填写订单</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/member.css">
 <link href="/homeStatic/xiangmv/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/homeStatic/xiangmv/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/homeStatic/xiangmv/css/cartstyle.css" rel="stylesheet" type="text/css" /> 
  <link href="/homeStatic/xiangmv/css/jsstyle.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="/homeStatic/css/home.css">

  <script type="text/javascript" src="/homeStatic/xiangmv/js/address.js"></script> 
  
    <script type="text/javascript" src="/homeStatic/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="/homeStatic/js/MSClass.js"></script>
   
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
                 <li style="font-size:12px">    
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
        <div class="header-logo fl" style="width:212px;"><h1><a href="#"><img src="/homeStatic/icon/logo.png"></a></h1></div>
        <div class="pc-order-titlei fl"><h2>填写订单</h2></div>
        <div class="pc-step-title fl">
            <ul>
                <li class="cur2"><a href="#">1 . 我的购物车</a></li>
                <li class="cur"><a href="#">2 . 填写提交订单</a></li>
                <li class="cur2"><a href="#">3 . 成功提交付款</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->


<!-- 商城快讯 begin -->

<section id="member">
  <div class="concent"> 
   <!--地址 --> 
   <div class="paycont"> 
    <div class="address"> 
     <h3>确认收货地址 </h3> 
     <div class="control"> 
      <div class="tc-btn createAddr theme-login am-btn am-btn-danger">
       使用新地址
      </div> 
     </div> 
     <div class="clear"></div> 
     <ul> 
      <div class="per-border"></div> 
      <!-- 收货地址开头 -->
      <!-- defaultAddr 这个是默认选中的样式 uid地址id -->
      @if(count($address))
      @foreach($address as $row)
      <li class="user-addresslist" uid="{{$row->id}}"> 
       <div class="address-left"> 
        <div class="user"> 
         <span class="buy-address-detail"> <span class="buy-user">{{$row->name}} </span> <span class="buy-phone">{{$row->phone}}</span> </span> 
        </div> 
        <div class="default-address"> 
         <span class="buy-line-title buy-line-title-type">收货地址：</span> 
         <span class="buy--address-detail"> <span class="province">{{$row->huo}}</span>  
        </div> 
       <!--  <ins class="deftip">
         默认地址
        </ins>  -->
       </div> 
       <div class="address-right"> 
        <a href="person/address.html"> <span class="am-icon-angle-right am-icon-lg"></span></a> 
       </div> 
       <div class="clear"></div> 
       <div class="new-addr-btn"> 
        <a href="#" class="hidden">设为默认</a> 
        <span class="new-addr-bar hidden">|</span> 
        <a href="#">编辑</a> 
        <span class="new-addr-bar">|</span> 
        <a href="javascript:void(0);" onclick="delClick(this);">删除</a> 
       </div> </li> 
       @endforeach
       @else
        暂无收货地址!
       @endif
       <!-- 收货地址结尾 -->
      <div class="per-border"></div> 
     </ul> 
     <div class="clear"></div> 
    </div> 
    <!--物流 --> 
    <div class="logistics"> 
     <h3>选择物流方式</h3> 
     <ul class="op_express_delivery_hot"> 
      <li data-value="yuantong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li> 
      <li data-value="shentong" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li> 
      <li data-value="yunda" class="OP_LOG_BTN  "><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li> 
      <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li> 
      <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li> 
     </ul> 
    </div> 
    <div class="clear"></div> 
    <!--支付方式--> 
    <div class="logistics"> 
     <h3>选择支付方式</h3> 
     <ul class="pay-list"> 
      <li class="pay card"><img src="/homeStatic/xiangmv/images/wangyin.jpg" />银联<span></span></li> 
      <li class="pay qq"><img src="/homeStatic/xiangmv/images/weizhifu.jpg" />微信<span></span></li> 
      <li class="pay taobao"><img src="/homeStatic/xiangmv/images/zhifubao.jpg" />支付宝<span></span></li> 
     </ul> 
    </div> 
    <div class="clear"></div> 
    <!--订单 --> 
    <div class="concent"> 
     <div id="payTable"> 
      <h3>确认订单信息</h3> 
      <div class="cart-table-th"> 
       <div class="wp"> 
        <div class="th th-item"> 
         <div class="td-inner">
          商品信息
         </div> 
        </div> 
        <div class="th th-price"> 
         <div class="td-inner">
          单价
         </div> 
        </div> 
        <div class="th th-amount"> 
         <div class="td-inner">
          数量
         </div> 
        </div> 
        <div class="th th-sum"> 
         <div class="td-inner">
          金额
         </div> 
        </div> 
        <div class="th th-oplist"> 
         <div class="td-inner">
          配送方式
         </div> 
        </div> 
       </div> 
      </div> 
      <div class="clear"></div>  
      <!-- 商品开头 -->
      @foreach($arr as $k=>$v)
      <div class="bundle  bundle-last"> 
       <div class="bundle-main"> 
        <ul class="item-content clearfix"> 
         <div class="pay-phone"> 
          <li class="td td-item"> 
           <div class="item-pic"> 
            <a href="#" class="J_MakePoint"> <img src="{{$v['pic']}}" class="itempic J_ItemImg" /></a> 
           </div> 
           <div class="item-info"> 
            <div class="item-basic-info"> 
             <a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v['name']}}</a> 
            </div> 
           </div> </li> 
          <li class="td td-info"> 
           <div class="item-props"> 
            <span class="sku-line">颜色：12#川南玛瑙</span> 
            <span class="sku-line">包装：裸装</span> 
           </div> </li> 
          <li class="td td-price"> 
           <div class="item-price price-promo-promo"> 
            <div class="price-content"> 
             <em class="J_Price price-now">{{$v['price']}}</em> 
            </div> 
           </div> </li> 
         </div> 
         <li class="td td-amount"> 
          <div class="amount-wrapper "> 
           <div class="item-amount "> 
            <span class="phone-title">购买数量</span> 
            <div class="sl"> 
             {{$v['num']}}
            </div> 
           </div> 
          </div> </li> 
         <li class="td td-sum"> 
          <div class="td-inner"> 
           <em tabindex="0" class="J_ItemSum number">{{$v['num']*$v['price']}}</em> 
          </div> </li> 
         <li class="td td-oplist"> 
          <div class="td-inner"> 
           <span class="phone-title">配送方式</span> 
           <div class="pay-logis">
             快递
            <b class="sys_item_freprice">10</b>元 
           </div> 
          </div> </li> 
        </ul> 
        <div class="clear"></div> 
       </div>  
       <div class="clear"></div> 
      </div> 
      @endforeach
     <!-- 商品结束 -->
      <div class="clear"></div> 
      <div class="pay-total"> 
       <!--留言--> 
       <div class="order-extra"> 
        <div class="order-user-info"> 
         <div id="holyshit257" class="memo"> 
          <label>买家留言：</label> 
          <input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close" /> 
          <div class="msg hidden J-msg"> 
           <p class="error">最多输入500个字符</p> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div class="clear"></div> 
      </div> 
      <!--含运费小计 --> 
      <div class="buy-point-discharge "> 
       <p class="price g_price "> 合计（含运费） <span>&yen;</span><em class="pay-sum">总计{{$tot}}元</em> </p> 
      </div> 
      <!--信息 --> 
      <div class="order-go clearfix"> 
       <div class="pay-confirm clearfix">
       <!-- 选择地址开始 -->
         @if(isset($oneaddress)) 
        <div class="boxx">
         <div tabindex="0" id="holyshit267" class="realPay">
          <em class="t">实付款：</em> 
          <span class="price g_price "> <span>&yen;</span> <em class="style-large-bold-red " id="J_ActualFee">{{$tot}}</em> </span> 
         </div>
         <div id="holyshit268" class="pay-address"> 
          <p class="buy-footer-address"> 寄送至：<span class="buy-line-title buy-line-title-type" id="address">{{$oneaddress->huo}}</span>  </p> 
          <p class="buy-footer-address"> <span class="buy-line-title">收货人：</span> <span class="buy-address-detail"> <span class="buy-user" id="user">{{$oneaddress->name}}</span> <span class="buy-phone" id="phone">{{$oneaddress->phone}}</span> </span> </p> 
         </div>
        </div>
    
        <!-- 选择地址结束 -->
        <form action="/homeorder" method="post">
        <div id="holyshit269" class="submitOrder">
         <div class="go-btn-wrap">
          <input type="hidden" name="address_id">
          <input type="hidden" name="sum" value={{$tot}}>
          {{csrf_field()}} 
          <input type="submit" value="提交订单" style="background-color:#ea4949; width:153px; height:50px; font-size: 15px; color:white; cursor:pointer; border: #ea4949">
         </div> 
        </div>
        </form>
         @else  
         <div class="boxx">
         <div tabindex="0" id="holyshit267" class="realPay">
          <em class="t">实付款：</em> 
          <span class="price g_price "> <span>&yen;</span> <em class="style-large-bold-red " id="J_ActualFee">{{$tot}}</em> </span> 
         </div>
         <div id="holyshit268" class="pay-address"> 
          <p class="buy-footer-address"> 寄送至：<span class="buy-line-title buy-line-title-type" id="address"></span>  </p> 
          <p class="buy-footer-address"> <span class="buy-line-title">收货人：</span> <span class="buy-address-detail"> <span class="buy-user" id="user"></span> <span class="buy-phone" id="phone"></span> </span> </p> 
         </div>
        </div>
    
        <!-- 选择地址结束 -->
        <form action="/homeorder" method="post">
        <div id="holyshit269" class="submitOrder">
         <div class="go-btn-wrap">
          <input type="hidden" name="address_id">
          <input type="hidden" name="sum" value={{$tot}}>
          {{csrf_field()}} 
        
         </div> 
        </div>
        </form>
         @endif 
        <div class="clear"></div> 
       </div> 
      </div> 
     </div> 
     <div class="clear"></div> 
    </div> 
   </div> 
  
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
<div class="theme-popover-mask"></div> 
  <div class="theme-popover"> 
   <!--标题 --> 
   <div class="am-cf am-padding"> 
    <div class="am-fl am-cf">
     <strong class="am-text-danger am-text-lg">新增地址</strong> / 
     <small>Add address</small>
    </div> 
   </div> 
   <hr /> 
   <div class="am-u-md-12"> 
    <form class="am-form am-form-horizontal" action="/address" method="post"> 
     <div class="am-form-group"> 
      <label for="user-name" class="am-form-label">收货人</label> 
      <div class="am-form-content"> 
       <input type="text" id="user-name" name="name" placeholder="收货人" /> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">手机号码</label> 
      <div class="am-form-content"> 
       <input id="user-phone" placeholder="手机号必填" name="phone" type="text" /> 
      </div> 
     </div>
     <input type="hidden" name="huo"> 
     <div class="am-form-group"> 
      <label for="user-phone" class="am-form-label">所在地</label> 
      <div class="am-form-content address"> 
       <select id="cid" class="sel"> 
          <option value="" class="ss">--请选择--</option> 
       </select> 
      </div> 
     </div> 
     <div class="am-form-group"> 
      <label for="user-intro" class="am-form-label">详细地址</label> 
      <div class="am-form-content"> 
       <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="xhuo"></textarea> 
       <small>100字以内写出你的详细地址...</small> 
      </div> 
     </div> 
     <div class="am-form-group theme-poptit"> 
      <div class="am-u-sm-9 am-u-sm-push-3">  
        {{csrf_field()}}
        
        <input id="sub" type="submit" value="提交" style="background-color:#dd514c; width:58px; height:32px; font-size: 14px; color:white; cursor:pointer; border: #dd514c;">
       <div class="am-btn am-btn-danger close">
        取消
       </div> 
      </div> 
     </div> 
    </form> 
   </div> 
  </div>
</body>
<script type="text/javascript">
  //第一级数据
    $.ajax({
      url:'/city',//url地址
      type:'get',//请求方式
      data:{upid:0},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        // alert(data);
        //遍历
        for(var i=0;i<data.length;i++){
          $(".ss").attr("disabled",true);
          // alert(data[i].name);
          //存储在option
          option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
          // alert(option);
          //把带有数据的option内部插入到第一个select
          $("#cid").append(option);
        }
      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });

    //获取其他几级数据 
    //事件委派 live(事件,事件处理器函数)
    $("select").live("change",function(){
      //移除元素
      $(this).nextAll("select").remove();
      // alert($(this).val());
      o=$(this);
      //获取子级的upid
      upid=$(this).val();
      // alert(upid);
      $.ajax({
      url:'/city',//url地址
      type:'get',//请求方式
      data:{upid:upid},
      async:true,//异步处理
      dataType:'json',//返回响应数据类型
      //Ajax 响应成功匿名函数
      success:
      function(data){
        //创建select
        select=$("<select></select>");
        //内部插入option
        select.append('<option value="" class="mm">--请选择--</option>');
        // alert(data);
        //判断
        if(data.length>0){
          //遍历
          for(var i=0;i<data.length;i++){
            // alert(data[i].name);
            //存储在option
            option='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            // alert(option);
            // 把带有数据的option内部插入到创建好的select
            select.append(option);
          }
          //把创建好的select 追加到前一个select后
          o.after(select);
          //禁用其他级别 请选择
          $(".mm").attr("disabled",true);
        }

      },
      //Ajax 响应失败的匿名函数
      error:
      function(){
        alert("Ajax响应失败");
      }
    });
    });
//赋值隐藏域 在不选择的情况下拿第一个
var address_id=$('.user-addresslist').attr('uid');
$('input[name="address_id"]').val(address_id);
//获取选中地址的信息
var arr=[];
$('#sub').click(function(){
    $('select').each(function(){
        //获取选中的数据
        var cho=$(this).find('option:selected').html();
         // alert(cho);
         //判断不拿没选择的
        if(cho!=='--请选择--'){
          arr.push(cho);
        }  
    });
    //把新组成的数组赋给隐藏域
    $("input[name='huo']").val(arr);
});
//选择收货地址
$('.user-addresslist').click(function(){
    var id=$(this).attr('uid');
    //赋值隐藏域
    $('input[name="address_id"]').val(id);
    // alert(id);
    $.get('/selectaddress',{id:id},function(res){
        // alert(res);
        $('#address').html(res.huo);
        $('#user').html(res.name);
        $('#phone').html(res.phone);
    },'json');
});
</script>
</html>