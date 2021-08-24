<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => hash::make('admin'),
            'roles' => 'admin',
            'registered_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'username' => 'user',
            'password' => hash::make('user'),
            'roles' => 'user',
            'registered_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}