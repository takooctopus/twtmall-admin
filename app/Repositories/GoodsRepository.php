<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/21
 * Time: 19:12
 */

namespace App\Repositories;

use App\Model\Goods;
use App\Model\Img;

/**
 * Class GoodsRepository
 * @package App\Repositories
 */
class GoodsRepository
{
    /**
     * @param $pagesize
     * @return mixed
     */
    public function getGoodssByPageSize($pagesize)
    {
        return Goods::orderBy('time','desc')->paginate($pagesize);
    }

    /**
     * @return int
     */
    public function getGoodssCount()
    {
        return Goods::all()->count();
    }

    /**
     * @param $goods_id
     * @return mixed
     */
    public function getGoodsByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id);
    }

    /**
     * @param $goods_id
     * @return mixed
     */
    public function getGoodsUserByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToUser()->first();
    }

    /**
     * @param $goods_id
     * @return mixed
     */
    public function getGoodsCategoryByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToCategory()->first();
    }

    /**
     * @param $goods_id
     * @return mixed
     */
    public function getgoodsCategory_sByGoods_id($goods_id)
    {
        return Goods::findOrFail($goods_id)->belongsToCategory_s()->first();
    }

    /**
     * @param $searchInfo
     * @param $pageSize
     * @return mixed
     */
    public function getGoodssBySearchInfoAndPageSize($searchInfo , $pageSize)
    {
        return Goods::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->paginate($pageSize)->setPath('/goods');
    }

    /**
     * @param $searchInfo
     * @return mixed
     */
    public function getGoodssCountBySearchInfo($searchInfo)
    {
        return Goods::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->get()->count();
    }

    /**
     * @param $category_id
     * @param $category_s_id
     * @param $pagesize
     * @return mixed
     */
    public function getGoodssByCategoryIdCategory_sIdPageSize($category_id, $category_s_id, $pagesize)
    {
        if ($category_s_id == 1 ) {
            return Goods::where('category_id','=',$category_id)->orderBy('time','desc')->paginate($pagesize);
        }else {
            return Goods::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->orderBy('time','desc')->paginate($pagesize);
        }
    }

    /**
     * @param $category_id
     * @param $category_s_id
     * @return mixed
     */
    public function getGoodssCountByCategoryIdCategory_s($category_id, $category_s_id)
    {
        if ($category_s_id == 1){
            return Goods::where('category_id','=',$category_id)->orderBy('time','desc')->count();
        }else {
            return  Goods::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->count();
        }
    }

    /**
     * @param $category_id
     * @param $category_s_id
     * @param $searchInfo
     * @param $pagesize
     * @return mixed
     */
    public function getGoodssByCategoryCategory_sSearchInfoAndPageSize($category_id, $category_s_id, $searchInfo, $pagesize)
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

    /**
     * @param $category_id
     * @param $category_s_id
     * @param $searchInfo
     * @return mixed
     */
    public function getGoodssCountByCategoryCategory_sSearchInfo($category_id, $category_s_id, $searchInfo)
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

    /**
     * @return mixed
     */
    public function getRecentGoodssCount()
    {
        $end_time = date('Y-m-d H:i:s',strtotime('-1 month'));
        $recentGoodssCount = Goods::where('time','>',$end_time)->get()->count();
        return $recentGoodssCount;
    }

    /**
     * @return mixed
     */
    public function getLatestGoods()
    {
        return Goods::orderBy('time','DESC')->first();
    }

    /**
     * @return mixed
     */
    public function getLatestGoodsUser()
    {
        return Goods::orderBy('time','DESC')->first()->belongsToUser()->first();
    }


    public function getGoodsImgsByGoods_id($goods_id)
    {
        $goods = Goods::find($goods_id);
        $data = $goods->imgurl;
        $img_ids = explode(",",$data);
        $imgs = array();
        foreach ($img_ids as $key => $img_id)
        {
            $imgs[$key] = Img::find($img_id);
        }
        return $imgs;
    }

    public function getGoodsCommentsByGoods_id($goods_id)
    {
        $comments = Goods::find($goods_id)->hasManyComment()->get();
        return $comments;
    }

    public function getGoodsCommentsReplysByGoods_id($goods_id)
    {
        $comments = Goods::find($goods_id)->hasManyComment()->get();
        $replys = array();
        foreach ($comments as $key => $comment)
        {
            $reply[$key] = $comment->hasManyReply()->get();
        }
        return $reply;
    }
    public function getGoodsCommentsReplysUserByGoods_id($goods_id)
    {
        $comments = Goods::find($goods_id)->hasManyComment()->get();
        $replyUsers = array();
        foreach ($comments as $comment_key => $comment)
        {
            $replys = $comment->hasManyReply()->get();
            foreach ($replys as $reply_key => $reply)
            {
                $replyUsers[$comment_key][$reply_key] = $reply->belongsToUser()->first()->username;
            }
        }
        return $replyUsers;
    }
}