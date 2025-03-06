<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_by_transporter_id');
            // $table->foreign('quote_by_transporter_id')->references('id')->on('quote_by_transpoters')->onDelete('cascade');
            $table->foreign('quote_by_transporter_id')->nullable()->default(null);
            $table->enum('type', ['positive', 'neutral', 'negative'])->nullable()->default(null);
            $table->integer('communication')->nullable();
            $table->integer('punctuality')->nullable();
            $table->integer('care_of_good')->nullable();
            $table->integer('professionalism')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
