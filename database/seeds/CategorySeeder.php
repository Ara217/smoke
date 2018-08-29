<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['name' => 'Cigaronne'],
            ['name' => 'Sobranie'],
            ['name' => 'American Spirit'],
            ['name' => 'Benson & Hedges'],
            ['name' => 'CAMEL'],
            ['name' => 'CARLTON'],
            ['name' => 'CAPRI'],
            ['name' => 'Chesterfield'],
            ['name' => 'СК'],
            ['name' => 'Cohiba'],
            ['name' => 'Davidoff'],
            ['name' => 'DUNHILL'],
            ['name' => 'Eve'],
            ['name' => 'George karelias'],
            ['name' => 'Gitanes'],
            ['name' => 'GOLDEN AMERICAN'],
            ['name' => 'KAMEL RED'],
            ['name' => 'KARELIA'],
            ['name' => 'KIRKLAND'],
            ['name' => 'KENT'],
            ['name' => 'KOOL'],
            ['name' => 'Lark'],
            ['name' => 'L&M'],
            ['name' => 'Lucky Strike'],
            ['name' => 'Marlboro'],
            ['name' => 'Mild Seven Original'],
            ['name' => 'More'],
            ['name' => 'MULTI-FILTER'],
            ['name' => 'Muratti'],
            ['name' => 'NAT SHERMAN'],
            ['name' => 'Newport'],
            ['name' => 'PALL MALL'],
            ['name' => 'PARLIAMENT'],
            ['name' => 'PHILIP MORRIS'],
            ['name' => 'PYRAMID'],
            ['name' => 'R1'],
            ['name' => 'ROTHMANS'],
            ['name' => 'SALEM'],
            ['name' => 'SHERIFF'],
            ['name' => 'Trident'],
            ['name' => 'TRUE'],
            ['name' => 'USA GOLD'],
            ['name' => 'VIRGINIA'],
            ['name' => 'Vogue'],
            ['name' => 'WEST'],
            ['name' => 'WINSTON'],
            ['name' => 'СИГАРЫ']
        ];
        DB::table('category')->insert($category);
    }
}
