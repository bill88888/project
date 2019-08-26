<?php
namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use PDO;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //搜索
    public function fenso(Request $request)
    {
        $word=$request->input('word');
        // var_dump($word);
        $shops=DB::table('shops_word')->where('word','=',$word)->get();
        //遍历
        //数据库的连接
        $pdo=new PDO("mysql:host=localhost;dbname=project","root","");
        $pdo->exec("set names utf8");

        $arr=[];
        foreach($shops as $key=>$value){
            $arr[$key]=$value->shops_id;
        }
        // var_dump($arr);die;
        if(!empty($arr)){
            // var_dump($arr);
            $id=implode(",",$arr);
            $data=$pdo->query("select * from shops where id in({$id})");
            //获取结果集
            $shop=$data->fetchAll(PDO::FETCH_ASSOC);
        }elseif(empty($word)){
            return redirect('/index');
        }else{
            $id=implode(",",$arr);
            $shop=DB::table('shops')->whereIn('id',[$id])->get();
            $blog=DB::table('blogs')->get();

            return view('Home.Index.so',['blog'=>$blog,'shop'=>$shop]);
        }
        // var_dump($shop);
        $blog=DB::table('blogs')->get();
        if(count($shop)){
            return view('Home.Index.so',['blog'=>$blog,'shop'=>$shop]);
        }else{
            return redirect('/index');
        }
    }
    //个人中心
    public function selfcenter()
    {
        $user_id=session('user_id');
        // var_dump($goods);die;
        //查询订单信息&商品信息
        // $order=DB::table('orders')->where('user_id','=',$user_id)->get();
        $order=DB::table('orders')->where('user_id','=',$user_id)->get();
        foreach($order as $v){ 
            $data=DB::table('order_info')->where('order_id','=',$v->id)->get();
            // $v->info=$data;
            foreach($data as $k=>$value){
                $v->info[$k]=$value;
               
                foreach($v->info as $key=>$row){
                    $shops=DB::table('shops')->where('id','=',$row->goods_id)->first();
                    $v->info[$key]->descr=$shops->descr;
                    $v->info[$key]->price=$shops->price;
                }
            }
        }
        // dd($data);   
        // dd($order);die;
        $data=DB::table('address')->where('user_id','=',$user_id)->get();
        return view('Home.Index.selfcenter',['order'=>$order,'data'=>$data]);
    }
    //立即支付
    public function pay($num)
    {
                //调用支付宝接口
                $out_trade_no=$num; //订单号
                $subject='zhifu'; //主题
                $total_fee='0.01'; //金额
                $body='myshop pay'; //描述
                pays($out_trade_no,$subject,$total_fee,$body);
    }
    //确认收货
    public function sgoods($id)
    {
  
        $data['status']=3;
        if(DB::table('orders')->where('id','=',$id)->update($data)){
            return back();
        }
    }
    //提醒发货
    public function fgoods($id)
    {
        $data['status']=1;
        if(DB::table('orders')->where('id','=',$id)->update($data)){
            return back();
        }
    }
    //无限分类递归遍历数组
    public static function getCatesByPid($pid)
    {
        //获取数据
        $cates = DB::table('cates')->where('pid','=',$pid)->get();

        $arr = [];
        foreach($cates as $k=>$v){
            //将子类的信息写在父类的suv下标中 注:子类pid 就等于 父类id
            $v->suv = self::getCatesByPid($v->id);
            $arr[] = $v;
        }

        return $arr;
    }

    public function index(Request $request)
    {
        //前台首页显示
        $res=self::getCatesByPid(0);
        // dd($res);
        //查询所有顶级分类
        $cates=DB::table('cates')->where('pid','=',0)->get();
        // //将所有顶级的id拿到存入数组
        foreach($cates as $cate){
            //查询所有一级分类
            $onecate=DB::table('cates')->where('path','=','0,'.$cate->id)->get();
            // dd($onecate);
            //遍历把获取到的当前的一级分类下商品存入数组
                foreach($onecate as $v){
                    $shops[]=DB::table('shops')->join('cates','cates.id','=','shops.cate_id')
                                               ->select(DB::raw('cates.id as cid,cates.name as cname,shops.id as sid,shops.descr,shops.price,shops.pic,shops.name'))
                                               ->where('shops.cate_id','=',$v->id)
                                               ->get();
                }

          
        }
        // $shop=DB::table('shops')->get();               
        $data=DB::table('luns')->get();
        $blog=DB::table('blogs')->get();
        return view('Home.Index.index',['res'=>$res,'shop'=>$shops,'data'=>$data,'blog'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //评价
    public function evaluate($id)
    {
        // echo $id;die;
        $res=DB::table('orders')->join('order_info','order_info.order_id','=','orders.id')->select(DB::raw('order_info.goods_id,order_info.name,order_info.pic,orders.createtime as time,order_info.num,orders.status,orders.id,order_info.status as ostatus,orders.user_id'))->where('orders.id','=',$id)->get();
        // var_dump($res);
        return view('Home.Index.evaluate',['res'=>$res]);
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
        $res['createtime']=date('Y-m-d H:i:s');
        $id=$request->input('order_id');
        $gid=$request->input('shops_id');
        // var_dump($id,$gid);die;
        $data['status']=0;
        // dd($res,$data);
        if(DB::table('evaluate')->insert($res)){
            DB::table('order_info')->where('order_id','=',$id)->where('goods_id','=',$gid)->update($data);
            return back();
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
        //商品详情
        // echo $id;
        $res=DB::table('shops')->where('id','=',$id)->first();
        //评论
        $data=DB::table('evaluate')->join('orders','orders.id','=','evaluate.order_id')
                                   ->join('users','users.id','=','evaluate.user_id')
                                   ->select(DB::raw('users.username as uname,evaluate.createtime as etime,evaluate.content,orders.createtime as otime,evaluate.shops_id'))
                                   ->get();
        // dd($res);
        return view('Home.Index.page',['res'=>$res,'data'=>$data]);
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
