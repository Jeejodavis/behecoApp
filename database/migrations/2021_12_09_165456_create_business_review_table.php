<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beheco_business_review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('rating');
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('beheco_users')->onDelete('cascade');
            $table->foreign('business_id')->references('id')->on('beheco_user_business')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beheco_business_review');
    }
}
