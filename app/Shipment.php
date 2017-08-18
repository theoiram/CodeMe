<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    public function shipmentType()
    {
        return $this->belongsTo('App\ShipmentType');
    }

    public function shipmentLine()
    {
        return $this->belongsTo('App\ShipmentLine');
    }
}
