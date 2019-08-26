<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //评论
        $data=DB::table('evaluate')->join('orders','orders.id','=','evaluate.order_id')
                                   ->join('users','users.id','=','evaluate.user_id')
                                   ->join('shops','shops.id','=','evaluate.shops_id')
                                   ->select(DB::raw('shops.name as sname,evaluate.id as eid,users.username as uname,evaluate.createtime as etime,evaluate.content,orders.createtime as otime,evaluate.shops_id'))
                                   ->get();
        return view('Admin.Eva.evaIndex',['data'=>$data]);
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
        // echo $id;
        if(DB::table('evaluate')->where('id','=',$id)->delete()){
            return redirect('/admineva')->with('success','删除成功!');
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
