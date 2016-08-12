<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/21
 * Time: 19:12
 */

namespace App\Repositories;

use App\Model\Needs;

class NeedsRepository
{
    public function getNeedssByPageSize($pagesize)
    {
        return Needs::orderBy('time','desc')->paginate($pagesize);
    }
    public function getNeedssCount()
    {
        return Needs::all()->count();
    }
    public function getNeedsByNeeds_id($needs_id)
    {
        return Needs::findOrFail($needs_id);
    }
    public function getNeedsUserByNeeds_id($needs_id)
    {
        return Needs::findOrFail($needs_id)->belongsToUser()->first();
    }
    public function getNeedsCategoryByNeeds_id($needs_id)
    {
        return Needs::findOrFail($needs_id)->belongsToCategory()->first();
    }
    public function getNeedsCategory_sByNeeds_id($needs_id)
    {
        return Needs::findOrFail($needs_id)->belongsToCategory_s()->first();
    }
    public function getNeedssBySearchInfoAndPageSize($searchInfo , $pageSize)
    {
        return Needs::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->paginate($pageSize)->setPath('/needs');
    }

    public function getNeedssCountBySearchInfo($searchInfo)
    {
        return Needs::where('name', 'like', '%'.$searchInfo.'%')
            ->orWhere('detail', 'like', '%'.$searchInfo.'%')
            ->orWhere('location', 'like', '%'.$searchInfo.'%')
            ->get()->count();
    }
    public function getNeedssByCategoryIdCategory_sIdPageSize($category_id,$category_s_id,$pagesize)
    {
        if ($category_s_id == 1 ) {
            return Needs::where('category_id','=',$category_id)->orderBy('time','desc')->paginate($pagesize);
        }else {
            return Needs::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->orderBy('time','desc')->paginate($pagesize);
        }
    }
    public function getNeedssCountByCategoryIdCategory_s($category_id,$category_s_id)
    {
        if ($category_s_id == 1){
            return Needs::where('category_id','=',$category_id)->orderBy('time','desc')->count();
        }else {
            return  Needs::where('category_id','=',$category_id)->where('category_s_id','=',$category_s_id)->count();
        }
    }
    public function getNeedssByCategoryCategory_sSearchInfoAndPageSize($category_id,$category_s_id,$searchInfo, $pagesize)
    {
        if ($category_s_id == 1)
        {
            return Needs::where('category_id','=',$category_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->paginate($pagesize);
        }else{
            return Needs::where('category_id','=',$category_id)
                ->where('category_s_id','=',$category_s_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->paginate($pagesize);
        }
    }

    public function getNeedssCountByCategoryCategory_sSearchInfo($category_id,$category_s_id,$searchInfo)
    {
        if ($category_s_id == 1)
        {
            return Needs::where('category_id','=',$category_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->count();
        }else{
            return Needs::where('category_id','=',$category_id)
                ->where('category_s_id','=',$category_s_id)
                ->where(function ($query) use($searchInfo){
                    $query->where('name', 'like', '%'.$searchInfo.'%')
                        ->orWhere('detail', 'like', '%'.$searchInfo.'%')
                        ->orWhere('location', 'like', '%'.$searchInfo.'%');
                })
                ->count();
        }
    }

    public function getRecentNeedssCount()
    {
        $end_time = date('Y-m-d H:i:s',strtotime('-1 month'));
        $recentNeedssCount = Needs::where('time','>',$end_time)->get()->count();
        return $recentNeedssCount;
    }

    public function getLatestNeeds()
    {
        return Needs::orderBy('time','DESC')->first();
    }

    public function getLatestNeedsUser()
    {
        return Needs::orderBy('time','DESC')->first()->belongsToUser()->first();
    }
}