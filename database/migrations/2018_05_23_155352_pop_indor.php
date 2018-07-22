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
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
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
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
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
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE products ADD content LONGBLOB after cover");
        DB::statement("ALTER TABLE products comment '产品表'");

        // news table
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('案例名');
            $table->string('summary', 255)->comment('案例简述');
            $table->string('cover', 255)->comment('案例封面图');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE news ADD content LONGBLOB after cover");
        DB::statement("ALTER TABLE news comment '新闻表'");

        // service modules table
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->comment('种类显示名');
            $table->string('icon', 255)->comment('图标')->nullable();
            $table->string('overview', 255)->comment('概述')->nullable();
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE modules comment '服务模块表'");

        // services table
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('服务名');
            $table->string('summary', 255)->comment('服务简述');
            $table->string('cover', 255)->comment('服务封面图');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->unsignedInteger('module_id')->comment('服务分类');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE services ADD content LONGBLOB after cover");
        DB::statement("ALTER TABLE services comment '新闻表'");

        // tags table
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('属性名');
            $table->string('comment', 255)->nullable()->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE tags comment '标签'");

        // departments table
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('属性名');
            $table->string('comment', 255)->nullable()->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE departments comment '部门表'");

        // jobs table
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departments_id')->comment('部门');
            $table->foreign('departments_id')->references('id')->on('departments');
            $table->string('name', 30)->index()->comment('职位名');
            $table->string('summary', 255)->comment('服务简述');
            $table->mediumText('duty')->comment('工作职责');
            $table->mediumText('requirements')->comment('任职要求');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->boolean('is_top')->default(0)->comment('是否置顶');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE jobs comment '职位表'");

        // job_has_tags table
        Schema::create('job_has_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->timestamps();
        });

        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE job_has_tags comment '职位标签表'");

        // attributes table
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('属性名');
            $table->string('comment', 255)->nullable()->comment('备注');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the LONGBLOB
        DB::statement("ALTER TABLE attributes comment '文章属性表'");

        // article table
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index()->comment('标题');
            $table->string('summary', 255)->nullable()->comment('文章简述');
            $table->unsignedInteger('attributes_id')->comment('文章属性');
            $table->foreign('attributes_id')->references('id')->on('attributes');
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
