<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category_s extends Model
{
    protected $table = 'category_ss';

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

    public function Category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
