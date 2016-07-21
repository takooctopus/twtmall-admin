<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 6:11
 */
use App\Model\Goods;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index)
        {
            DB::table('goods')->insert(
                array(
                    array(
                        'uid' => '1',
                        'category_id' => '',
                        'category_s_id' => '',
                        'name' => '',
                        'detail' => '',
                        'campus' => '',
                        'location' => '',
                        'price' => '',
                        'bargain' => '',
                        'status' => '',
                        'exchange' => '',
                        'phone' => '',
                        'wechat' => '',
                        'qq' => '',
                        'imgurl' => '',
                        'time' => '',
                        'view' => '',
                        'show' => '',
                    ),
                ));
        }
    }
}