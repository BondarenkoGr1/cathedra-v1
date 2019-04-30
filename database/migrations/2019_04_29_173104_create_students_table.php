<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('surname', 50)->unique();
            $table->string('name', 50)->unique();
            $table->string('family_name', 100)->unique();
            $table->integer('telegram_id')->unsigned()->unique();
            $table->string('email')->unique();
            $table->string('number', 100)->unique();
            $table->string('group');

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
