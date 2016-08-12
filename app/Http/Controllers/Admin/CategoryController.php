<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index($category_s_id = 1)
    {
        /*$a = Category::find(3);
        $a->name = "无奈的举动";
        $a->category_id = 3;
        $a->save();*/
        //dd($this->categoryRepository->getCategory_sCounts());
        return view('admin.category')->with([
            'category_s_id' => $category_s_id,
            'categoryName' => $this->categoryRepository->getCategoryNameByCategory_id($category_s_id),
            'categories' => $this->categoryRepository->getAllCategories(),
            'category_sCounts' => $this->categoryRepository->getCategory_sCounts(),
            'category_ss' => $this->categoryRepository->getCategory_ssByCategory_id($category_s_id),
        ]);
    }
    public function ajaxCategoryTable(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $this->categoryRepository->editCategoryInfo($id, $category_id, $category_name);
        return response()->json(['id' => $id, 'category_id'=>$category_id , 'category_name'=>$category_name]);
    }

    public function ajaxAddCategory(Request $request)
    {
        $data = $request->all();
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $category_class = $data['category_class'];
        $category = $this->categoryRepository->addCategoryByInfo($category_id, $category_name, $category_class);
        $category_sCount = $this->categoryRepository->getCategory_sCountByCategoryId($category_id);
        //$category = json_encode($category);
        return response()->json(['category' => $category,'category_sCount' => $category_sCount]);
    }

    public function ajaxDeleteCategory(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $category = $this->categoryRepository->deleteCategoryById($id);
        return response()->json(['category'=> $category]);
    }

    public function ajaxCategory_sTable(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $category_s = $this->categoryRepository->editCategory_sInfo($id, $category_id, $category_name);
        return response()->json(['category_s' => $category_s , 'id' => $id, 'category_id'=>$category_id , 'category_name'=>$category_name]);
    }

    public function ajaxAddCategory_s(Request $request)
    {
        $data = $request->all();
        $category_id = $data['category_id'];
        $category_name = $data['category_name'];
        $b_id = $data['b_id'];
        $category_s = $this->categoryRepository->addCategory_sByInfo($category_id, $category_name, $b_id);
        $upper_class_name = $this->categoryRepository->getCategoryNameByCategory_sId($category_s->id);
        //$category_s = json_encode($category_s);
        return response()->json(['category_s' => $category_s,'upper_class_name' => $upper_class_name]);
    }

    public function ajaxDeleteCategory_s(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $category_s = $this->categoryRepository->deleteCategory_sById($id);

        return response()->json(['category_s'=> $category_s]);
    }
    
}
