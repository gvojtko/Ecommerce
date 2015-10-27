<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('cpf_cnpj')->unique();
            $table->string('gender', 1);
            $table->date('birth_date');
            $table->char('type_person', 1);
            $table->string('address');
            $table->string('num_address');
            $table->string('phone');
            $table->string('cell');
            $table->string('cep');
            $table->string('id_city');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('permission');
            $table->boolean('is_active');
            $table->string('remember_token', 100)->nullable();
            $table->boolean('receiveMailing');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
