<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GoodsRepository;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * @var GoodsRepository
     */
    private $goodsRepository;
    private $pagesize = 9;

    public function __construct(GoodsRepository $goodsRepository)
    {
        $this->goodsRepository = $goodsRepository;
    }

    public function index()
    {
        $goodss = $this->goodsRepository->getGoodssByPageSize($this->pagesize);
        $goodssCount = $this->goodsRepository->getGoodssCount();
        return view('admin.goods')->with([
            'goodss' => $goodss,
            'goodssCount' => $goodssCount,
            'style' => 'index',
        ]);
    }

    public function ajaxIndex(Request $request)
    {
        $data = $request->all();
        $searchInfo = $data['searchinfo'];
        $goodssByPageSize = $this->goodsRepository->getGoodssBySearchInfoAndPageSize($searchInfo, $this->pagesize);
        $goodssCount =$this->goodsRepository->getGoodssCountBySearchInfo($searchInfo);
        if ($goodssByPageSize->isEmpty())
        {
            $goodssByPageSize = $this->goodsRepository->getGoodssByPageSize($this->pagesize);
            $goodssCount = $this->goodsRepository->getGoodssCount();
        }


        $goodsfield=view('admin.goods.goodsfield')->with([
            'goodss' => $goodssByPageSize,
        ]);
        $goodsfield=$goodsfield->render();

        return response()->json(['goodssCount' => $goodssCount ,'goodsfield' => $goodsfield]);
    }

    public function detail($goods_id)
    {
        $goods = $this->goodsRepository->getGoodsByGoods_id($goods_id);
        $oldday = Carbon::createFromTimestamp(strtotime($goods->time));
        $today = Carbon::today();
        $diffInDays = $today->diffInDays($oldday);
        $progress = $diffInDays / 1.8 ;
        $goodsUser = $this->goodsRepository->getGoodsUserByGoods_id($goods_id);
        $goodsCategory = $this->goodsRepository->getGoodsCategoryByGoods_id($goods_id);
        $goodsCategory_s = $this->goodsRepository->getgoodsCategory_sByGoods_id($goods_id);
        $imgs = $this->goodsRepository->getGoodsImgsByGoods_id($goods_id);
        $imgbaseurl = config('img.imgbaseurl');
        $comments = $this->goodsRepository->getGoodsCommentsByGoods_id($goods_id);
        $replys = $this->goodsRepository->getGoodsCommentsReplysByGoods_id($goods_id);
        $replyUsers = $this->goodsRepository->getGoodsCommentsReplysUserByGoods_id($goods_id);
        return view('admin.goodsdetail')->with([
            'goods' => $goods,
            'goodsUser' => $goodsUser,
            'goodsCategory' => $goodsCategory,
            'goodsCategory_s' => $goodsCategory_s,
            'diffInDays' => $diffInDays,
            'progress' => $progress,
            'imgs' => $imgs,
            'imgbaseurl' => $imgbaseurl,
            'comments' => $comments,
            'replys' => $replys,
            'replyUsers' => $replyUsers,
        ]);
    }

    /**
     * @param $goods_id
     * 下架
     */
    public function remove ($goods_id)
    {
        $goods = $this->goodsRepository->getGoodsByGoods_id($goods_id);

        $goods->save();
    }

    /**
     * @param $goods_id
     * 上架
     */
    public function hit($goods_id)
    {
        $goods = $this->goodsRepository->getGoodsByGoods_id($goods_id);

        $goods->save();
    }

    public function category($category_id , $category_s_id)
    {
        //$goodssByPageSize = $this->goodsRepository->getGoodssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,'y', $this->pagesize);
        //dd($goodssByPageSize);
        $goodss = $this->goodsRepository->getGoodssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$this->pagesize);
        $goodssCount = $this->goodsRepository->getGoodssCountByCategoryIdCategory_s($category_id,$category_s_id);
        return view('admin.goods')->with([
            'goodss' => $goodss,
            'goodssCount' => $goodssCount,
            'category_id' => $category_id,
            'category_s_id' => $category_s_id,
            'style' => 'category',
        ]);
    }

    public function ajaxCategory(Request $request)
    {
        $data = $request->all();
        $searchInfo = $data['searchinfo'];
        $category_id = $data['category_id'];
        $category_s_id = $data['category_s_id'];
        $goodssByPageSize = $this->goodsRepository->getGoodssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,$searchInfo, $this->pagesize);
        $goodssCount =$this->goodsRepository->getGoodssCountByCategoryCategory_sSearchInfo($category_id,$category_s_id,$searchInfo);
        if ($goodssByPageSize->isEmpty())
        {
            $goodss = $this->goodsRepository->getGoodssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$this->pagesize);
            $goodssCount = $this->goodsRepository->getGoodssCountByCategoryIdCategory_s($category_id,$category_s_id);
        }
        $goodsfield=view('admin.goods.goodsfield')->with([
            'goodss' => $goodssByPageSize,
        ]);
        $goodsfield=$goodsfield->render();

        return response()->json(['goodssCount' => $goodssCount ,'goodsfield' => $goodsfield]);
    }
}
