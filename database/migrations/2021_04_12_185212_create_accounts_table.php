<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('user_id');

            $table->string('first_name');
            $table->string('last_name');

            $table->date('date_of_birth');

            $table->string('phone_number')->unique();
            $table->string('phone_country');
            $table->longText('location');
            $table->string('referral_link')->unique()->nullable();

            $table->string('sponser_username')->nullable();

            $table->enum('gender', \App\Models\Account::GENDER);

            $table->mediumText('avatar')->nullable();

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
        Schema::dropIfExists('accounts');
    }
}
