<?php

use Illuminate\Database\Seeder;
use App\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            ['name' => 'Американские сигареты'],
            ['name' => 'Европейские сигареты'],
            ['name' => 'Японские сигареты'],
            ['name' => 'Американская жевательная резинка'],
            ['name' => 'Американский Duty Free'],
            ['name' => 'КУБИНСКИЕ СИГАРЫ'],
        ];

        Region::truncate();
        DB::table('regions')->insert($regions);
    }
}
