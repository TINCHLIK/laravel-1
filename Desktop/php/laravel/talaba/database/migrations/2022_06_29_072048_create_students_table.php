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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('ism');
            $table->string('fam');
            $table->integer('yosh');
            $table->boolean('jins');
            $table->timestamps();

            $table->unsignedBigInteger('profession_id')->nullable();
            $table->index('profession_id', 'student_profession_idx');
            $table->foreign('profession_id', 'student_profession_fk')->on('professions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
