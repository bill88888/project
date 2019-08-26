<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use Config;
//导入image组件
use Intervention\Image\ImageManager;
//导入OSS类
use App\Services\OSS;
//导入Redis
use Illuminate\Support\Facades\Redis;
use Markdown;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //公告列表结合redis
        //建数组储存所有的列表数据
        $arts=[];
        //哈希 储存列表数据
        $hash='Hash:article';
        //列表 储存id
        $list='List:article';
        //判断redis有没有缓存数据
        if(Redis::exists($list)){
            $lists=Redis::lrange($list,0,-1);
            // var_dump($lists);
            //遍历列表id
            foreach($lists as $k=>$v){
                $arts[]=Redis::hgetall($hash.$v);
            }
        }else{
            //如果没有数据就在数据库里拿
            $res=Articles::get()->toArray();
            //遍历存入redis
            foreach($res as $k=>$v){
                //将id存入列表
                Redis::rpush($list,$v['id']);
                //将所有数据存入到哈希
                Redis::hmset($hash.$v['id'],$v);
            }
        }
        // $res = Articles::get();
        return view('Admin.Articles.artIndex',['res'=>$arts]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //公告添加
        return view('Admin.Articles.artCreate');
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
        $res = $request->except('_token');
        // var_dump($res);
        //图片上传
        if($request->hasFile('pic')){
            $file = $request->file('pic');
            // var_dump($file);
            //获取后缀
            $ext=$file->getClientOriginalExtension();

            //随机名
            $name=time().mt_rand(1,9999);
            //移动文件
            // $file->move('./uploads/'.date("Y-m-d"),$name.'.'.$ext);
            // $file->move(Config::get('app.app_upload'),$name.'.'.$ext);
            $dir='./uploads/'.date('Y-m-d').'/';
            if(!is_dir($dir)){
                mkdir($dir,0777);
            }
        }
        //上传到阿里云
        $newfile=$name.'.'.$ext;
        $filepath=$file->getRealPath();
        // echo $filepath;die;
        OSS::upload($newfile, $filepath);
        // echo env('ALIURL').$newfile.'';
        // die;

            //裁剪图片
            $img=new ImageManager();
            $img->make(env('ALIURL').$newfile)
                    ->resize(100,100)
                    ->save(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext);

            $res['pic']=trim(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext,'.');
            //执行添加时 存入redis
            $info=Articles::create($res);
            //获取id
            $id=$info->id;
            //执行插入
            if($id){
                //哈希 储存列表数据
                $hash='Hash:article';
                $res['id']=$id;
                Redis::hmset($hash.$id,$res);
                //列表 储存id
                $list='List:article';
                Redis::rpush($list,$id);
                return redirect('/adminarticles')->with('success','添加公告成功');
            }else{
                return back()->with('error','添加失败');
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
        // echo 1;
        $res=Articles::where('id','=',$id)->first();
        return view('Admin.Articles.artEdit',['res'=>$res]);
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
        //图片上传
        if($request->hasFile('pic')){
            $file = $request->file('pic');
            // var_dump($file);
            //获取后缀
            $ext=$file->getClientOriginalExtension();

            //随机名
            $name=time().mt_rand(1,9999);
            //移动文件
            // $file->move('./uploads/'.date("Y-m-d"),$name.'.'.$ext);
            // $file->move(Config::get('app.app_upload'),$name.'.'.$ext);
            $dir='./uploads/'.date('Y-m-d').'/';
            if(!is_dir($dir)){
                mkdir($dir,0777);
            }
            //上传到阿里云
            $newfile=$name.'.'.$ext;
            $filepath=$file->getRealPath();
            // echo $filepath;die;
            OSS::upload($newfile, $filepath);
            // echo env('ALIURL').$newfile.'';
            // die;

            //裁剪图片
            $img=new ImageManager();
            $img->make(env('ALIURL').$newfile)
                    ->resize(100,100)
                    ->save(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext);
            $res=$request->except('_token','_method');
            $res['pic']=trim(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext,'.');

            if(Articles::where('id','=',$id)->update($res)){
                //哈希 储存列表数据
                $hash='Hash:article';
                $res['id']=$id;
                Redis::hmset($hash.$id,$res);

                return redirect('/adminarticles')->with('success','修改成功!');
            }
        }else{
            $res=$request->except('_token','pic','_method');
            if(Articles::where('id','=',$id)->update($res)){
                $hash='Hash:article';
                $res['id']=$id;
                Redis::hmset($hash.$id,$res);
                return redirect('/adminarticles')->with('success','修改成功!');
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
     
    }

    //ajax批量删除
    public function del(Request $request){

        $del = $request->input('del');
        // var_dump($del);die;
        if($del==""){
            echo '请至少选中一条数据!';die;
        }
        //数据表删除
        foreach($del as $k=>$v){
            //$v就是id
            Articles::where('id','=',$v)->delete();
            //redis 删除
            //哈希 储存列表数据
            $hash='Hash:article';
            Redis::del($hash.$v);
            //列表 储存id
            $list='List:article';
            Redis::lrem($list,1,$v);
        }
        echo 1;

    }
}
