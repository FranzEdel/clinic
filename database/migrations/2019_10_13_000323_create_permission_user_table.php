<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('user_id');

            $table->timestamps();

            // Relaciones
            $table->foreign('permission_id')->references('id')->on('permissions')
                        ->onUpdate('cascade')
                        ->opDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                        ->opUpdate('cascade')
                        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_user');
    }
}
