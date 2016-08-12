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

/**
 * Class CategoryRepository
 * @package App\Repositories
 */
class CategoryRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCategory_ss()
    {
        return Category_s::all();
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getCategoryNameByCategory_id($category_id)
    {
        $category =  Category::where('category_id','=',$category_id)->firstOrFail();
        return $category->name;
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getCategory_ssByCategory_id($category_id)
    {
        return Category::where('category_id','=',$category_id)->firstOrFail()->hasManyCategory_s()->get();
    }

    /**
     * @return array
     */
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

    public function getCategory_sCountByCategoryId($category_id)
    {
        return Category::where('category_id','=',$category_id)->firstOrFail()->hasManyCategory_s()->get()->count();
    }

    /**
     * @return array
     */
    public function getCategory_sCounts()
    {
        $categorys = Category::all();
        $category_sCount = array();
        foreach ($categorys as $category)
        {
            $category_sCount[$category['category_id']] = Category::where('category_id','=',$category['category_id'])->firstOrFail()->hasManyCategory_s()->get()->count();
        }
        return $category_sCount;
    }

    /**
     * @param $id
     * @param $category_id
     * @param $category_name
     * @return mixed
     */
    public function editCategoryInfo($id, $category_id, $category_name)
    {
        $category = Category::find($id);
        $category->category_id= $category_id;
        $category->name= $category_name;
        $category->save();
        return $category;
    }

    public function addCategoryByInfo($category_id,$category_name,$category_class)
    {
        $category = New Category;
        $category->category_id = $category_id;
        $category->name = $category_name;
        $category->class = $category_class;
        $category->save();
        return $category;
    }

    public function deleteCategoryById($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }

    public function editCategory_sInfo($id, $category_id, $category_name)
    {
        $category_s = Category_s::find($id);
        $category_s->category_id= $category_id;
        $category_s->name= $category_name;
        $category_s->save();
        return $category_s;
    }

    public function addCategory_sByInfo($category_id,$category_name,$b_id)
    {
        $category_s = New Category_s;
        $category_s->category_id = $category_id;
        $category_s->name = $category_name;
        $category_s->b_id = $b_id;
        $category_s->save();
        return $category_s;
    }

    public function deleteCategory_sById($id)
    {
        $category_s = Category_s::find($id);
        $category_s->delete();
        return $category_s;
    }

    public function getCategoryNameByCategory_sId($id)
    {
        return Category_s::find($id)->belongsToCategory()->first()->name;
    }
}