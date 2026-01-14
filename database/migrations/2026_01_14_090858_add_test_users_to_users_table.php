<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->insert([
            'email' => 'test@mail.com',
            'name' => 'Test User',
            'password' => bcrypt('password'),
        ]);
    }

    public function down(): void
    {
        DB::table('users')
            ->where('email', 'test@mail.com')
            ->delete();
    }
};
