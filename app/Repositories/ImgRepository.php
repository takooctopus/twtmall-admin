<?php

/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 13:00
 */
namespace App\Repositories;

use App\Model\Img;



class ImgRepository
{
    public function getImgsByPagesize($pagesize)
    {
        return Img::orderBy('time','desc')->paginate($pagesize);
    }

    public function getImgUrlById($id)
    {
        return Img::find($id)->url;
    }
}