<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goodss';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','category_s_id','name','detail','campus','location','bargain','status','exchange','phone','wechat','qq','img_id','view','show','want'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function belongsToUser()
    {
        return $this->belongsTo('App\Model\User','id','uid');
    }
}
