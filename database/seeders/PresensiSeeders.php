<?php

namespace Database\Seeders;

use App\Models\Presensi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PresensiSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Presensi::truncate();

        // Data dummy
        DB::table('presensi')->insert([
            [
                'user_id' => '1',
                `latitude` => -8.15764,
                `longitude` => 113.72277,
                `tanggal` => null,
                `masuk` => null,
                `pulang` => null,
                'created_at' => now()
            ],
            [
                'user_id' => '2',
                `latitude` => -8.15764,
                `longitude` => 113.72277,
                `tanggal` => null,
                `masuk` => null,
                `pulang` => null,
                'created_at' => now()
            ]
        ]);
    }
}

// INSERT INTO `presensi` (`id`, `user_id`, `latitude`, `longitude`, `tanggal`, `masuk`, `pulang`, `created_at`, `updated_at`) VALUES
// (1, 1, -8.15764, 113.72277, '2023-11-15', '12:11:22', '00:00:00', '2023-11-15 05:11:22', '2023-11-15 05:11:22'),
// (2, 1, -8.15764, 113.72277, '2023-11-28', '20:13:39', '21:38:43', '2023-11-28 13:13:39', '2023-11-28 14:38:43'),
// (3, 2, -8.15747, 113.72283, '2023-11-29', '14:28:02', '14:28:34', '2023-11-29 07:28:02', '2023-11-29 07:28:34');

