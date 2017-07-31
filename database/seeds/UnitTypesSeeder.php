<?php

use Illuminate\Database\Seeder;

class UnitTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // tunde@cchubnigeria.com
    public function run()
    {
        $data = [
                    ['name' => 'per bag', 'description' => 'lorem'],
                    ['name' => 'per tin', 'description' => 'lorem' ]
                ];
                
        App\Models\UnitType::insert($data);
    }
}
