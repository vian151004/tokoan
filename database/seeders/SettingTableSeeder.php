<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'id' => 1,
            'company_name' => 'Tokoan',
            'address' => 'Jl. Prof. H. Soedarto, SH Tembalang Semarang 50275',
            'phone' => '123456789',
            'note_type' => 1, //kecil
            'discount' => 5,
            'path_logo' => public_path('img/logo.png'),
            'path_member_card' => public_path('img/member.png'),
        ]);
    }
}
