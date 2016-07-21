<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    protected $table = 'trades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','seller_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
