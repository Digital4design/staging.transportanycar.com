<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaveSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_searches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('car_transporter');
            $table->string('search_name')->nullable();
            $table->string('pick_area')->nullable();
            $table->string('drop_area')->nullable();
            $table->enum('email_notification',['true','false'])->default('true');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('save_searches');
    }
}
