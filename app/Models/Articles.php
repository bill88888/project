<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //连表
    protected $table = 'articles';

    //自动更新时间戳
    public $timestamps = false;

    //可被批量赋值的属性
    protected $fillable = ['title','descr','author','pic'];
    
}
