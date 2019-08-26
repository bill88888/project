<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入验证码类
use Gregwar\Captcha\CaptchaBuilder;
//导入mail类
use Mail;
use App\Models\Users;
use Hash;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //邮箱注册
    public function create()
    {
        //邮箱注册界面
        return view('Home.Register.regIndex');
    }
    //验证码
    public function code()
    {
        //生成校验码代码 
        ob_clean();//清除操作
        //实例化校验码类库
        $builder = new CaptchaBuilder; 
        //可以设置图片宽高及字体 
        $builder->build($width = 100, $height = 40, $font = null); 
        //获取验证码的内容
        $phrase = $builder->getPhrase(); 
        //把内容存入session 方便和输入的校验码作对比
        session(['vcode'=>$phrase]); 
        //生成图片 
        header("Cache-Control: no-cache, must-revalidate"); 
        header('Content-Type: image/jpeg'); 
        $builder->output();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //发送邮件
    public function registermail($id,$token,$email)
    {
        //邮件消息生成器 $message 
        //use 把闭包函数外部的变量直接引入到闭包函数内部
        Mail::send('Home.Register.activate',['id'=>$id,'token'=>$token], function ($message)use($email){ 
            //发送主题
            $message->subject('请您点击这里激活您的用户!抓紧时间呦!'); 
            //接收方 
            $message->to($email); 
        }); 
        return true;
    }
    //注册添入数据表
    public function store(Request $request)
    {
        //执行添加注册        
        $code = $request->input('code');
        $vcode = session('vcode');
        // var_dump($res);
        // 判断验证码是否正确
        if($code == $vcode){
            // $res = $request->all();
            $data['email'] = $request->input('email');
            $data['username'] = 'bl'.mt_rand(10000000,99999999);
            $data['password'] = $request->input('password');
            //加密密码
            $data['password'] = Hash::make($data['password']);
            $data['status']=0;
            $data['token'] = str_random(50);
            // dd($data);
            $res = Users::create($data);
            $id = $res->id;
            // var_dump($data);
            if($id){
                // echo '添加成功';
                $info = $this->registermail($id,$data['token'],$data['email']);
                // dd($info);
                if($info){
                    echo '邮件已发送';
                    // return redirect('');
                }else{
                    echo '请重新发送';
                }
            }else{
                echo '添加失败';
            }
            
        }else{
            return back()->with('error','验证码有误!');
        }
    }
    //用户激活
    public function activate(Request $request)
    {
        $id=$request->input('id');
        $token=$request->input('token');
        $res=Users::where('id','=',$id)->first();
        
        //判断token
        if($res->token == $token){
            $data = [];
            //修改状态
            $data['status']=2;
            //重置token
            $data['token'] = str_random(50);
            Users::where('id','=',$id)->update($data);
            echo '激活成功!请登录!';
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     //检查手机号是否使用过
    public function phonecheck(Request $request)
    {
        //接收提交的手机号
        $p = $request->input('p');
        //查询表中的手机号
        $pp = Users::pluck('phone')->toArray();
        if(in_array($p,$pp)){
            echo "手机号已经被注册";
        }else{
            echo 0;
        }
    }
    //发送短信校验码
    public function phonesend(Request $request)
    {
        $pp = $request->input('p');
        // echo $pp;
        //调用短信接口
        $data=sendsphone($pp);
        echo $data;
    }
    //检查校验码
    public function codecheck(Request $request)
    {
        //拿到输入的验证码
        $code = $request->input('code');
        
        //判断
        if(isset($_COOKIE['pcode']) && !empty($code)){
            //获取手机接收的短信
            $pcode=$request->cookie('pcode');
            if($pcode==$code){
                echo 1;
            }else{
                echo '校验码不一致';
            }
        }elseif(empty($code)){
            echo '请添入校验码';
        }else{
            echo '校验码过期';
        }
    }
    //手机注册
    public function phoneregister(Request $request)
    {   
        $info = [];
        $info['password'] = $request->input('password');

        $info['phone'] = $request->input('phone');
        $info['username'] = mt_rand(10000000,99999999);
        $info['status'] = 2;
        $info['token'] = str_random(50);
        $info['password']=Hash::make($info['password']);
        // dd($info);
        if(Users::create($info)){
            return redirect('/homelogin/create');
        }else{
            return back();
        }
    }

}
