<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment_id','user_id','goods_id','goods_id','content','status','twtname'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function belongsToComment()
    {
        return $this->belongsTo('App\Model\Comment','comment_id','id');
    }

    public function belongsToUser()
    {
        return $this->belongsTo('App\Model\User','uid','id');
    }
}
