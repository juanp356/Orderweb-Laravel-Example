<?php

namespace Database\Seeders;

use App\Models\Causal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CausalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Causal::insert([
            ['description' => 'REPARACION CONTADOR'],
            ['description' => 'SUSPENCION SERVICIO'],
            ['description' => 'RECONEXION SERVICIO'],
            ['description' => 'INSTALACION CONTADOR'],
            ['description' => 'CAMBIO CONTADOR']
       ]);
    }
}
