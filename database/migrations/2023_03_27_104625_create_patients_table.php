<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('screen_name');
            $table->date('dob');
            $table->text('bio');
            // $table->unsignedBigInteger('doctor_id')->default(mt_rand(1,10))->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->nullOnDelete();
            $table->text('supportMessage')->nullable();
            $table->json('measurements')->nullable();
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
        Schema::dropIfExists('patients');
    }
};
