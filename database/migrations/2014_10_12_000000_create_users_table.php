<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            
            $table->id();
            $table->integer('id_role')->unsigned();           
            $table->string('fullname');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('gender');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company');
            $table->string('position');
            $table->text('address');
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
        Schema::dropIfExists('users');
    }
}
