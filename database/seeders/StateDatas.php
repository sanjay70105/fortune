<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateDatas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        \App\Models\State::insert([
    ['state_name' => 'Tamil Nadu'],
    ['state_name' => 'Andhra Pradesh'],
    ['state_name' => 'Maharashtra'],
    ['state_name' => 'Delhi'],
    ['state_name' => 'Karnataka'],
    ['state_name' => 'Odisha'],
    ['state_name' => 'Gujarat'],
]);
}
}