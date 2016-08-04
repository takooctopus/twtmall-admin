<?php

namespace App\Http\Controllers\Admin;

use App\Model\Img;
use App\Model\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $userPageSize = 15;
    private $userGoodsPagesize = 9;

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
        $usersCount = $this->userRepository->getUsersCount();
        $usersByPageSize = $this->userRepository->getUsersByPageSize($this->userPageSize);
        //dd($usersByPageSize);
        //$users = User::find(1);
        return view('admin.user')->with([
            'usersCount' => $usersCount,
            'users' => $usersByPageSize,
        ]);
    }

    public function postUser()
    {
        $usersByPageSize = User::orderBy('id', 'desc')->paginate($this->userPageSize)->setPath('/user');
        $usersCount = 1;

        $html=view('admin.user.usertable')->with([
            'usersCount' => $usersCount,
            'users' => $usersByPageSize,
        ]);
        $html=$html->render();

        return response()->json(['html' => $html]);
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
        $imgs = $this->userRepository->getUserGoodsImgsByGoodss($goodss);
        return view('admin.usergoods')->with([
            'username' => $username,
            'goodss' => $goodss,
            'imgs' => $imgs,
        ]);
    }

}
