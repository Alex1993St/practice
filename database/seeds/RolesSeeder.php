<?php

use App\Modules\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::insert([
            ['role' => 'менеджер'],
            ['role' => 'клієнт']
        ]);
    }
}
