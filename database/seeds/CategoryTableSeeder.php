<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 6:11
 */
use App\Model\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
            'name' => '校园代步',
            'class' => 'icon-xiaoyuandaibu',
            'category_id' => '1',
        ]);
        DB::table('categorys')->insert([
            'name' => '手机',
            'class' => 'icon-shouji',
            'category_id' => '2',
        ]);
        DB::table('categorys')->insert([
            'name' => '电脑',
            'class' => 'icon-diannao',
            'category_id' => '3',
        ]);
    }
}