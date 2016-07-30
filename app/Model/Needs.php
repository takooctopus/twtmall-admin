<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Needs extends Model
{
    protected $table = 'needs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','category_id','category_s_id','name','detail','campus','location','price','exchange','phone','wechat','qq','show'];

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
