<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use Mail;
class HomeLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出删除session
        $request->session()->pull('email');
        $request->session()->pull('cart');
        $request->session()->pull('goods');
        return redirect('/index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //前台登录
    public function create()
    {
        return view('Home.Login.homeLogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行登录
        $email = $request->input('email');
        $password = $request->input('password');
        //判断邮箱是否存在
        $info = Users::where('email','=',$email)->first();
        if($info){
            //判断密码
            if(Hash::check($password,$info->password)){
                //判断权限
                if($info->status == '激活'){
                    session(['email'=>$email]);
                    session(['user_id'=>$info->id]);
                    return redirect('/index');
                }else{
                    return back()->with('error','请先去激活用户');
                }
            }else{
                return back()->with('error','密码不正确');
            }
        }else{
            return back()->with('error','邮箱不正确');
        }

        // var_dump($email,$password);
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
    //忘记密码
    public function forget()
    {
        return view('Home.Login.forget');
    }
    public function doforget(Request $request)
    {
        $mail = $request->input('email');
        //通过邮件查表
        $info = Users::where('email','=',$mail)->first();
        // var_dump($res);
        $result = $this->forgetmail($info->id,$info->token,$mail);
        if($result){
            echo '邮件已发送请尽快前往邮箱修改密码!';
        }

    }
    //发邮件
    public function forgetmail($id,$token,$email)
    {
        //邮件消息生成器 $message 
        //use 把闭包函数外部的变量直接引入到闭包函数内部
        Mail::send('Home.Login.reset',['id'=>$id,'token'=>$token], function ($message)use($email){ 
            //发送主题
            $message->subject('点击这里重置您的密码!'); 
            //接收方 
            $message->to($email); 
        }); 
        return true;
    }

    //重置密码
    public function reset(Request $request)
    {
        $id = $request->input('id');
        $token = $request->input('token');
        $info = Users::where('id','=',$id)->first();
        // dd($info);
        //比对token
        if($token==$info->token){
            //重置密码页面
            return view('Home.Login.vreset',['id'=>$id]);
        }
    }
    public function doreset(Request $request)
    {
        $pwd = $request->input('password');
        $id = $request->input('id');
        // var_dump($pwd,$id);
        //执行修改
        $data=[];
        $data['password']=Hash::make($pwd);
        $data['token']=str_random(50);
        if(Users::where('id','=',$id)->update($data)){
            return redirect('/okreset');
        }
    }
    public function okreset()
    {
        return view('Home.Login.okreset');
    }
}
