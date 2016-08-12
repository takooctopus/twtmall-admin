<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','content','goods_id','status','twtname','category_s_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function belongsToGoods()
    {
        return $this->belongsTo('App\Model\Goods','g_id','id');
    }

    public function hasManyReply()
    {
        return $this->hasMany('App\Model\Reply','comment_id','id');
    }
}
