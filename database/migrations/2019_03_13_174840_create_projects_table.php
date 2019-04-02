<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('client_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('estimation')->nullable();
            $table->float('time_spent')->nullable();
            $table->enum('status', ['on_going', 'in_progress', 'finish', 'failed'])->default('on_going');
            $table->timestamps();
        });
        Schema::create('project_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('project_id');
            $table->timestamps();
        });
        Schema::create('category_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('category_id');
            $table->timestamps();
        });
        Schema::create('project_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('project_id');
            $table->integer('tag_id');
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
        Schema::dropIfExists('projects');
        Schema::dropIfExists('project_tag');
        Schema::dropIfExists('project_user');
        Schema::dropIfExists('project_category');
    }
}
