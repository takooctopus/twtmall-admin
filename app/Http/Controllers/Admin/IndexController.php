<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\GoodsRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var GoodsRepository
     */
    private $goodsRepository;

    public function __construct(UserRepository $userRepository , GoodsRepository $goodsRepository)
    {
        $this->userRepository = $userRepository;
        $this->goodsRepository = $goodsRepository;
    }

    public function index()
    {
        $usersCount = $this->userRepository->getUsersCount();
        $recentGoodssCount = $this->goodsRepository->getRecentGoodssCount();
        $latestGoods =  $this->goodsRepository->getLatestGoods();
        $latestGoodsUser = $this->goodsRepository->getLatestGoodsUser();
        $topUser = $this->userRepository->getTopUser();
        $topUserGoodsCount = $this->userRepository->getTopUserGoodssCount();
        //dd($latestGoodsUser);
        return view('admin.index')->with([
            'usersCount' => $usersCount,
            'recentGoodssCount' => $recentGoodssCount,
            'latestGoods' => $latestGoods,
            'latestGoodsUser' => $latestGoodsUser,
            'topUser' => $topUser,
            'topUserGoodsCount' => $topUserGoodsCount,
            'a' => 200,
        ]);
    }
}
