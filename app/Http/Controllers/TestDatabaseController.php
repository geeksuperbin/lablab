<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Flight;

class TestDatabaseController extends Controller
{

    /*
     * 原生查
     */
    public function t1()
    {
        $users = DB::select('select * from users where id >= :id', [
            'id' => 1
        ]);


        foreach ($users as $user) {
            echo $user->name.'<br>';
        }

//        dd($users);
    }


    /*
     * 原生删
     */
    public function t2()
    {
        DB::delete('delete from users_copy');
    }


    /*
    * 原生,销毁表
    */
    public function t3()
    {
        $res = DB::delete('drop  table users_copy');
        \Log::debug($res);
    }


    public function t5()
    {
        return;
    }


    /*
     * 测试 Laravel 辅助函数
     */
    public function t4()
    {
//        // 函数返回数组中第一个通过指定测试的元素
//       $arr = [100, 200, 300];
//
//
//       $value= array_first($arr, function($value, $key){
//          return $value >=150;
//       });

//        $array = ['product' => ['name' => 'desk', 'price' => 100]];
//
//        $hasItem = array_has($array, 'product.name');
//
//
//        $hasItems = array_has($array, ['product.price', 'product.discount']);
//        $hasItems1 = array_has($array, ['product.price']);

//        phpinfo();

//        $path = app_path();




//        $a = base_path();


//        $b = config_path();
//
//
//          $c = public_path();
//
//
//        $d = resource_path();
//
//        $dd = resource_path('asset/ss.scss');
//
//
//        $v1 = storage_path();


//        $a = camel_case('sss_ddddd');



//        $s = str_limit('PHP is best Language', 7);


//        $b = str_contains("PHP is best Language", " is ");


//        $s = str_random(40);


//
//        $d1 = base64_encode(random_bytes(20));
//        $d2 = base64_encode(random_bytes(20));
//        $d3 = base64_encode(random_bytes(20));

//$F = str_slug("Laravel 5 Framework", '_');


//        $s = trans('validation.required');


//        $url = action('TestDatabaseController@t4',['id'=>1]);


//        $url = asset('img/photo.jpg');


//        $a = secure_asset('foo.bar.zip', 'sss', ['222']);
//        $h = route('database/t4');

//        $h = secure_url('user/profile');

//        $g = url('user/profile');

//        $h = url()->current();
//        $r = url()->full();
//        $u = url()->previous();

//        abort(401, '哈哈哈哈哈');

//        abort(400,'gogogogo');


//        abort(500, 'dddddd');


//        $g = \Auth::user()->isAdmin();


//        $g = auth();


//        $b = auth()->user();

//        $f = back();




//        $users = DB::table('users')->get();
//
//        foreach($users as $user){
//            echo $user->name."<br>";
//        }

//        dump($user);




//        $users = DB::table('users')->where('name', 'nKfLiELLtU')->first();
//        $users = DB::table('users')->where('name', 'nKfLiELLtU')->value('name');



//        $names = DB::table('users')->pluck('name');
//
//        foreach($names as $name){
//            echo $name."<br>";
//        }


//        $names = DB::table('users')->pluck('name', 'id');


//        DB::table('users')->orderBy('id')->chunk(2, function($users){
//            foreach($users as $user){
//                echo $user->name."<br>";
//            }
//
//            return false;
//
//        });


//       $s =  DB::table('users')->count();

        $res1 = Flight::all();

//        foreach( $flights as $flight){
//            echo $flight->name.'<br>';
//        }

//        foreach (Flight::where('id', '>=', 1)->cursor() as $flight){
//                        echo $flight->name.'<br>';
//
//        }

        $res2 = Flight::find(1);

        dump($res1);
        dump($res2);


        $a = 1;







    }
}
