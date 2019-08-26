<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //显示管理员列表
        $k = $request->input('key');

        $res = DB::table('user')->where('name','like','%'.$k.'%')->paginate(2);
       
        return view('Admin.User.userIndex',['res'=>$res,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加管理员
        return view('Admin.User.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$res = $request->except(['_token']);

    	//加密密码
    	$res['password'] = Hash::make($res['password']);

        //执行添加
        if(DB::table('user')->insert($res)){
        	return redirect('/adminuser')->with('success','添加管理员成功!');
        }else{
        	return back()->with('error','添加管理员失败!');
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
        $res=DB::table('user')->where('id','=',$id)->first();
        return view('Admin.User.userEdit',['res'=>$res]);
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
        if(DB::table('user')->where('id','=',$id)->delete()){
            return redirect('/adminuser')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }

    //分配管理员角色
    public function adminuserrole($id)
    {
        // dd($id);    
        //获取当前用户信息
        $res = DB::table('user')->where('id','=',$id)->first();
        //获取所有角色信息
        $info = DB::table('role')->get();
        //获取当前用户的角色信息
        $uinfo = DB::table('user_role')->where('uid','=',$id)->get();
        // dd($uinfo);
        if(count($uinfo)){
            foreach($uinfo as $k=>$v){
                //遍历出所有当前用户的角色信息 填入空数组
                $data[]=$v->rid;
            }
            return view('Admin.User.userRole',['user'=>$res,'role'=>$info,'data'=>$data]);
        }else{
            return view('Admin.User.userRole',['user'=>$res,'role'=>$info,'data'=>[]]); 
        }
        
    }
    //保存添加管理员角色
    public function adminrsave(Request $request)
    {
        $uid = $request->input('uid');
        $rids = $request->input('rid');
        // var_dump($uid);
        // var_dump($rid);
        //保存之前删除原来
        DB::table('user_role')->where('uid','=',$uid)->delete();

        $data = [];
        foreach($rids as $rid){
            $data['uid']=$uid;
            $data['rid']=$rid;

            //插入保存        
            DB::table('user_role')->insert($data);
        }
        

        return redirect('/adminuser')->with('success','分配角色成功!');

    }
}
