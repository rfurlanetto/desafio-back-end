<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pacientes;

class PacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pacientes::factory(10)->create();
    }
}
