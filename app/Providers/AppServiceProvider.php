<?php

namespace App\Providers;

use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; //引入DB Facades 门脸
use Illuminate\Support\Facades\Log; //引入Log Facades 门脸
use Carbon\Carbon;

use App\User;
use App\Observers\UserObserver;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // 队列任务处理之前
        Queue::before(function(JobProcessing $event){
            \Log::debug($event->connectionName);
            \Log::debug($event->job);
            \Log::debug($event->job->payload());
        });

        // 队列任务处理之后
        Queue::after(function(JobProcessed $event){
            \Log::debug($event->connectionName);
            \Log::debug($event->job);
            \Log::debug($event->job->payload());
        });


        // 监听查询数据库查询事件，到时可以将此功能封装成laravel 插件
        DB::listen(function ($query) {
            \Log::debug($query->sql);
            \Log::debug(json_encode($query->bindings));
            \Log::debug($query->time);

            // 监听查询入库的sql不入库
            if(!strstr($query->sql, 'audit_sql')) {


                //将监听的sql 查询语句存入数据库
                DB::insert("insert into logs_sql (audit_sql, audit_data, audit_run_time, created_at, updated_at) values (?, ?, ?, ?, ?)",[
                    $query->sql,
                    !strstr(json_encode($query->bindings), '[]') ? json_encode($query->bindings) : "{}",
                    $query->time,
                    Carbon::now(),
                    Carbon::now()

                ]);
                Log::info(Carbon::now().'==>'.'监听sql语句入库');
            }

        });




    // 注册用户模型观察者
    User::observe(UserObserver::class);











    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
