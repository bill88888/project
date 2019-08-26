<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //城市级联
    public function city(Request $request)
    {
        $upid=$request->input('upid');
        $address=DB::table('district')->where('upid','=',$upid)->get();
        echo json_encode($address);
    }
    public function index()
    {
        //
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
    //将地址填入数据表
    public function store(Request $request)
    {
        $res=$request->except('_token');
        $res['user_id']=session('user_id');
        // var_dump($res);
        if(DB::table('address')->insert($res)){
            return back();
        }
    }
    //查询当前用户所有地址信息
    public static function selfaddress($user_id)
    {
        $info=DB::table('address')->where('user_id','=',$user_id)->get();
        return $info;
    }
    //选择收货地址
    public function selectaddress(Request $request)
    {
        $id=$request->input('id');
        // echo $id;
        $info=DB::table('address')->where('id','=',$id)->first();
        echo json_encode($info);
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
