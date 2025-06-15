<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('telepon')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('telepon');
            $table->enum('role', ['user', 'admin'])->default('user')->after('password');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nama', 'telepon', 'alamat', 'role']);
        });
    }
};
