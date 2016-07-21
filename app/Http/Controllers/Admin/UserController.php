<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $userPageSize = 15;
    private $userGoodsPagesize = 15;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $usersByPageSize = $this->userRepository->getUsersByPageSize($this->userPageSize);
        //dd($usersByPageSize);
        return view('admin.user')->with([
            'users' => $usersByPageSize,
        ]);
    }

    public function detail($username)
    {
        $user = $this->userRepository->getUserByUsername($username);
        $goodsCount = $this->userRepository->getUserGoodsCountByUsername($username);
        $latestGoods = $this->userRepository->getUserLatestGoodsByUsername($username);
        return view('admin.userdetail')->with([
            'user' => $user,
            'goodsCount'=> $goodsCount,
            'latestGoods'=> $latestGoods,
        ]);
    }

    public function goods($username)
    {
        $goodss = $this->userRepository->getUserGoodssByUsernameAndPageSize($username,$this->userGoodsPagesize);
        return view('admin.usergoods')->with([
            'username' => $username,
            'goodss' => $goodss,
        ]);
    }

}
