<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->increments('id_R_P');
            $table->binary('valide');

            $table->unsignedInteger('id_role');
            $table->unsignedInteger('id_permission');

            $table->timestamps();

            $table->foreign('id_role')->references('idRole')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_permission')->references('idPermission')->on('permissions')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
