<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->string('genre');
            $table->text('description');
            $table->string('isbn'); //used varchar() insted of integer because value may start with 0 which will be removed once inserted if we use integer.
            $table->string('image');
            $table->date('published_at')->nullable();
            $table->string('publisher');
            $table->timestamps();
            $table->softDeletes();

            /**
             * Added Index Only for filter columns, Adding too many index can occupy storage space, can be changed based on the queries
             */
            $table->index('title');
            $table->index('slug');
            $table->index('author');
            $table->index('isbn');
            $table->index('published_at');
            $table->index('genre');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
