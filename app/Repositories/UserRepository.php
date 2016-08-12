<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/20
 * Time: 21:02
 */
namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Model\Goods;
use App\Model\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getUsers()
    {
        return User::all();
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail();
    }

    /**
     * @param $pagesize
     * @return mixed
     */
    public function getUsersByPageSize($pagesize)
    {
        return User::paginate($pagesize)->setPath('/user');
    }

    /**
     * @return int
     */
    public function getUsersCount()
    {
        return User::all()->count();
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserGoodssByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','desc')->get();
    }

    /**
     * @param $username
     * @param $pagesize
     * @return mixed
     */
    public function getUserGoodssByUsernameAndPageSize($username, $pagesize)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','desc')->paginate($pagesize);
    }

    public function getUserCollectionsByUsernameAndPageSize($username, $pagesize)
    {
        $collections = User::where('username','=',$username)->firstOrFail()->hasManyCollection()->get();
        $count = $collections->count();
        $goodss = array();
        foreach ($collections as $key => $collection)
        {
            $goods = $collection->hasOneGoods()->first();
            $goodss = array_add($goodss, $key, $goods);
        }
        $paged=new LengthAwarePaginator($goodss,$count,$pagesize);
        $paged=$paged->setPath("/user/$username/collection");
        return $paged;
    }

    /**
     * @param $goodss
     */
    public function getUserGoodsImgsByGoodss($goodss)
    {
        $imgs = array();
        foreach ($goodss as $goods)
        {
            
        }
    }

    public function getUserNeedssByUsernameAndPageSize($username, $pagesize)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyNeeds()->orderBy('time','desc')->paginate($pagesize);
    }


    public function getUserNeedsImgsByNeedss($needss)
    {
        $imgs = array();
        foreach ($needss as $goods)
        {

        }
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserGoodsCountByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->get()->count();
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserLatestGoodsByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyGoods()->orderBy('time','dasc')->firstOrFail();
    }

    public function getUserNeedsCountByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyNeeds()->get()->count();
    }

    public function getUserLatestNeedsByUsername($username)
    {
        return User::where('username','=',$username)->firstOrFail()->hasManyNeeds()->orderBy('time','dasc')->firstOrFail();
    }


    /**
     * @param $searchInfo
     * @param $pageSize
     * @return mixed
     */
    public function getUsersBySearchInfoAndPageSize($searchInfo , $pageSize)
    {
        return User::where('stunumber', 'like', '%'.$searchInfo.'%')
            ->orWhere('username', 'like', '%'.$searchInfo.'%')
            ->orWhere('email', 'like', '%'.$searchInfo.'%')
            ->paginate($pageSize)->setPath('/user');
    }

    public function getUsersCountBySearchInfo($searchInfo)
    {
        return User::where('stunumber', 'like', '%'.$searchInfo.'%')
            ->orWhere('username', 'like', '%'.$searchInfo.'%')
            ->orWhere('email', 'like', '%'.$searchInfo.'%')
            ->get()->count();
    }

    public function getTopUser()
    {
        return User::orderBy('praise','DSEC')->first();
    }

    public function getTopUserGoodssCount()
    {
        return User::orderBy('praise','DSEC')->first()->hasManyGoods()->get()->count();
    }


}