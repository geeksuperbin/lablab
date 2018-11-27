<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestDatabaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs_sql', function (Blueprint $table) {
            $table->increments('id');
            $table->text('audit_sql')->nullable()->comment('执行的sql语句');
            $table->text('audit_data')->nullable()->comment('绑定数据');
            $table->text('audit_run_time')->nullable()->comment('sql语句执行时间,单位是毫秒');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs_sql');

    }
}
