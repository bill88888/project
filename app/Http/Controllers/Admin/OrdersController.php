<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $res=DB::table('orders')->get();
        $res=DB::table('orders')->join('address','orders.address_id','=','address.id')
                                ->join('users','users.id','=','orders.user_id')
                                ->select(DB::raw('orders.id,orders.order_num,address.phone,address.huo,address.xhuo,users.username as uname,orders.status'))
                                ->get();
                                    // dd($res);
        return view('Admin.Orders.orderindex',['res'=>$res]);
    }
    //订单详情
    public function orderinfo($id)
    {
        $res=DB::table('order_info')->where('order_id','=',$id)->get();
        // var_dump($res);
        return view('Admin.Orders.orderinfo',['res'=>$res]);
    }
    //更改状态
    public function status(Request $request)
    {
        $res=$request->input('sta');
        $id=$request->input('id');
        // echo $id;
        $data['status']=$res;
        DB::table('orders')->where('id','=',$id)->update($data);
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
        //
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
