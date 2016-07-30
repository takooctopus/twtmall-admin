<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','class','category_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function hasManyCategory_s()
    {
        return $this->hasMany('App\Model\Category_s','b_id','category_id');
    }

    public function hasManyGoods()
    {
        return $this->hasMany('App\Model\Goods','category_id','category_id');
    }
}
