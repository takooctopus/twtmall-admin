<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','campus','username','stunumber','phone','wechat','qq','imgurl','token','praise'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function hasManyGoods()
    {
        return $this->hasMany('App\Model\Goods','uid','id');
    }

    public function hasManyNeeds()
    {
        return $this->hasMany('App\Model\Needs','uid','id');
    }

    public function hasManyCollection()
    {
        return $this->hasMany('App\Model\Collection','uid','id');
    }

    public function hasManyReply()
    {
        return $this->hasMany('App\Model\Reply','uid','id');
    }
}
