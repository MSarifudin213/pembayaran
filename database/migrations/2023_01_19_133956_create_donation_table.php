<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::dropIfExists('donation');
            Schema::create('donation', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('user_id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->string('donor_name')->nullable();
            $table->string('donor_email')->nullable();
            $table->string('donation_type')->nullable();
            $table->decimal('amount', 20, 2)->default(0);
            $table->string('note')->nullable();
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('donation');
    }
}

