<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GoodsRepository;
use Illuminate\Http\Request;

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
        return view('admin.goods')->with([
            'goodss' => $goodss,
        ]);
    }

    public function detail($goods_id)
    {
        $goods = $this->goodsRepository->getGoodsByGoods_id($goods_id);
        $goodsUser = $this->goodsRepository->getGoodsUserByGoods_id($goods_id);
        $goodsCategory = $this->goodsRepository->getGoodsCategoryByGoods_id($goods_id);
        $goodsCategory_s = $this->goodsRepository->getgoodsCategory_sByGoods_id($goods_id);
        return view('admin.goodsdetail')->with([
            'goods' => $goods,
            'goodsUser' => $goodsUser,
            'goodsCategory' => $goodsCategory,
            'goodsCategory_s' => $goodsCategory_s,
        ]);
    }
}
