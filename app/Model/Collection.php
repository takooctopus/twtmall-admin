<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $table = 'collection';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','goods_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function belongsToUser()
    {
        return $this->belongsTo('App\Model\User','uid','id');
    }

    public function hasOneGoods()
    {
        return $this->hasOne('App\Model\Goods','id','g_id');
    }
}
