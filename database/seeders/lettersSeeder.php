<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\letters;

class lettersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        letters::create([
            'letter_type_id' => "0243-1",
            'letter_perihal' => "Foo",
            'recipients' => "Foo",
            'content' => "Foo",
        ]);
    }
}
