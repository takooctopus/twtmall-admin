<?php
/**
 * Created by PhpStorm.
 * User: Takoyaki
 * Date: 2016/7/19
 * Time: 6:11
 */
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'twtid' => '0',
                    'email' => '694835920@qq.com',
                    'campus' => '2',
                    'username' => 'y694835920',
                    'realname' => '',
                    'stunumber' => '3015218104',
                    'phone' => '15822376171',
                    'wechat' => '15822376171',
                    'qq' => '694835920',
                    'imgurl' => '72',
                    'token' => 'O6ZGishCKcfOuwbGygBIzNIoRUVlBGKnOXuiRLWahSy5PtmDxQ0cpBlHVxrgmx4yLVocCQg7mBmhJSnyZnP7QI1mhQSgnLF9hPzp',
                ),
                array(
                    'twtid' => '0',
                    'email' => '461062411@qq.com',
                    'campus' => '2',
                    'username' => '461062411',
                    'realname' => '',
                    'stunumber' => '3015218101',
                    'phone' => '123456789',
                    'wechat' => '',
                    'qq' => '',
                    'imgurl' => '64',
                    'token' => '15brFC0ArWuvktSPiEAJ7Zin8GoLfH2olifW4CkqRksRVt4uzB70lEeWQK4g1VwFKPdRZ3rbkrRlZxN4GqnRqBMt7etc9H7QY54X',
                ),
                array(
                    'twtid' => '0',
                    'email' => 'nerosoft@outlook.com',
                    'campus' => '2',
                    'username' => 'yangff',
                    'realname' => '',
                    'stunumber' => '3015218102',
                    'phone' => '',
                    'wechat' => '',
                    'qq' => '',
                    'imgurl' => '0',
                    'token' => '9ezsCl1rtFWNCsrUHJeyipnXmlZXszNyFjgONaqP7ULWQkg71X6QpJh7dmMDSz2KJt2HawCUW7zn2FrxBRToUNsKzyX5pPsbhLHA',
                ),
            ));
    }
}