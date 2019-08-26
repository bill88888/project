<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //关联表
    protected $table = 'users';
    //是否自动维护时间戳
    public $timestamps = true;
    //可被批量赋值的属性
    protected $fillable = ['username','password','email','phone','token'];

    //修改器
    public function getStatusAttribute($value){
    	$status=[1=>'禁用',0=>'未激活',2=>'激活'];
    	return $status[$value];
    }
}
