<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\letterTypes;

class klasifikasiSuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        letterTypes::Create([
            'letter_code' => '0243-1', 
            'name_type' => 'Rapat Guru'
        ]);
        letterTypes::Create([
            'letter_code' => '2903-2', 
            'name_type' => 'Rapat Bulanan'
        ]);
    }
}
