<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shipment_type_id');
            $table->unsignedInteger('shipment_line_id');
            $table->string('foil', 10);
            $table->string('plate', 7);
            $table->string('container_number');
            $table->string('responsible_name');
            $table->text('comments')->nullable();
            $table->datetime('entry')->nullable();
            $table->datetime('departure')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
