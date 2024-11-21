<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('payment_methods')->nullable();
            $table->enum('summary_of_leads', ['0','1'])->default('0');
            $table->enum('saved_search_alerts', ['0','1'])->default('0');
            $table->string('email_verification_token')->nullable(); // Adding the column
            $table->enum('email_verify_status', ['0','1','2'])->default('0');
            $table->enum('user_email_alert', ['0','1','2'])->default('0');
            $table->enum('user_sms_alert', ['0','1','2'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
