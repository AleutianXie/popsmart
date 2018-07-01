<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopIndor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // case categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->comment('分类显示名');
            $table->string('icon', 255)->comment('分类图标');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE categories comment '案例分类表'");
 
        // cases table
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('案例名');
            $table->string('summary', 255)->comment('案例简述');
            $table->string('cover', 255)->comment('案例封面图');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->unsignedInteger('category_id')->comment('案例分类');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE cases ADD content LONGBLOB after cover");
        DB::statement("ALTER TABLE cases comment '案例表'");

        // product series table
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->comment('系列显示名');
            $table->string('icon', 255)->comment('图标')->nullable();
            $table->string('overview', 255)->comment('概述')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE series comment '产品系列表'");

        // products table
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('案例名');
            $table->string('summary', 255)->comment('产品简述');
            $table->string('cover', 255)->comment('产品封面图');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->unsignedInteger('series_id')->comment('产品分类');
            $table->foreign('series_id')->references('id')->on('series');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE products comment '产品表'");

        // article table
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('标题');
            $table->string('summary', 255)->nullable()->comment('案例简述');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE articles ADD content LONGBLOB after summary");
        DB::statement("ALTER TABLE articles comment '文章表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
