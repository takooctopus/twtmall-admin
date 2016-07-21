<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/20
 * Time: 21:02
 */
namespace App\Repositories;

use App\Model\User;

class UserRepository
{
    public function getUsers()
    {
        return User::all();
    }
    public function getUserByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail();
    }
    public function getUsersByPageSize($pagesize)
    {
        return User::paginate($pagesize)->setPath('/user');
    }
    public function getUserGoodssByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','dasc')->get();
    }
    public function getUserGoodssByUsernameAndPageSize($username,$pagesize)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','dasc')->paginate($pagesize);
    }


    public function getUserGoodsCountByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->get()->count();
    }
    public function getUserLatestGoodsByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','dasc')->firstOrFail();
    }

}