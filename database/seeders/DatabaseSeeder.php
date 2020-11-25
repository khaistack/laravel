<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'roles_id' => '1',
            'status' => 'Hoạt Động',
            'email' => 'admin@admin',
            'password' => bcrypt('1234'),
        ]);
        DB::table('permission')->insert([
            ['action' => 'Thêm','role_id' => '1'],
            ['action' => 'Sửa','role_id' => '1'],
            ['action' => 'Xoá','role_id' => '1'],
            ['action' => 'Lưu','role_id' => '1'],
        ]);
    }
}
