<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category_s extends Model
{
    public $timestamps = false;

    protected $table = 'category_s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','category_id','b_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function belongsToCategory()
    {
        return $this->belongsTo('App\Model\Category','b_id','category_id');
    }

    public function hasManyGoods()
    {
        return $this->hasMany('App\Model\Goods','category_s_id','category_id');
    }
}
