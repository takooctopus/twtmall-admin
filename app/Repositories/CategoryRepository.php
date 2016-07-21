<?php

/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 13:00
 */
namespace App\Repositories;

use App\Model\Category;
use App\Model\Category_s;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::all();
    }
    public function getAllCategory_ss()
    {
        return Category_s::all();
    }
    public function getCategoryNameByCategory_id($category_id)
    {
        $category =  Category::where('category_id','=',$category_id)->firstOrFail();
        return $category->name;
    }
    public function getCategory_ssByCategory_id($category_id)
    {
        return Category::where('category_id','=',$category_id)->firstOrFail()->hasManyCategory_s()->get();
    }
    public function getCategory_ss()
    {
        $count = Category::all()->count();
        $category_ss = array();
        for ($i =0; $i<$count; $i++)
        {
            $category_ss[$i] = Category::where('category_id','=',$i+1)->firstOrFail()->hasManyCategory_s()->get();
        }
        return $category_ss;
    }
    public function getCategory_sCounts()
    {
        $count = Category::all()->count();
        $category_sCount = array();
        for ($i =0; $i<$count; $i++)
        {
            $category_sCount[$i] = Category::where('category_id','=',$i+1)->firstOrFail()->hasManyCategory_s()->get()->count();
        }
        return $category_sCount;
    }
}