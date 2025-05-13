<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Seed clients
        if (DB::table('clients')->count() === 0) {
            $clients = json_decode(File::get(database_path('seeders/json/clients.json')), true);
            DB::table('clients')->insert($clients);
        }

        // Seed cars
        if (DB::table('cars')->count() === 0) {
            $cars = json_decode(File::get(database_path('seeders/json/cars.json')), true);
            DB::table('cars')->insert($cars);
        }

        // Seed services
        if (DB::table('services')->count() === 0) {
            $services = json_decode(File::get(database_path('seeders/json/services.json')), true);
            DB::table('services')->insert($services);
        }
    }
}
