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
}