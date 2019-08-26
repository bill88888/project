<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminUserinsert;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Hash;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Ajax 分页
        //获取所有数据个数
        $count = Users::count();
        //每页显示数据数
        $rev = 2;
        //获取最大页
        $maxpage = ceil($count/$rev);
        //循环
        for($i=1;$i<=$maxpage;$i++){
            $pages[$i]=$i;
        }

        $page = $request->input('page');
        // var_dump($page);
        $key = $request->input('key');
        // var_dump($key);
        // 判断
        if(empty($page)){
            $page = 1;
        }
        //获取偏移量
        $offset = ($page-1)*$rev;       

        //分页查询用户 
        $res = Users::where('username','like','%'.$key.'%')->offset($offset)->limit($rev)->get();

        //判断请求方式
        if($request->ajax()){
            //建立独立模版
            return view('Admin.Users.usersPage',['users'=>$res,'key'=>$key]);
        }
       
        return view('Admin.Users.usersIndex',['users'=>$res,'pages'=>$pages,'key'=>$key]);
    }
    //用户详情
    public function info()
    {
        return view('Admin.Users.usersInfo');
    }
    //用户地址
    public function address($id)
    {
        $res=DB::table('address')->join('users','users.id','=','address.user_id')->select(DB::raw('address.user_id,address.id,address.huo,address.xhuo,address.phone,address.name as aname,users.username as uname'))->where('address.user_id','=',$id)->get();
        // dd($res);
        return view('Admin.Users.usersAddress',['res'=>$res]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.usersCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserinsert $request)
    {
        //执行添加
        $res = $request->except(['_token']);
        $res['token'] = str_random(50); 
        // var_dump($res);
        $res['password']=Hash::make($res['password']);
        if(Users::create($res)){
            return redirect('/adminusers')->with('success','添加用户成功!');
        }else{
            return back();
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
        //修改
        // echo $id;
        $res=Users::where('id','=',$id)->first();
        return view('Admin.Users.usersEdit',['res'=>$res]);
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
        //执行修改
        $res=$request->except('_token','_method');
        $res['token']=str_random(50);
        // var_dump($res);
        if(Users::where('id','=',$id)->update($res)){
            return redirect('/adminusers')->with('success','修改成功!');
        }else{
            return back()->with('error','修改失败!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idb
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        // echo $id;
        if(Users::where('id','=',$id)->delete()){
            return redirect('/adminusers')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
