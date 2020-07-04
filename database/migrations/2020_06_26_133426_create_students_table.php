<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
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
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('student_id_number');
            $table->unsignedBigInteger('cource_id');
            $table->unsignedBigInteger('batch_id');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('phone');
            $table->string('gurdian_number')->nullable();
            $table->string('sex');
            $table->string('graduation')->nullable();
            $table->text('parmanent_address');
            $table->text('present_address')->nullable();
            $table->string('picture')->nullable();
            $table->foreign('cource_id')->references('id')->on('cources')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
