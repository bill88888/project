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
	<title>商品详情</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/home.css">
	<script type="text/javascript" src="/homeStatic/js/jquery.js"></script>
	<script type="text/javascript" src="/homeStatic/js/index.js"></script>
	<script type="text/javascript" src="/homeStatic/js/js-tab.js"></script>
    <script>
         $(function(){
             $(".yScrollListInList1 ul").css({width:$(".yScrollListInList1 ul li").length*(160+84)+"px"});
             $(".yScrollListInList2 ul").css({width:$(".yScrollListInList2 ul li").length*(160+84)+"px"});
             var numwidth=(160+84)*4;
             $(".yScrollListInList .yScrollListbtnl").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts<60){
                         obj.animate({left:lefts+numwidth},1000);
                     }
                 }
             })
             $(".yScrollListInList .yScrollListbtnr").click(function(){
                 var obj=$(this).parent(".yScrollListInList").find("ul");
                 var objcds=-(60+(Math.ceil(obj.find("li").length/4)-4)*numwidth);
                 if (!(obj.is(":animated"))) {
                     var lefts=parseInt(obj.css("left").slice(0,-4));
                     if(lefts>objcds){
                         obj.animate({left:lefts-numwidth},1000);
                     }
                 }
             })
         })
     </script>
    <script>
         $(function(){
         	$("#pro_detail a").click(function(){
         		$("#pro_detail a").removeClass("cur");
         		$(this).addClass("cur");
         		$("#big_img").attr("src",$(this).attr("simg"));
         	});
         	
         	$(".attrdiv a").click(function(){
         		$(".attrdiv a").removeClass("cur");
				$(this).addClass("cur");
         	});
            //自加
            $(".attrdivs a").click(function(){
                $(".attrdivs a").removeClass("cur");
                $(this).addClass("cur");
            });
         	
         	$('.amount2').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = (num_input.val()-1)>0?(num_input.val()-1):1;
		        num_input.val(buy_num);
		    });
		
		    $('.amount1').click(function(){
		        var num_input = $("#subnum");
		        var buy_num = Number(num_input.val())+1;
		        num_input.val(buy_num);
		    });
			
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
    <script type="text/javascript">
         (function(a){
             a.fn.hoverClass=function(b){
                 var a=this;
                 a.each(function(c){
                     a.eq(c).hover(function(){
                         $(this).addClass(b)
                     },function(){
                         $(this).removeClass(b)
                     })
                 });
                 return a
             };
         })(jQuery);

         $(function(){
             $("#pc-nav").hoverClass("current");
         });
     </script>
     <script type="text/javascript">
         $(document).ready(function(){

             $("#firstpane .menu_body:eq(0)").show();
             $("#firstpane h3.menu_head").click(function(){
                 $(this).addClass("current").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

             $("#secondpane .menu_body:eq(0)").show();
             $("#secondpane h3.menu_head").mouseover(function(){
                 $(this).addClass("current").next("div.menu_body").slideDown(500).siblings("div.menu_body").slideUp("slow");
                 $(this).siblings().removeClass("current");
             });

         });
     </script>

<style type="text/css">
        #big{width:418px;height:418px;position:absolute;left:650px;top:260px;overflow:hidden;display:none;}
</style>
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
        <div class="header-logo fl"><h1><a href="#"><img src="/homeStatic/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="手机模型">
                <button class="button" onClick="search('key');return false;">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <div class="header-cart fr"><a href="#"><img src="/homeStatic/icon/car.png"></a> <i class="head-amount">99</i></div>
        <div class="head-mountain"></div>
    </div>
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
                <h2 class="pullDownTitle">全部商品分类</h2>
            </div>
            <ul class="yMenuIndex">
                <li><a href="" target="_blank">服装城</a></li>
                <li><a href="" target="_blank">美妆馆</a></li>
                <li><a href="" target="_blank">美食</a></li>
                <li><a href="" target="_blank">全球购</a></li>
                <li><a href="" target="_blank">闪购</a></li>
                <li><a href="" target="_blank">团购</a></li>
                <li><a href="" target="_blank">拍卖</a></li>
                <li><a href="" target="_blank">金融</a></li>
                <li><a href="" target="_blank">智能</a></li>
            </ul>
        </div>
    </div>
</header>
<!-- header End -->

<!-- 商品详情 begin -->
<section>

    <!--商品填入购物车statr-->
<form action="/homecart" method="post">
    <div class="pc-details" >
        <div class="containers">
            <div class="pc-nav-item"><a class="pc-title" href="#">电脑、办公</a> &gt; <a href="#">外设产品</a> &gt; <a href="#">电玩</a>&gt; <a href="#">爱电玩（IGAME）</a>&gt; <a href="#">任天堂NEW 3DS XL NDSi NDSiLL NEW</a> </div>
            <div class="pc-details-l">
                <div class="pc-product clearfix">
                    <div class="pc-product-h">
                        <!--放大镜-->
                        <div class="pc-product-top"><img src="{{$res->pic}}" id="small" width="418px" height="418px"></div>
                        <div id="big">
                            <img src="{{$res->pic}}" alt="" width="1672px">
                        </div>
                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul>
                                <li><a href="javascript:void(0);" class="cur" simg="{{$res->pic}}"><img src="{{$res->pic}}" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/homeStatic/img/pd/product2.png"><img src="/homeStatic/img/pd/product1.png" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/homeStatic/img/pd/product3.png"><img src="/homeStatic/img/pd/product2.png" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/homeStatic/img/pd/produc4.png"><img src="/homeStatic/img/pd/product3.png" width="58" height="58"></a> </li>
                                <li><a href="javascript:void(0);" simg="/homeStatic/img/pd/product5.png"><img src="/homeStatic/img/pd/product4.png" width="58" height="58"></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pc-product-t">
                        <div class="pc-name-info">
                            <h1>{{$res->name}}</h1>
                            <p class="clearfix pc-rate"><strong>￥{{$res->price}}</strong> 
                                <!-- <span><em>限时抢购</em>抢购将于<b class="reds">18</b>小时<b class="reds">57</b>分<b class="reds">34</b>秒后结束</span> --></p>
                            <p>由<a href="#" class="reds">神游官方旗舰店</a> 负责发货，并提供售后服务。</p>
                        </div>
                        <div class="pc-dashed clearfix">
                            <span>累计销量：<em class="reds">3988</em> 件</span><b>|</b><span>累计评价：<em class="reds">3888</em></span>
                        </div>
                        <div class="pc-size">
                            <div class="attrdiv pc-telling clearfix">
                                <div class="pc-version">尺码</div>
                                <div class="pc-adults">
                                    <ul>
                                        <li><a href="javascript:void(0);" class="cur">xxl</a> </li>
                                        <li><a href="javascript:void(0);">xl</a> </li>
                                        <li><a href="javascript:void(0);">l</a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="pc-telling clearfix attrdivs">
                                <div class="pc-version">颜色分类</div>
                                <div class="pc-adults">
                                    <ul>
                                        <li><a href="javascript:viod(0)" title="黑色" class="cur"><img src="/homeStatic/img/pd/product.png" width="35" height="35"></a> </li>
                                        <li><a href="javascript:viod(0)" title="白色"><img src="/homeStatic/img/pd/product1.png" width="35" height="35"></a> </li>
                                        <li><a href="javascript:viod(0)" title="金色"><img src="/homeStatic/img/pd/product2.png" width="35" height="35"></a> </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="pc-telling clearfix">
                                <div class="pc-version">数量</div>
                                <div class="pc-adults clearfix">
                                    <div class="pc-adults-p clearfix fl">
                                        <input type="text" id="subnum" value="1" name="num">
                                        <input type="hidden" name="{{$res->num}}" id="inp">
                                        <a href="javascript:void(0);" class="amount1">+</a>
                                        <a href="javascript:void(0);" class="amount2">-</a>
                                    </div>
                                    <div class="fl pc-letter ">件</div>
                                    <div class="fl pc-stock ">库存<b>{{$res->num}}</b>件</div>
                                </div>
                            </div>
                            <div class="pc-number clearfix"><span class="fl">商品编号：1654456   </span> <span class="fr">分享 收藏</span></div>
                        </div>
                        <input type="hidden" name="id" value="{{$res->id}}">
                        {{csrf_field()}}
                        <div class="pc-emption">
                            <a href="#">立即购买</a>
                            <input type="submit" value="加入购物车" style="background-color:#e6433e; width:152px; height:40px; font-size: 14px; color:white; cursor:pointer; border: #ea4949" class="join">
                        </div>    
                    </div>
                    <div class="pc-product-s">
                        <div class="pc-shoplo"><a href="#"><img src="/homeStatic/icon/shop-logo.png"></a> </div>
                        <div class="pc-shopti">
                            <h2>神游官方旗舰店</h2>
                            <p>公司名称：优购科技有限公司</p>
                            <p>所在地： 广东省   深圳市</p>
                        </div>
                        <div class="pc-custom"><a href="#">联系客服</a> </div>
                        <div class="pc-trigger">
                            <a href="#">进入店铺</a>
                            <a href="#" style="margin:0;">关注店铺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!--商品填入购物车end-->

    <div class="containers clearfix" style="margin-top:20px;">
        <div class="fl">
            <div class="pc-menu-in">
                <h2>店内搜索</h2>
                <form>
                    <p>关键词:<input type="text" class="pc-input1"></p>
                    <p>价  格：<input class="pc-input2"> 到 <input class="pc-input2"></p>
                    <p><a href="#">搜索</a> </p>
                </form>
            </div>
            <div class="menu_list" id="firstpane">
                <h2>店内分类</h2>
                <h3 class="menu_head current">电玩</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">游戏机</a>
                </div>
                <h3 class="menu_head">手机</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                </div>

                <h3 class="menu_head">耳机耳麦</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                </div>
            </div>
        </div>
        <div class="pc-info fr">
            <div class="pc-overall">
                <ul id="H-table1" class="brand-tab H-table1 H-table-shop clearfix ">
                    <li class="cur"><a href="javascript:void(0);">商品介绍</a></li>
                    <li><a href="javascript:void(0);">商品评价<em class="reds">(91)</em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                       <ul class="clearfix">
                           <li>
                               <p>屏幕尺寸：4.8英寸</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>后置摄像头：800万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>前置摄像头：190万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>3G：电信(CDMA2000)</p>
                               <p>2G：移动/联通(GSM)/电信(CDMA </p>
                           </li>
                       </ul>
                       <div class="pc-line"></div>
                       <ul class="clearfix">
                           <li>
                               <p>商品名称：三星I939I</p>
                               <p>商品毛重：360.00g </p>
                           </li>
                           <li>
                               <p>商品编号：1089266</p>
                               <p>商品产地：中国大陆</p>
                           </li>
                           <li>
                               <p>品牌： 三星（SAMSUNG）</p>
                               <p>系统：安卓（Android </p>
                           </li>
                           <li>
                               <p>上架时间：2015-03-30 09:07:18</p>
                               <p>机身颜色：白色</p>
                           </li>
                       </ul>
                       <div>
                       </div>
                   </div>
                   <div class="H-over1" style="display:none">
                       <div class="pc-comment fl"><strong>86<span>%</span></strong><br> <span>好评度</span></div>
                       <div class="pc-percent fl">
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>中评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                       </div>
                   </div>
                   <div class="H-over1 pc-text-title" style="display:none">
                       <p>本产品全国联保，享受三包服务，质保期为：一年质保
                           如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！
                           (注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......</p>
                       <div class="pc-line"></div>
                   </div>
                </div>
            </div>
            <div class="pc-overall">
                <ul class="brand-tab H-table H-table-shop clearfix " id="H-table" style="margin-left:0;">
                    <li class="cur"><a href="javascript:void(0);">全部评价（199）</a></li>
                    <li><a href="javascript:void(0);">好评<em class="reds">（33）</em></a></li>
                    <li><a href="javascript:void(0);">中评<em class="reds">（02）</em></a></li>
                    <li><a href="javascript:void(0);">差评<em class="reds">（01）</em></a></li>
                </ul>
                <div class="pc-term clearfix">
                    <div class="pc-column">
                        <span class="column1">评价心得</span>
                        <span class="column2">顾客满意度</span>
                        <span class="column3">购买信息</span>
                        <span class="column4">评论者</span>
                    </div>
                    <div class="H-over  pc-comments clearfix">
                        <ul class="clearfix">
                            @foreach($data as $row)
                            @if($row->shops_id==$res->id)
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>{{$row->content}}</p>
                                    <p class="column5">{{$row->etime}}</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>{{$row->uname}}</p>
                                    <p>{{$row->otime}}购买</p>
                                </div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                  <!--   <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img src="/homeStatic/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img src="/homeStatic/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="clearfix">
                <div class="fr pc-search-g pc-search-gs">
                    <a href="#" class="fl " style="display:none">上一页</a>
                    <a class="current" href="#">1</a>
                    <a href="javascript:;">2</a>
                    <a href="javascript:;">3</a>
                    <a href="javascript:;">4</a>
                    <a href="javascript:;">5</a>
                    <a href="javascript:;">6</a>
                    <a href="javascript:;">7</a>
                    <span class="pc-search-di">…</span>
                    <a href="javascript:;">1088</a>
                    <a href="javascript:;" class="" title="使用方向键右键也可翻到下一页哦！">下一页</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 商品详情 End -->

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
    //找对象
        var big =  document.getElementById('big');
        var  small =  document.getElementById('small');
    small.onmousemove = function(e){
        var e = e || event;
        document.title="X:"+e.clientX+'Y:'+e.clientY;
        //如何获取到大图对应的坐标
        //将大图的滚动条位置调整到小图鼠标坐标的4倍的位置
        big.scrollLeft = e.clientX*4-800;
        big.scrollTop = e.clientY*4-1200;
        //让对应的大图片显示出来
        big.style.display="block";
    }

    small.onmouseout  = function(){
        //鼠标移除之后让你的大图隐藏
        big.style.display="none";
    }
</script></script>
</html>