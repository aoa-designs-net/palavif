<?php

use App\Models\User;
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
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->uuid('uuid');
            $table->mediumText('name');
            $table->string('email')->unique();

            $table->string('username')->unique()->nullable();
            $table->string('phone_number', 60)->unique();

            $table->enum('type', User::TYPE);

            $table->string('password');

            $table->string('provider', 50)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();

            $table->enum('status', User::STATUS)->default(User::STATUS['active']);

            $table->timestamp('email_verified_at')->nullable();

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
    }
}
