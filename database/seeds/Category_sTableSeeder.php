<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 6:11
 */
use App\Model\Category_s;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category_sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_ss')->insert([
            'name' => '全部',
            'b_id' => '1',
            'category_id' => '1',
        ]);
        DB::table('category_ss')->insert([
            'name' => '自行车',
            'b_id' => '1',
            'category_id' => '2',
        ]);
        DB::table('category_ss')->insert([
            'name' => '全部',
            'b_id' => '2',
            'category_id' => '3',
        ]);
        DB::table('category_ss')->insert([
            'name' => '苹果',
            'b_id' => '2',
            'category_id' => '4',
        ]);
    }
}