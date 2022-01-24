<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beheco_user_business', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('business_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->integer('year_of_establishment')->nullable();
            $table->string('name_of_founder')->nullable();
            $table->string('building')->nullable();
            $table->string('street')->nullable();
            $table->string('area')->nullable();
            $table->integer('city_id');
            $table->string('landmark')->nullable();
            $table->string('pincode')->nullable();
            $table->integer('country')->nullable();
            $table->integer('state')->nullable();
            $table->string('office_number')->nullable();
            $table->string('tollfree_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email_id')->nullable();
            $table->string('website')->nullable();
            $table->string('location_lattitude', 50)->nullable();
            $table->string('location_longitude', 50)->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->longText('about')->nullable();
            $table->string('timing')->nullable();
            $table->string('timing_value')->nullable();
            $table->enum('is_paid', ['Y', 'N'])->default('N');
            $table->enum('status', ['active', 'inactive', 'deleted'])->default('active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('beheco_users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('beheco_category')->onDelete('cascade');
            $table->foreign('subcategory_id')->references('id')->on('beheco_subcategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beheco_user_business');
    }
}
