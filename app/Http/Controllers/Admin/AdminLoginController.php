<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出删除session
        $request->session()->pull('adminname');
        $request->session()->pull('nodelist');

        //退出登录跳转登录页面
        return redirect('/adminlogin/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //登录界面
        return view('Admin.login');
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
        $name = $request->input('name');
        $password = $request->input('password');

        //判断验证
        $res = DB::table('user')->where('name','=',$name)->first();
        //验证账号
            if($res){
                    //验证密码
                    if(Hash::check($password,$res->password)){
                        //登录成功后将名字存入session
                        session(['adminname'=>$res->name]);
                        
                        //1 获取后台登录用户的所有权限
                        $list = DB::select("select n.name,n.cname,n.fname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$res->id}");
                        // var_dump($list);die;
                        //2 初始化权限 使所有管理员有查看后台首页的权限
                        $nodelist['AdminController'][]='index';
                        foreach($list as $k=>$v){
                            //将当前登录的用户权限写入$nodelist
                            $nodelist[$v->cname][]=$v->fname;
                            //有create方法 给当前登录的用户加store
                            if($v->fname=='create'){
                                $nodelist[$v->cname][]='store';
                            }
                            //有edit方法 给当前登录的用户加update
                            if($v->fname=='edit'){
                                $nodelist[$v->cname][]='update';
                            }
                        }
                        //3 把当前登录的用户所有权限信息存入session
                        session(['nodelist'=>$nodelist]);

                        // var_dump($nodelist);die;

                        //跳转后台首页
                        return redirect('/admin')->with('success','登录成功!');
                    }else{
                        return back()->with('error','密码不正确!');
                    }

                }else{
                    return back()->with('error','用户名不正确!');
                }
                // dd($res);
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
}
