<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('NO ACTION');

            $table->ipAddress('ip_address');
            $table->text('user_agent')->nullable();
            $table->enum('type', ['payment', 'request', 'others', 'login', 'logout', 'profile', 'errors']);
            $table->enum('severity', ['informational', 'warning', 'error']);
            $table->string('action_url');
            $table->string('request_url');
            $table->longText('message');
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
        Schema::dropIfExists('user_activities');
    }
}
