<?php

use App\Models\UserWallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_wallets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->string('wallet_id', 191)->comment('e.g. WAL-36786429')->unique();
            $table->string('account_reference', 191)->comment('Used For reference to Virtual Account')->unique();
            $table->unsignedInteger('opening_balance')->default('0');
            $table->unsignedInteger('closing_balance')->default('0')->comment('Display this balance to the user');

            $table->json('recent_transaction_history')->comment('Most recent transaction details');
            $table->json('virtual_accounts')->comment('Most recent transaction details');

            $table->enum('status', UserWallet::STATUS)->default(UserWallet::STATUS['inactive']);
            $table->softDeletes();
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
        Schema::dropIfExists('user_wallets');
    }
}
