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
	<title>用户注册</title>
    <link rel="shortcut icon" type="image/x-icon" href="/homeStatic/icon/favicon.ico">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/base.css">
	<link rel="stylesheet" type="text/css" href="/homeStatic/css/login.css">
    <script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>

 </head>

 <body>
<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0">
        <div><h1><a href="index.html" id="a"><img src="/homeStatic/icon/logo.png"></a></h1></div>
    </div>
</header>
<!-- header End -->



<section id="login-content">
    <div class="login-centre">
        <div class="login-switch clearfix">
            
            <p class="fr">我已经注册，现在就 <a href="/homelogin/create">登录</a></p>
        </div>
    
        <div style="width:200px;height:60px;position:absolute;margin-left:270px;background-color:;text-align:center;line-height:60px;font-size:15px;color:black;cursor:pointer;border-bottom:1px solid #ea4949;" id="email">邮箱注册</div>
       
        <div style="width:200px;height:60px;position:absolute;margin-left:590px;background-color:;text-align:center;line-height:60px;font-size:15px;color:black;cursor:pointer;border-bottom:1px solid #ea4949;" id="phone">手机注册</div>
        <!--邮箱注册-->
        <div class="login-back" style="display:block" id="ediv">
            <div class="H-over">
                <form action="/emailregister" method="post">
                    
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input" name="password" placeholder="设置密码" reminder="请输入正确的手机号">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input" name="repassword" placeholder="确认密码" reminder="请输入正确的手机号">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>邮箱：</label>
                        <input type="text" class="list-input1" name="email" placeholder="请输入可用邮箱" reminder="请输入正确的手机号">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>验证码：</label>
                        <input type="text" class="list-notes" name="code" placeholder="请输入验证码" reminder="请输入正确的手机号">
                        <img src="/code" onclick="this.src=this.src+'?k=520'">
                        @if(session('error'))
                            <span style="color:red; font-size:15px;">{{session('error')}}</span>
                        @endif
                    </div>
                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    
                    <div class="login-button">
                        {{csrf_field()}}
                       <input type="submit" value="立即注册" style="background-color:#ea4949; width:200px; height:50px; font-size: 15px; color:white; cursor:pointer; border: #ea4949">
                    </div>
                </form>
            </div>
        </div>
        
        <!--手机注册-->
        <div class="login-back" style="display:none" id="pdiv">
            <div class="H-over">
                <form action="/phoneregister" method="post" id="sub">
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input inp" id="password" name="password" placeholder="设置密码" reminder=""><span></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input inp" id="password1" name="repassword" placeholder="确认密码" reminder=""><span></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone inp" id="iphone" name="phone" placeholder="请输入可用手机" reminder="请输入正确的手机号"><span></span>
                        <button class="obtain" id="btn" type="button" style="cursor:pointer;">获取短信验证码</button>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes inp" id="message" name="code" placeholder="请输入短信验证码" reminder="请输入验证码"><span></span>
                    </div>
                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    <div class="login-button">
                        {{csrf_field()}}
                       <input type="submit" value="立即注册" style="background-color:#ea4949; width:200px; height:50px; font-size: 15px; color:white; cursor:pointer; border: #ea4949">
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<!--- footer begin-->
<footer id="footer">
    <div class="containers">
        <div class="w" style="padding-top:30px">
            <div id="footer-2013">
                <div class="links">
                    <a href="">关于我们</a>
                    |
                    <a href="">联系我们</a>
                    |
                    <a href="">人才招聘</a>
                    |
                    <a href="">商家入驻</a>
                    |
                    <a href="">广告服务</a>
                    |
                    <a href="">手机京东</a>
                    |
                    <a href="">友情链接</a>
                    |
                    <a href="">销售联盟</a>
                    |
                    <a href="">English site</a>
                </div>
                <div style="padding-left:10px">
                    <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
                    <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- footer End -->
</body>
<script type="text/javascript">
// alert($);
    
    $('#email').click(function(){
        $('#ediv').show();
        $('#pdiv').hide(); 
    }).hover(function(){
        $(this).data('color',$(this).css('color')).data('bgcolor',$(this).css('background-color')).data('border',$(this).css('border-bottom')).css('background-color','#ea4949').css('color','white');
    },function(){
        $(this).css('border-bottom',$(this).data('border')).css('color',$(this).data('color')).css('background-color',$(this).data('bgcolor'));
    });

    $('#phone').click(function(){
        $('#pdiv').show();
        $('#ediv').hide();
    }).hover(function(){$(this).css('background-color','#ea4949').css('color','white')},function(){$(this).css('border-bottom','1px solid #ea4949').css('color','black').css('background-color','')});

//手机注册 表单验证
Phone=false;
Code=false;
$('.inp').focus(function(){
    var a = $(this).attr('reminder');
    // alert(a);
    $(this).next().html(a).css('color','red').css('line-height','42px');
});
//失去焦点 手机
$("input[name='phone']").blur(function(){
    //供ajax里用
    var me = $(this);
    var p = $(this).val();
    //正则校验
    if(p.match(/^\d{11}$/)==null){
        //验证失败
        $(this).next().css('color','red').html('手机号不合法').css('line-height','42px');
        Phone=false;
    }else{
        //验证手机是否被使用过
        $.get('/phonecheck',{p:p},function(result){
            // alert(result);

            //验证失败
            me.next().html(result);
            $('#btn').attr('disabled',true);
            Phone=false;
            //验证成功
            if(result==0){
                me.next().html('手机号可用').css('color','green');
                $('#btn').attr('disabled',false);

                Phone=true;
            }
        });
    }
});
//获取按钮
$('#btn').click(function(){
    var me = $(this);
    //获取手机号
    var p = $("input[name='phone']").val();;
        // alert(1);
    $.get('/phonesend',{p:p},function(result){
        // alert(result);
        if(result.code==000000){
            var m=60;
            var timmer=setInterval(function(){
                m--;
                //按钮赋值
                me.html(m);
                //倒计时禁用按钮
                me.attr('disabled',true);
                if(m<1){
                    clearInterval(timmer);
                    //重新赋值
                    me.html('发送');
                    me.attr('disabled',false);
                }
            },1000);
        }
    },'json');
});

//检查验证码
$("input[name='code']").blur(function(){
    var me=$(this);
    var code=$(this).val();
    // alert(1);
    $.get('/codecheck',{code:code},function(result){
        // alert(result);          
        //验证失败
        me.next().html(result).css('color','red').css('line-height','42px');
        Code=false;
        //验证成功
        if(result == 1){
            me.next().html('校验成功').css('color','green');
            Code=true;
        }
    });
});
//表单提交
$('#sub').submit(function(){
    $('input').trigger('blur');

    if(Phone && Code){
        //提交
        return true;
    }else{
        return false;
    }
});
</script>
</html>