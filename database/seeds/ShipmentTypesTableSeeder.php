<?php

use Illuminate\Database\Seeder;

class ShipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipment_types')
            ->insert(array(
                array('type' => 'importación'),
                array('type' => 'exportación'),
                array('type' => 'local')
            ));
    }
}
