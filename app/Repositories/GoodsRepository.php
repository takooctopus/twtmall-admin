<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/21
 * Time: 19:12
 */

namespace App\Repositories;

use App\Model\Goods;

class GoodsRepository
{
    public function getGoodssByPageSize($pagesize)
    {
        return Goods::orderBy('time','desc')->paginate($pagesize);
    }
    public function getGoodssCount()
    {
        return Goods::all()->count();
    }
    public function getGoodsByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id);
    }
    public function getGoodsUserByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToUser()->first();
    }
    public function getGoodsCategoryByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToCategory()->first();
    }
    public function getgoodsCategory_sByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToCategory_s()->first();
    }
    public function getGoodssBySearchInfoAndPageSize($searchInfo , $pageSize)
    {
        return Goods::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->paginate($pageSize)->setPath('/goods');
    }

    public function getGoodssCountBySearchInfo($searchInfo)
    {
        return Goods::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->get()->count();
    }
    public function getGoodssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$pagesize)
    {
        if ($category_s_id == 1 ) {
            return Goods::where('category_id','=',$category_id)->orderBy('time','desc')->paginate($pagesize);
        }else {
            return Goods::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->orderBy('time','desc')->paginate($pagesize);
        }
    }
    public function getGoodssCountByCategoryIdCategory_s($category_id,$category_s_id)
    {
        if ($category_s_id == 1){
            return Goods::where('category_id','=',$category_id)->orderBy('time','desc')->count();
        }else {
            return  Goods::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->count();
        }
    }
    public function getGoodssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,$searchInfo, $pagesize)
    {
        if ($category_s_id == 1)
        {
            return Goods::where('category_id','=',$category_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->paginate($pagesize);
        }else{
            return Goods::where('category_id','=',$category_id)
                ->where('category_s_id','=',$category_s_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->paginate($pagesize);
        }
    }

    public function getGoodssCountByCategoryCategory_sSearchInfo($category_id,$category_s_id,$searchInfo)
    {
        if ($category_s_id == 1)
        {
            return Goods::where('category_id','=',$category_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->count();
        }else{
            return Goods::where('category_id','=',$category_id)
                ->where('category_s_id','=',$category_s_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->count();
        }
    }

    public function getRecentGoodssCount()
    {
        $end_time = date('Y-m-d H:i:s',strtotime('-1 month'));
        $recentGoodssCount = Goods::where('time','>',$end_time)->get()->count();
        return $recentGoodssCount;
    }

    public function getLatestGoods()
    {
        return Goods::orderBy('time','DESC')->first();
    }

    public function getLatestGoodsUser()
    {
        return Goods::orderBy('time','DESC')->first()->belongsToUser()->first();
    }
}