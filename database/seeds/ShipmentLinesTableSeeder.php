<?php

use Illuminate\Database\Seeder;

class ShipmentLinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipment_lines')
            ->insert(array(
                array('name' => 'ava transporte'),
                array('name' => 'autolineas regiomontanas'),
                array('name' => 'transportes castores'),
                array('name' => 'transportes grupo beltran')
            ));
    }
}
