<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->nullable()->default(null);
            $table->string('password')->nullable()->nullable();
            $table->string('country_code')->nullable()->default(null);
            $table->string('mobile')->nullable()->default(null);
            $table->string('profile_image')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->enum('notification', ['0', '1'])->default('1');
            $table->enum('type', ['admin', 'user','car_transporter'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->longText('reset_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        //  Schema::rename('old_users', 'users');
    }
}
