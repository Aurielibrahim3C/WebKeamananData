<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('name');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

           $table->foreign('role_id')->references('role_id')->on('role')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_mhs']);
            $table->dropForeign(['id_dosen']);
            $table->dropColumn('id_mhs');
            $table->dropColumn('id_dosen');
        });

        Schema::dropIfExists('users');
    }
};
