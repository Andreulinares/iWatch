<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Suscription;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suscripcion::create([
            'name' => 'Bronce',
            'price' => 9.95,
            'duration' => '30',
        ]);

        Suscripcion::create([
            'name' => 'Plata',
            'price' => 14.95,
            'duration' => '60',
        ]);

        Suscripcion::create([
            'name' => 'Oro',
            'price' => 19.95,
            'duration' => '90',
        ]);
    }
}
