<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCathedraUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cathedra_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Имя');
            $table->string('surname')->comment('Фамилия');
            $table->string('last_name')->comment('Отчество');
            $table->unsignedInteger('group_id')->nullable()->comment('Группа');
            $table->tinyInteger('branch')->nullable()->comment('Специальность');
            $table->unsignedInteger('telegram_id')->nullable()->comment('Идентификатор в телеграмме');
            $table->tinyInteger('role')->default(1)->comment('Роль пользователя: 1 - студент, 2 - преподаватель, 0 - прочее');
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
        Schema::dropIfExists('cathedra_users');
    }
}
