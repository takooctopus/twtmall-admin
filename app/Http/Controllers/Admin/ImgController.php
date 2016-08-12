<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ImgRepository;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class ImgController
 * @package App\Http\Controllers\Admin
 */
class ImgController extends Controller
{
    /**
     * @var ImgRepository
     */
    private $imgRepository;
    /**
     * @var int
     */
    private $pagesize = 9;

    /**
     * ImgController constructor.
     * @param ImgRepository $imgRepository
     */
    public function __construct(ImgRepository $imgRepository)
    {

        $this->imgRepository = $imgRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 两种图片url写法
     * http://mall.twt.edu.cn/twtmall2016/index.php/Upload/redirectimg/?id=99
     * http://mall.twt.edu.cn/twtmall2016/Uploads/goods/20160802/57a06a4697a2a.jpg
     */
    public function index()
    {

        $imgs = $this->imgRepository->getImgsByPagesize($this->pagesize);
        $imgbaseurl = config('img.imgbaseurl');
        return view('admin.img')->with([
            'imgs' => $imgs,
            'imgbaseurl' => $imgbaseurl,
        ]);
    }
}