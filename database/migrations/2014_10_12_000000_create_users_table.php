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
            $table->string('name');
            $table->string('surname', 36);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('category_id')->unsigned();
            $table->string('company_name', 255);
            $table->string('slug', 255);
            $table->string('address', 255);
            $table->longText('company_desc');
            $table->string('company_logo', 255);
            $table->string('mobile', 55);
            $table->string('mobile2', 55);
            $table->string('phone', 55);
            $table->dateTime('created_date');
            $table->string('created_ip', 15);
            $table->string('session_id', 255);

            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
