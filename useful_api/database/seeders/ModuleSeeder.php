<?php

namespace Database\Seeders;

use App\Models\module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        module::create(['name' => 'URL Shortener', 'description' => 'Raccourcir et gérer des liens']);
        module::create(['name' => 'Wallet', 'description' => 'Gestion du solde et transferts']);
        module::create(['name' => 'Marketplace', 'description' => 'Gestion de produits et commandes']);
        module::create(['name' => 'Time Tracker', 'description' => 'Suivi du temps et sessions']);
        module::create(['name' => 'Investment Tracker', 'description' => 'Suivi du portefeuille d’investissement']);
    }
}