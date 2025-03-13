<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pet = new Pet;
        $pet->name = "Hecate";
        $pet->type = "Perro";
        $pet->breed = "Todas";
        $pet->size = "Mediano";
        $pet->save();
    }
}
