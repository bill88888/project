<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates()
    {
        //获取列表数据 连贯操作 防止sql注入
        // $cate = Cates::select("select *,concat(path,',',id) as paths from cates order by paths");
        $cate = DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();

        //遍历
        foreach($cate as $k=>$v){
            //根据逗号个数分开级别
            //转为数组
            $arr = explode(',',$v->path);
            //逗号个数
            $num = count($arr)-1;

            //字符串重复
            $v->name = str_repeat("--|", $num).$v->name;

        }
        return $cate;
    }

    public function index(Request $request)
    {
        //显示分类列表
        //添加搜索 分页
        $key = $request->input('key');
        // dd($key);
        $res = DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->where('name','like','%'.$key.'%')->paginate(5);

        foreach($res as $k=>$v){
            $arr = explode(',',$v->path);

            $num = count($arr)-1;
            $v->name = str_repeat("--|",$num).$v->name;
        }
        
        return view('Admin.Cates.catesIndex',['cates'=>$res,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加分类界面
        $res = self::getCates();
        // dd($res);
        return view('Admin.Cates.catesCreate',['cates'=>$res]);
        
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
        $res = $request->except(['_token']);
        if($res['pid']==0){
            //添加顶级分类
            $res['path']="0";
        }elseif($res['pid']>0){
            //获取父类
            $par = DB::table('cates')->where('id','=',$res['pid'])->first();
            // var_dump($par);
            // 拼接path字段
            $res['path'] = $par->path.",".$par->id;    
        }

        // var_dump($res);
        if(DB::table('cates')->insert($res)){
            return redirect('/admincates')->with('success','添加成功!');
        }else{
            return back()->with('error','添加失败!');
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
        //修改分类
        // echo $id;
        //查找当前分类信息
        $res = DB::table('cates')->where('id','=',$id)->first();
        // dd($res);
        //查找当前父类信息
        $info = DB::table('cates')->where('id','=',$res->pid)->first();
        // dd($info);
        return view('Admin.Cates.catesEdit',['cate'=>$res,'fcate'=>$info]);
        
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
        $res = $request->except(['_token','_method']);
        //添path字段
        // $info = DB::table('cates')->where('id','=',$res['pid'])->first();
        // $data = DB::table('cates')->where('id','=',$id)->first();
        // var_dump($info);
        // $res['path']=$info->path.','.$info->id;
        
        // var_dump($res);die;
        if(DB::table('cates')->where('id','=',$id)->update($res)){
            return redirect('/admincates')->with('success','修改分类成功!');
        }else{
            return back()->with('error','修改分类失败!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //判断删除的类别是否有子类
        $num = DB::table('cates')->where('pid','=',$id)->count();

        if($num>0){
            return redirect('/cates')->with('error','请先删除子类!');
        }
        //执行删除
        
        if(DB::table('cates')->where('id','=',$id)->delete()){
            return redirect('/admincates')->with('success','删除成功!');
        }else{
            return redirect('/admincates')->with('error','删除失败!');
        }
    }
}
