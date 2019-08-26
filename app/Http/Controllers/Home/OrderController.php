<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //跳转结算
    public function account(Request $request)
    {
        //查出当前要结算的商品的session
        $arr=$_GET['arr'];
        //供存入勾选id 数量
        $data=[];
        //把勾选的商品存入session
        foreach($arr as $k=>$v){
            $cart=session('cart');
               foreach($cart as $key=>$value){
                     if($value['id']==$v){  
                        //获取勾选数量和id
                        $data[$key]['num']=$cart[$key]['num'];
                        $data[$key]['id']=$v;
                     }
                }    
        }
        // $request->session()->push('goods',$data);
        session(['goods'=>$data]);
        echo json_encode($data);  
    }
    //结算页
    public function index()
    {   
        $goods=session('goods');
        // var_dump($goods);
        $arr=[];
        //总金额
        $tot=0;
        //遍历
        foreach($goods as $k=>$v){
            //获取商品数据
            $shop=DB::table('shops')->where('id','=',$v['id'])->first();
            $res['num']=$v['num'];
            $res['pic']=$shop->pic;
            $res['name']=$shop->name;
            $res['price']=$shop->price;
            $tot+=$v['num']*$shop->price;
            // var_dump($shop,$tot);
            $arr[]=$res;
        }
        // var_dump($arr);
        //查询当前用户所有地址信息
        $address=AddressController::selfaddress(session('user_id'));
        //查询第一条地址信息作为默认
        $oneaddress=DB::table('address')->where('user_id','=',session('user_id'))->first();
        // var_dump($oneaddress);
        return view('Home.Order.orderIndex',['arr'=>$arr,'tot'=>$tot,'address'=>$address,'oneaddress'=>$oneaddress]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //订单
        $res=$request->except('_token');
        // dd($res);
        $res['order_num']=time()+mt_rand(1,10000);//订单编号
        $res['user_id']=session('user_id');//用户id
        $res['createtime']=date('Y-m-d H:i:s');
        $res['status']=0;//状态
        
        // var_dump($res);die;
        //订单数据入库
        $order_id=DB::table('orders')->insertGetId($res);
        if($order_id){
            //订单详情
            $data=[];
            //详情数据入库
            //获取购买商品session
            $tot=0;//总计
            $goods=session('goods');
            // dd($goods);
            foreach($goods as $k=>$v){
                //查询出商品数据
                $shop=DB::table('shops')->where('id','=',$v['id'])->first();
                //订单详情
                $data['order_id']=$order_id;
                $data['goods_id']=$v['id'];
                $data['num']=$v['num'];
                $data['name']=$shop->name;
                $data['pic']=$shop->pic;
                $data['createtime']=date('Y-m-d H:i:s');
                $tot+=$data['num']*$shop->price;
                $info[]=$data; 
            }
            // var_dump($info);
            //订单详情入库
            if(DB::table('order_info')->insert($info)){
                //将订单id 付款金额 选择地址id 存入session
                session(['order_id'=>$order_id]);
                session(['address_id'=>$res['address_id']]);
                session(['tot'=>$tot]);
                //清除指定购物车session
                  $cart=session('cart');
                  $goods=session('goods');
                  // dd($goods);
                  // dd($cart);
                  foreach($goods as $k=>$v){
                        foreach($cart as $key=>$value){
                            if($v['id']==$value['id']){
                                unset($cart[$key]);
                            }
                        }
                  }
                  session(['cart'=>$cart]);
                  // dd($cart);
                //调用支付宝接口
                $out_trade_no=$res['order_num']; //订单号
                $subject='zhifu'; //主题
                $total_fee='0.01'; //金额
                $body='myshop pay'; //描述
                pays($out_trade_no,$subject,$total_fee,$body);


            }
        }
    }
    //支付完成后跳转
    public function payok()
    {
        // echo '支付完毕!';
        //获取订单session
        $order_id=session('order_id');
        $address_id=session('address_id');
        $tot=session('tot');

        //修改订单状态
        $res['status']=2;
        DB::table('orders')->where('id','=',$order_id)->update($res);
        //获取选择的地址信息
        $address=DB::table('address')->where('id','=',$address_id)->first();
        //跳转通知界面
        return view('Home.Order.orderSuccess',['address'=>$address,'tot'=>$tot]);
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
