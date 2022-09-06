<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('human_id')->unsigned()->comment('顧客id');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('contracted_at')->nullable()->comment('契約開始日');
            $table->text('remarks')->nullable()->comment('備考');
            $table->timestamps();

            $table->foreign('human_id')->references('id')->on('humans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('human_details');
    }
};
