<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cv_name');
            $table->string('cluster_name');
            $table->integer('plant_area');
            $table->string('crop_type_name');
            $table->string('disposal_date');
            $table->unsignedBigInteger('disposal_tonns')->default(0);
            $table->integer('age_in_days')->default(0);
            $table->unsignedBigInteger('percentage')->default(0);
            $table->unsignedBigInteger('accepted_by')->nullable();
            $table->timestamps();
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
