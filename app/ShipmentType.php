<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentType extends Model
{
    public function shipments()
    {
        return $this->hasMany('App\Shipment');
    }
}
