<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Flight;
use App\User;
use App\Phone;
use App\Comment;
use App\Role;

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

        // $res1 = Flight::all();

//        foreach( $flights as $flight){
//            echo $flight->name.'<br>';
//        }

//        foreach (Flight::where('id', '>=', 1)->cursor() as $flight){
//                        echo $flight->name.'<br>';
//
//        }

        // $res2 = Flight::find(1);

        // dump($res1);
        // dump($res2);


        $a = 1;


    }


    public function t5()
    {
        // $flight = Flight::find(5);
        // $flight->delete();

        // $res = $flight->trashed();
        // dump($res);
        // $res = $flight->delete();
        // // dd('1222');
        // $a = 1;
        // dump($res);

        // $flight = Flight::all();
        // dump($flight);

        // $res = Flight::destroy([1,3,4]);

        // $a = 1;

        // $res = Flight::withTrashed()->where('deleted_at', '<>', null)->get();
        // dump($res);


        // $res1 = Flight::onlyTrashed()->get();
        // dump($res1);

        // $res = Flight::withTrashed()->where('deleted_at', '<>', null)->restore();
        // dump($res);

        // $res = Flight::withTrashed()->where('id', 5)->forceDelete();
        // dump($res);


        $res = User::all();

        dump($res);

        $res1 = User::withoutGlobalScope('password')->get();
        dump($res1);


        $res3 = User::all();

        dump($res3);
    }

    public function t6()
    {
        // $res3 = User::all();
        //
        // dump($res3);
        //
        // $res4 = User::popular()->get();
        // dump($res4);
        //
        // $res5 = User::all();
        //
        // dump($res5);

        // $res6 = User::create([
        //     'name' => 'kekekeke',
        //     'email' =>'222@1111.com',
        //     'password' => 90
        //
        // ]);

        // dump($res6);

        // $res7 = User::destroy(3);
        // dump($res7);

        // $phone = User::find(1)->phone;

        // dump($phone);


        // $user = Phone::find(1)->user;
        // dump($user);

        // $comments = User::find(1)->comments;
        // dump($comments);
        //
        // $comments = User::find(1)->comments()->where('id',1)->get();
        // dump($comments);

        // $user  = Comment::find(1)->user;
        // dump($user);

        // $roles = User::find(1)->roles;
        // dump($roles); // 角色类集合
        //
        // // 当前用户有管理员身份
        // $role = User::find(1)->roles()->where('name','超级管理员')->count();
        // dump($role);

        // 当前角色属于那些用户
        //  $users = Role::find(3)->users;
        //
        //  dump($users);


        // 访问中间表数据
        $roles = User::find(1)->roles;
        //
        // foreach($roles as $role){
        //     // 打印角色 id
        //     dump($role->pivot->role_id);
        // }

        dump($roles);



    }



}
