<?php

namespace Database\Seeders;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $tenDanhMucs = ['Áo len', 'Quần âu', 'Áo sơ mi', 'Áo khoác', 'Quần đùi'];
        foreach ($tenDanhMucs as $key => $value) {
            DanhMuc::factory()->create([
                'name' => $value,
            ]);
        }
        SanPham::factory(100)->create();
    }
}
