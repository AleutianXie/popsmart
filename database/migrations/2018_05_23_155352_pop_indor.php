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
        // cases table
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->index();
            $table->string('summary', 255);
            $table->string('cover', 255);
            $table->string('email', 50)->unique();
            $table->tinyInteger('gender')->default(0);
            $table->string('birthdate', 10);
            $table->string('start_work_date', 10);
            $table->tinyInteger('degree')->default(1);
            $table->tinyInteger('service_status')->default(0);
            $table->char('province', 6)->index()->nullable();
            $table->char('city', 6)->index()->nullable();
            $table->char('county', 6)->index()->nullable();
            $table->string('position', 20);
            $table->string('industry', 20);
            $table->tinyInteger('salary')->default(0);
            $table->string('feedback')->nullable();
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedInteger('updated_by');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
        // once the table is created use a raw query to ALTER it and add the MEDIUMBLOB
        DB::statement("ALTER TABLE resumes ADD others LONGBLOB after salary");
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
