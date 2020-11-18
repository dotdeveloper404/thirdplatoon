<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->enum('category_type', ['ads', 'blog'])->default('blog');
=======
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('parent_id');
>>>>>>> 7c163b5238662c4422f81e824483f582887b4fbc
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
        Schema::dropIfExists('categories');
    }
}
