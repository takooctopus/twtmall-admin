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
        return $this->belongsTo('App\Model\User','uid','id');
    }
    public function belongsToCategory()
    {
        return $this->belongsTo('App\Model\Category','category_id','category_id');
    }

    public function belongsToCategory_s()
    {
        return $this->belongsTo('App\Model\Category_s','category_s_id','category_id');
    }

}
