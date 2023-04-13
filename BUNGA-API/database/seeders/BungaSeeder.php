<?php

namespace Database\Seeders;

use App\Models\Bunga;
use Illuminate\Database\Seeder;

class BungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Bunga Sakura', 'Bunga Higan'];
        foreach ($names as $value) {
            Bunga::create([
                'name' => $value,
                'price' => '' . rand(25000, 30000)
            ]);
        }

    }
}
