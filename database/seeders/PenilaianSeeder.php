<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penilaians = [
            [
                'users_id' => 3,
                'description' => 'Pelayanan kurang ramah',
                'rating' => 'Kurang',
            ],
            [
                'users_id' => 2,
                'description' => 'Pelayanan cukup ramah',
                'rating' => 'Cukup',
            ]
        ];
        DB::table('penilaians')->insert($penilaians);
    }
}
