<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
       
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@inventaris.com',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        $petugas = User::create([
            'name' => 'Petugas Gudang',
            'email' => 'petugas@inventaris.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas_gudang'
        ]);

        $pimpinan = User::create([
            'name' => 'Pimpinan Instansi',
            'email' => 'pimpinan@inventaris.com',
            'password' => Hash::make('password123'),
            'role' => 'pimpinan'
        ]);

       
        $elektronik = Category::create(['name' => 'Elektronik']);
        $atk = Category::create(['name' => 'Alat Tulis Kantor (ATK)']);
        $furnitur = Category::create(['name' => 'Furnitur']);
        $alat_lab = Category::create(['name' => 'Alat Laboratorium']);

       
        $gudang_a = Location::create(['name' => 'Gudang A']);
        $ruang_admin = Location::create(['name' => 'Ruang Administrasi']);
        $lab_utama = Location::create(['name' => 'Laboratorium Utama']);
        $ruang_rapat = Location::create(['name' => 'Ruang Rapat']);

        
        Item::create([
            'code' => 'EL-001',
            'name' => 'Laptop Dell Latitude',
            'description' => 'Laptop untuk staf administrasi',
            'category_id' => $elektronik->id,
            'location_id' => $ruang_admin->id,
            'stock' => 5,
            'min_stock' => 2
        ]);

        Item::create([
            'code' => 'ATK-001',
            'name' => 'Pulpen Pilot',
            'description' => 'Pulpen tinta hitam',
            'category_id' => $atk->id,
            'location_id' => $ruang_admin->id,
            'stock' => 20,
            'min_stock' => 10
        ]);

        Item::create([
            'code' => 'FUR-001',
            'name' => 'Kursi Kantor Ergonomis',
            'description' => 'Kursi untuk ruang rapat',
            'category_id' => $furnitur->id,
            'location_id' => $ruang_rapat->id,
            'stock' => 8,
            'min_stock' => 5
        ]);

        Item::create([
            'code' => 'LAB-001',
            'name' => 'Mikroskop Digital',
            'description' => 'Untuk praktikum biologi',
            'category_id' => $alat_lab->id,
            'location_id' => $lab_utama->id,
            'stock' => 3,
            'min_stock' => 1
        ]);

        Item::create([
            'code' => 'EL-002',
            'name' => 'Proyektor Epson',
            'description' => 'Digunakan di ruang rapat dan kelas',
            'category_id' => $elektronik->id,
            'location_id' => $ruang_rapat->id,
            'stock' => 2,
            'min_stock' => 1
        ]);
    }
}