<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        // Data dummy
        DB::table('users')->insert([
            [
                'name' => 'iqbal',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'type' => '0',
                'password' => bcrypt('12345678'),
                'created_at' => now()
            ],
            [
                'name' => 'Pegawai',
                'email' => 'pegawai@gmail.com',
                'email_verified_at' => now(),
                'type' => '1',
                'password' => bcrypt('12345678'),
                'created_at' => now()
            ]
        ]);
    }
}
