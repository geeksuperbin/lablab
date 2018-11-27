<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVulLibCnnvd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vul_lib_cnnvd', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hole_info',30)->nullable()->comment('漏洞信息');
            $table->string('cnnvd',30)->nullable()->comment('CNNVD编号');
            $table->string('cve',30)->nullable()->comment('CVE编号');
            $table->string('pub_time',30)->nullable()->comment('发布时间');
            $table->string('upd_time',30)->nullable()->comment('更新时间');
            $table->string('hole_res',30)->nullable()->comment('漏洞来源');
            $table->string('danger_lev',30)->nullable()->comment('危害等级');
            $table->string('hole_type',30)->nullable()->comment('漏洞类型');
            $table->string('danger_type',30)->nullable()->comment('威胁类型');
            $table->string('manufacturer',30)->nullable()->comment('厂商');
            $table->text('hole_intro')->comment('漏洞简介');
            $table->text('hole_notice')->comment('漏洞公告');
            $table->text('refer_url')->comment('参考网址');
            $table->text('affect_entity')->comment('受影响实体');
            $table->text('patch')->comment('补丁');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vul_lib_cnnvd');
    }
}
