<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beheco_business_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('offer_image')->nullable();
            $table->string('heading');
            $table->double('offer_amount', 8, 2);
            $table->string('location');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('beheco_business_offers');
    }
}
