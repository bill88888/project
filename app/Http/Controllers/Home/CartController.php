<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $cart=session('cart');
        // var_dump($cart);
        //创建空数组放商品信息
        $shop=[];
        $shops=[];
        if(count($cart)){
            foreach($cart as $v){
                //通过session中存储的商品id拿到商品的信息
                $info=DB::table('shops')->where('id','=',$v['id'])->first();
                // dd($info);
                $shop['id']=$v['id'];
                $shop['name']=$info->name;
                $shop['descr']=$info->descr;//商品信息
                $shop['price']=$info->price;//商品单价
                $shop['num']=$v['num'];//购买数量
                $shop['pic']=$info->pic;//商品图片
                $shops[]=$shop;
            }
        }
        
        // dd($shops);
        return view('Home.Cart.cartIndex',['shop'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //购物车去重
    public function checkExists($id)
    {
        //获取购物车数据
        $cart=session('cart');
        //判断购物车是否有数据
        if(empty($cart)) return false;
        //遍历 判断购物车是否由当前购买的商品
        foreach($cart as $k=>$v){
            if($v['id']==$id){
                return true;
            }
        }

    }
    public function store(Request $request)
    {   
        $res=$request->except('_token');
        //判断有没有当前的商品
        if(!$this->checkExists($res['id'])){
            //将当前商品的总量与id逐条存入session
            $request->session()->push('cart',$res);
        }
        
        // $info=session('cart');
        // var_dump($info);
        return redirect('/homecart');
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
    //删除全部购物车商品
    public function alldel(Request $request)
    {
        //清除session
        $request->session()->pull('cart');
        $request->session()->pull('goods');
        return redirect('/homecart');
    }
    //单个删除 ajax
    public function del(Request $request)
    {
        //拿到商品id
        $id=$request->input('id');
        //查询购物车session数据
        $cart=session('cart');
        foreach($cart as $k=>$v){
            if($v['id']==$id){
                //删除当前商品数据
                unset($cart[$k]);
            }
        }
 
        //重新赋值session
        session(['cart'=>$cart]);

        if(count(session('cart'))){
            echo 1;
        }else{
            echo 2;
        }
        
    }
    //减1
    public function subtract(Request $request)
    {
        $id=$request->input('id');
        $shop=DB::table('shops')->where('id','=',$id)->first();
        //获取session数据
        $cart=session('cart');
        $res=[];
        //遍历
        foreach($cart as $k=>$v){
            if($v['id']==$id){
                $cart[$k]['num']-=1;
                //判断不能小于1
                if($cart[$k]['num']<=1){
                    $cart[$k]['num']=1;
                }
                //给session 重新赋值
                session(['cart'=>$cart]);
                // echo $cart[$k]['num'];
                $res['num']=$cart[$k]['num'];
                $res['sum']=$cart[$k]['num']*$shop->price;
                echo json_encode($res);
            }
        }
    }
    //加1
    public function add(Request $request)
    {
        $id=$request->input('id');
        $shop=DB::table('shops')->where('id','=',$id)->first();
        //获取session数据
        $cart=session('cart');
        $res=[];
        //遍历
        foreach($cart as $k=>$v){
            if($v['id']==$id){
                $cart[$k]['num']+=1;
                //判断不能小于1
                if($cart[$k]['num']>=$shop->num){
                    $cart[$k]['num']=$shop->num;
                }
                //给session 重新赋值
                session(['cart'=>$cart]);
                // echo $cart[$k]['num'];
                $res['num']=$cart[$k]['num'];
                $res['sum']=$cart[$k]['num']*$shop->price;
                echo json_encode($res);
            }
        }
    }
    //计算总数总金额
    public function carttot(Request $request)
    {
        // $arr=$request->input('arr');
        // $arr=$_GET['arr'];
        if(isset($_GET['arr'])){
            $nums=0; //总数
            $sum=0; //总金额
            //遍历选中数据id
            foreach($_GET['arr'] as $v){
                //获取购物车的session数据
                $cart=session('cart');
                foreach($cart as $key=>$value){
                    if($value['id']==$v){
                        //获取总数
                        $num=$value['num'];
                        //查询商品数据
                        $info=DB::table('shops')->where('id','=',$v)->first();
                        //拿出当前商品的单价
                        $price=$info->price;
                        //当前商品的金额
                        $tot=$num*$price;
                        //遍历叠加总数 总金额
                        $nums+=$num;
                        $sum+=$tot;
                    }
                }
            }
            $data['sum']=$sum;
            $data['nums']=$nums;
            echo json_encode($data);
        }else{
            $data['sum']=0;
            $data['nums']=0.00;
            echo json_encode($data);
            
        }
        
    }
}
