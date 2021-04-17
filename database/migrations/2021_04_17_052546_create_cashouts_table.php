<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auth_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('merchant_id')->index()->constrained('users')->onDelete('cascade');
            $table->foreignId('currency_id')->index()->constrained('currencies')->onDelete('cascade');
            $table->float('amount', 50);
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
        Schema::dropIfExists('cashouts');
    }
}
