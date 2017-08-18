<?php

namespace App\Http\Controllers;

use App\Shipment;
use App\Http\Requests\StoreShipments;
use App\Http\Requests\UpdateShipments;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipmentTypes = \App\ShipmentType::all();
        $shipmentLines = \App\ShipmentLine::all();
        $shipments = Shipment::all();

        return view('shipments.index')
            ->with('shipmentTypes', $shipmentTypes)
            ->with('shipmentLines', $shipmentLines)
            ->with('shipments', $shipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShipments $request)
    {
        $shipment = new Shipment;

        $shipment->foil = "M&S";
        $shipment->plate = $request->input('plate');
        $shipment->container_number = $request->input('container_number');
        $shipment->responsible_name = $request->input('responsible_name');

        if ($request->has('comments')) {
            $shipment->comments = $request->input('comments');
        }
        if ($request->has('entry')) {
            if ($request->input('entry') != "") {
                $shipment->entry = $request->input('entry');    
            }
        }
        if ($request->has('departure')) {
            if ($request->input('departure') != "") {
                $shipment->departure = $request->input('departure');    
            }
        }
        if ($request->has('shipment_type')) {
            $shipmentType = \App\ShipmentType::find($request->input('shipment_type'));
            $shipment->shipmentType()->associate($shipmentType);
        }
        if ($request->has('shipment_line')) {
            $shipmentLine = \App\ShipmentLine::find($request->input('shipment_line'));
            $shipment->shipmentLine()->associate($shipmentType);
        }

        $shipment->save();

        $shipment->foil = "M&S" . \str_pad($shipment->id, 7, "0", \STR_PAD_LEFT);

        $shipment->save();

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Transporte guardado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShipments $request, Shipment $shipment)
    {
        $shipment = Shipment::find($shipment->id);

        if ($request->has('plate')) {
            $shipment->plate = $request->input('plate');    
        }
        if ($request->has('container_number')) {
            $shipment->container_number = $request->input('container_number');
        }
        if ($request->has('responsible_name')) {
            $shipment->responsible_name = $request->input('responsible_name');
        }
        if ($request->has('comments')) {
            $shipment->comments = $request->input('comments');
        }
        if ($request->has('entry')) {
            if ($request->input('entry') != "") {
                $shipment->entry = $request->input('entry');    
            }
        }
        if ($request->has('departure')) {
            if ($request->input('departure') != "") {
                $shipment->entry = $request->input('departure');    
            }
        }
        if ($request->has('shipment_type')) {
            if ($request->input('shipment_type') != 0) {
                $shipmentType = \App\ShipmentType::find($request->input('shipment_type'));
                $shipment->shipmentType()->associate($shipmentType);   
            }
        }
        if ($request->has('shipment_line')) {
            if ($request->input('shipment_line') != 0) {
                $shipmentLine = \App\ShipmentLine::find($request->input('shipment_line'));
                $shipment->shipmentLine()->associate($shipmentType);   
            }
        }

        $shipment->save();

        return redirect()
            ->route('shipments.index')
            ->with('success', 'Transporte actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipment $shipment)
    {
        $shipment = Shipment::find($shipment->id)->delete();

        return view('shipments.index')
            ->with('success', 'Transporte eliminado con exito');
    }
}
