<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\NeedsRepository;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NeedsController extends Controller
{
    /**
     * @var GoodsRepository
     */
    private $needsRepository;
    private $pagesize = 9;

    public function __construct(NeedsRepository $needsRepository)
    {
        $this->needsRepository = $needsRepository;
    }

    public function index()
    {
        $needss = $this->needsRepository->getNeedssByPageSize($this->pagesize);
        $needssCount = $this->needsRepository->getNeedssCount();
        return view('admin.needs')->with([
            'needss' => $needss,
            'needssCount' => $needssCount,
            'style' => 'index',
        ]);
    }

    public function ajaxIndex(Request $request)
    {
        $data = $request->all();
        $searchInfo = $data['searchinfo'];
        $needssByPageSize = $this->needsRepository->getNeedssBySearchInfoAndPageSize($searchInfo, $this->pagesize);
        $needssCount =$this->needsRepository->getNeedssCountBySearchInfo($searchInfo);
        if ($needssByPageSize->isEmpty())
        {
            $needssByPageSize = $this->needsRepository->getNeedssByPageSize($this->pagesize);
            $needssCount = $this->needsRepository->getNeedssCount();
        }


        $needsfield=view('admin.needs.needsfield')->with([
            'needss' => $needssByPageSize,
        ]);
        $needsfield=$needsfield->render();

        return response()->json(['needssCount' => $needssCount ,'needsfield' => $needsfield]);
    }

    public function detail($needs_id)
    {
        $needs = $this->needsRepository->getNeedsByNeeds_id($needs_id);
        $oldday = Carbon::createFromTimestamp(strtotime($needs->time));
        $today = Carbon::today();
        $diffInDays = $today->diffInDays($oldday);
        $progress = $diffInDays / 1.8 ;
        $needsUser = $this->needsRepository->getNeedsUserByNeeds_id($needs_id);
        $needsCategory = $this->needsRepository->getNeedsCategoryByNeeds_id($needs_id);
        $needsCategory_s = $this->needsRepository->getNeedsCategory_sByNeeds_id($needs_id);
        return view('admin.needsdetail')->with([
            'needs' => $needs,
            'needsUser' => $needsUser,
            'needsCategory' => $needsCategory,
            'needsCategory_s' => $needsCategory_s,
            'diffInDays' => $diffInDays,
            'progress' => $progress,
        ]);
    }

    /**
     * @param $goods_id
     * 下架
     */
    public function remove ($needs_id)
    {
        $needs = $this->needsRepository->getNeedsByGoods_id($needs_id);

        $needs->save();
    }

    /**
     * @param $goods_id
     * 上架
     */
    public function hit($needs_id)
    {
        $needs = $this->needsRepository->getNeedsByGoods_id($needs_id);

        $needs->save();
    }

    public function category($category_id , $category_s_id)
    {
        //$goodssByPageSize = $this->goodsRepository->getGoodssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,'y', $this->pagesize);
        //dd($goodssByPageSize);
        $needss = $this->needsRepository->getNeedssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$this->pagesize);
        $needssCount = $this->needsRepository->getNeedssCountByCategoryIdCategory_s($category_id,$category_s_id);
        return view('admin.needs')->with([
            'needss' => $needss,
            'needssCount' => $needssCount,
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
        $needssByPageSize = $this->needsRepository->getNeedssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,$searchInfo, $this->pagesize);
        $needssCount =$this->needsRepository->getNeedssCountByCategoryCategory_sSearchInfo($category_id,$category_s_id,$searchInfo);
        if ($needssByPageSize->isEmpty())
        {
            $needssByPageSize = $this->needsRepository->getNeedssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$this->pagesize);
            $needssCount = $this->needsRepository->getNeedssCountByCategoryIdCategory_s($category_id,$category_s_id);
        }
        $needsfield=view('admin.needs.needsfield')->with([
            'needss' => $needssByPageSize,
        ]);
        $needsfield=$needsfield->render();

        return response()->json(['needssCount' => $needssCount ,'needsfield' => $needsfield]);
    }
}
