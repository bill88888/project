<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Config;
use App\Services\OSS;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Redis;
use Markdown;
class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //存入redis id存入list表 所有数据存入
        $hash='Hash:shop';
        $list='List:shop';
        //建一个空数组
        $shops=[];
        if(Redis::exists($list)){
            $list=Redis::lrange($list,0,-1);
            foreach($list as $k=>$v){
                $shops[]=Redis::hgetall($hash.$v);
            }
        }else{
            //在数据库查看商品
            $info=DB::table('shops')->join('cates','cates.id','=','shops.cate_id')->select(DB::raw('cates.name as cname,shops.name as sname,shops.id as sid,cates.id as cid,shops.pic,shops.descr,shops.num,shops.price'))->get();
            // dd($info);
            foreach($info as $k=>$v){
                //将查询出来的的对象转为数组
                settype($v,'array');
                //将id存到list表
                Redis::rpush($list,$v['sid']);
                //将所有数据存入
                Redis::hmset($hash.$v['sid'],$v);
            }

        }
        
        // var_dump($shops);die;
        return view('Admin.Shops.shopIndex',['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加商品
        //分类
        $cates=CatesController::getCates();
        Markdown::convertToHtml('descr');
        return view('Admin.Shops.shopCreate',['cates'=>$cates]);
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
        $res['descr']=Markdown::convertToHtml($request->input('descr'));
        if($request->hasFile('pic')){
            $pic = $request->file('pic');
            //获取后缀名
            $ext=$pic->getClientOriginalExtension();
            // dd($ext);
            //随机名
            $name=time().mt_rand(1,9999);
            
        }
        //移动文件到阿里云
        $dir='./uploads/'.date('Y-m-d').'/';
            if(!is_dir($dir)){
                mkdir($dir,0777);
            }
        $newfile=date('Y-m-d').'/'.$name.'.'.$ext;
        $filepath=$pic->getRealPath();
        OSS::upload($newfile,$filepath);
        //图片剪切
        $img=new ImageManager();
        $img->make(env('ALIURL').$newfile)
            ->resize(100,100)
            ->save(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext);
        $res['pic']=trim(Config::get('app.app_upload').'/'.'b_'.$name.'.'.$ext,'.');

        //获取插入数据的id
        $id=DB::table('shops')->insertGetId($res);

        //存入redis
        $data=DB::table('shops')->join('cates',function($join)use($id){
            $join->on('cates.id','=','shops.cate_id')
                 ->where('shops.id','=',$id);
        })->select(DB::raw('cates.name as cname,shops.name as sname,shops.id as sid,cates.id as cid,shops.pic,shops.descr,shops.num,shops.price'))->first();
        //将对象转为数组
        settype($data,'array');
        // var_dump($data);die;
        if($id){
            //将新加数据存入redis
            
            $hash='Hash:shop';
            $list='List:shop';
            Redis::rpush($list,$id);
            Redis::hmset($hash.$id,$data);
            return redirect('/adminshops')->with('success','添加商品成功');
        }else{
            return back()->with('error','添加商品失败');
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
        $res=DB::table('shops')->join('cates','cates.id','=','shops.cate_id')->select(DB::raw('shops.id,shops.price,shops.num,shops.pic,shops.descr,shops.name as sname,shops.cate_id,cates.name as cname'))->where('shops.id','=',$id)->first();
        $data=CatesController::getCates();
        return view('Admin.Shops.shopEdit',['res'=>$res,'data'=>$data]);
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

            if(DB::table('shops')->where('id','=',$id)->update($res)){
                //存入redis
                $data=DB::table('shops')->join('cates','cates.id','=','shops.cate_id')->select(DB::raw('cates.name as cname,shops.name as sname,shops.id as sid,cates.id as cid,shops.pic,shops.descr,shops.num,shops.price'))->where('shops.id','=',$id)->first();
                //将对象转为数组
                settype($data,'array');
                //哈希 储存列表数据
                $hash='Hash:shop';
                $res['id']=$id;
                Redis::hmset($hash.$id,$data);
                return redirect('/adminshops')->with('success','修改成功!');
            }
        }else{
            $res=$request->except('_token','pic','_method');
            if(DB::table('shops')->where('id','=',$id)->update($res)){
               //存入redis
                $data=DB::table('shops')->join('cates','cates.id','=','shops.cate_id')->select(DB::raw('cates.name as cname,shops.name as sname,shops.id as sid,cates.id as cid,shops.pic,shops.descr,shops.num,shops.price'))->where('shops.id','=',$id)->first();
                //将对象转为数组
                settype($data,'array');
                //哈希 储存列表数据
                $hash='Hash:shop';
                $res['id']=$id;
                Redis::hmset($hash.$id,$data);
                return redirect('/adminshops')->with('success','修改成功!');
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
        // echo $id;
        if(DB::table('shops')->where('id','=',$id)->delete()){
            //删除redis中数据
            $hash='Hash:shop';
            Redis::del($hash.$id);
            $list='List:shop';
            Redis::lrem($list,1,$id);
            return redirect('/adminshops')->with('success','删除商品成功!');
        }else{
            return back()->with('error','删除商品失败!');
        }
    }
}
