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
        return view('admin.category')->with([
            'categoryName' => $this->categoryRepository->getCategoryNameByCategory_id($category_s_id),
            'categories' => $this->categoryRepository->getAllCategories(),
            'category_sCounts' => $this->categoryRepository->getCategory_sCounts(),
            'category_ss' => $this->categoryRepository->getCategory_ssByCategory_id($category_s_id),
        ]);
    }
}
