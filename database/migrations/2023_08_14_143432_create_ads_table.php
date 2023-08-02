<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast\String_;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable()->default('free');
            $table->string('title', 50);
            $table->string('description');
            $table->string('products');
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('advertiser_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->date('start_date');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('advertiser_id')->references('id')->on('advertisers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
