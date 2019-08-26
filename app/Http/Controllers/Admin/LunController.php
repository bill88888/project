<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
//导入image组件
use Intervention\Image\ImageManager;
class LunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res=DB::table('luns')->get();
        return view('Admin.Lun.lunIndex',['res'=>$res]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Lun.lunCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res=$request->except('_token');
        // dd($res);
        if($request->hasFile('pic')){
            $file = $request->file('pic');
            // var_dump($file);
            //获取后缀
            $ext=$file->getClientOriginalExtension();

            //随机名
            $name=time().mt_rand(1,9999);
            //移动文件
            // $file->move('./uploads/'.date("Y-m-d"),$name.'.'.$ext);
            $file->move(Config::get('app.app_upload'),$name.'.'.$ext);
        }
        //裁剪图片
        $img=new ImageManager();
        $img->make(Config::get('app.app_upload').'/'.$name.'.'.$ext)
            ->resize(100,100)
            ->save(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext);
        $res['pic']=trim(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext,'.');
        if(DB::table('luns')->insert($res)){
            return redirect('/adminlun')->with('success','添加成功!');
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
        $res=DB::table('luns')->where('id','=',$id)->first();
        return view('Admin.Lun.lunEdit',['res'=>$res]);
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
        $hide=$request->input('hide');
        $name=$request->input('name');
        if($request->hasFile('pic')){
            $file = $request->file('pic');
            // var_dump($file);
            //获取后缀
            $ext=$file->getClientOriginalExtension();
            //随机名
            $name=time().mt_rand(1,9999);
            //移动文件
            $file->move(Config::get('app.app_upload'),$name.'.'.$ext);

            //裁剪图片
            $img=new ImageManager();
            $img->make(Config::get('app.app_upload').'/'.$name.'.'.$ext)
                ->resize(100,100)
                ->save(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext);   
            $res=$request->except('_token','_method','hide');
            $res['pic']=trim(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext,'.');
            if(DB::table('luns')->where('id','=',$id)->update($res)){
                return redirect('/adminlun')->with('success','修改成功!');
            }
        }elseif($name==$hide){
            return back()->with('error','您还没修改!');
        }else{
            $res=$request->except('_token','pic','_method','hide');
            if(DB::table('luns')->where('id','=',$id)->update($res)){
                return redirect('/adminlun')->with('success','修改成功!');
            }
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
        if(DB::table('luns')->where('id','=',$id)->delete()){
            return redirect('/adminlun')->with('success','删除成功!');;
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
