<?php

namespace App\Http\Controllers\Admin;

use App\Model\Img;
use App\Model\User;
use App\Repositories\ImgRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    private $userPageSize = 15;
    private $userGoodsPagesize = 9;
    private $userNeedsPagesize = 9;
    /**
     * @var ImgRepository
     */
    private $imgRepository;

    public function __construct(UserRepository $userRepository, ImgRepository $imgRepository)
    {
        $this->userRepository = $userRepository;
        $this->imgRepository = $imgRepository;
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

        //$usersByPageSize = $this->userRepository->getUsersBySearchInfoAndPageSize("3015", $this->userPageSize);
        //if (!$usersByPageSize->isEmpty()) dump("yes"); else dump("No");
        //dd($usersByPageSize);


        return view('admin.user')->with([
            'usersCount' => $usersCount,
            'users' => $usersByPageSize,
        ]);
    }

    public function ajaxIndex(Request $request)
    {
        $data = $request->all();
        $searchInfo = $data['searchinfo'];
        $usersByPageSize = $this->userRepository->getUsersBySearchInfoAndPageSize($searchInfo, $this->userPageSize);
        $usersCount =$this->userRepository->getUsersCountBySearchInfo($searchInfo);
        if ($usersByPageSize->isEmpty())
        {
            $usersByPageSize = $this->userRepository->getUsersByPageSize($this->userPageSize);
            $usersCount = $this->userRepository->getUsersCount();
        }


        $usertable=view('admin.user.usertable')->with([
            'users' => $usersByPageSize,
        ]);
        $usertable=$usertable->render();
        
        return response()->json(['usersCount' => $usersCount ,'usertable' => $usertable]);
    }

    public function detail($username)
    {
        $user = $this->userRepository->getUserByUsername($username);
        $goodsCount = $this->userRepository->getUserGoodsCountByUsername($username);
        $latestGoods = $this->userRepository->getUserLatestGoodsByUsername($username);
        $needsCount = $this->userRepository->getUserNeedsCountByUsername($username);
        $latestNeeds = $this->userRepository->getUserLatestNeedsByUsername($username);
        $imgurl = $this->imgRepository->getImgUrlById($user->imgurl);
        return view('admin.userdetail')->with([
            'user' => $user,
            'goodsCount'=> $goodsCount,
            'latestGoods'=> $latestGoods,
            'needsCount'=> $needsCount,
            'latestNeeds'=> $latestNeeds,
            'imgurl' => $imgurl,
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
    public function needs($username)
    {
        $needss = $this->userRepository->getUserNeedssByUsernameAndPageSize($username,$this->userNeedsPagesize);
        $imgs = $this->userRepository->getUserNeedsImgsByNeedss($needss);
        return view('admin.userneeds')->with([
            'username' => $username,
            'needss' => $needss,
            'imgs' => $imgs,
        ]);
    }

    public function collection($username,Request $request)
    {
        $goodss = $this->userRepository->getUserCollectionsByUsernameAndPageSize($username,$this->userGoodsPagesize);
        $imgs = $this->userRepository->getUserGoodsImgsByGoodss($goodss);
        return view('admin.usergoods')->with([
            'username' => $username,
            'goodss' => $goodss,
            'imgs' => $imgs,
        ]);
    }

}
