<?php

namespace Database\Seeders;

use App;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminDetails extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin::create([
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345678'),
            'remember_token'=>Str::random(15)
        ]);
    }
}
