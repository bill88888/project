<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //角色列表显示
        $k = $request->input('key');
        $res = DB::table('role')->where('name','like','%'.$k.'%')->get(); 
        return view('Admin.Role.roleIndex',['role'=>$res,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //角色添加
        $res = DB::table('node')->get();
        return view('Admin.Role.roleCreate',['nodes'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行添加
        //添加角色
        $name = $request->only(['name']);
        // var_dump($name);die;
        $nids = $request->input('nid');
        // var_dump($nids);die;

        if(DB::table('role')->insert($name)){
            $res = DB::table('role')->where('name','=',$name)->first();
            // $data[];
            foreach($nids as $nid){
                $data['rid'] = $res->id;
                $data['nid'] = $nid;
                DB::table('role_node')->insert($data);
            }
            return redirect('/adminrole')->with('success','添加角色成功!');
        }else{
            return back()->with('error','添加角色失败!');
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
        //执行删除
        if(DB::table('role')->where('id','=',$id)->delete()){
            return redirect('/adminrole')->with('success','删除角色成功!');
        }else{
            return redirect('/adminrole')->with('error','删除角色失败!');
        }        
    }

    //分配权限
    public function adminroleauth($id)
    {
        //查看当前角色信息
        $roles = DB::table('role')->where('id','=',$id)->first();
        //查看所有权限信息
        $nodes = DB::table('node')->get();
        //查看当前角色的权限信息
        $rnode = DB::table('role_node')->where('rid','=',$id)->get();
        // var_dump($rnode);die;
        $data = [];
        
        foreach($rnode as $k=>$v){
            $data[]=$v->nid;
        }
        if(count($data)){
            return view('Admin.Role.roleAuth',['role'=>$roles,'node'=>$nodes,'data'=>$data]);
        }else{
            return view('Admin.Role.roleAuth',['role'=>$roles,'node'=>$nodes,'data'=>[]]);
        }
    }
    //保存添加角色权限
    public function adminnsave(Request $request)
    {
        //拿到rid 和 nid
        $rid = $request->input('rid');
        $nids = $request->input('nid');
        // var_dump($rid,$nids); 
        //先删除之前的权限后添加
        DB::table('role_node')->where('rid','=',$rid)->delete();
        $data = [];
        //遍历
        foreach($nids as $nid){
            $data['rid'] = $rid;
            $data['nid'] = $nid;
            //插入数据
            DB::table('role_node')->insert($data);
        }
        return redirect('/adminrole')->with('success','添加权限成功!');
    }
}
