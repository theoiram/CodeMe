@extends('layouts.app')

@section('content')
  @include('layouts._side_menu')
  <div class="col-sm-10">
    <h3>ALTA DE TRANSPORTES</h3>
    @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="info-container">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">AGREGAR TRANSPORTE</button>
      <div class="table-responsive">          
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Linea de transporte</th>
              <th>Placas del transporte</th>
              <th>Entrada</th>
              <th>Salida</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($shipments as $shipment)
              <tr>
                <td>{{ $shipment->foil }}</td>
                <td>{{ $shipment->shipmentLine->name }}</td>
                <td>{{ $shipment->plate }}</td>
                <td>{{ $shipment->entry ? Carbon\Carbon::parse($shipment->entry)->format('Y-m-d h:i:s') : "No" }}</td>
                <td>{{ $shipment->departure ? Carbon\Carbon::parse($shipment->departure)->format('Y-m-d h:i:s') : "No" }}</td>
                <td class="text-right">
                  <button type="button" class="btn btn-success btn-block aux-btn-edit" data-toggle="modal" data-target="#editModal" data-id="{{ $shipment->id }}" data-plate="{{ $shipment->plate }}" data-container="{{ $shipment->container_number }}" data-responsible="{{ $shipment->responsible_name }}" data-comments="{{ $shipment->comments }}" data-entry="{{ $shipment->entry }}" data-departure="{{ $shipment->departure }}">EDITAR</button>
                  <form method="POST" action="{{ route('shipments.destroy', $shipment->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-block" >ELIMINAR</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    
    <!-- Modal for edit -->
    <div id="editModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar transporte</h4>
          </div>
          <div class="modal-body">
            <form method="POST" role="form" id="formUpdate" action="{{ route('shipments.update', '') }}">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="plate">Placa:</label>
                <input type="text" class="form-control" id="plate" name="plate">
              </div>
              <div class="form-group">
                <label for="container_number">Numero de contenedor:</label>
                <input type="number" class="form-control" id="container" name="container_number">
              </div>
              <div class="form-group">
                <label for="responsible_name">Nombre del responsable:</label>
                <input type="text" class="form-control" id="responsible" name="responsible_name">
              </div>
                <div class="form-group">
                    <label for="comments">Comentarios</label>
                    <textarea class="form-control" id="comments" name="comments"></textarea>
                </div>
                <div class="form-group">
                    <label for="entry">Entrada</label>
                    <input type="datetime-local" class="form-control" id="entry" name="entry" step="3600">
                </div>
                <div class="form-group">
                    <label for="departure">Salida</label>
                    <input type="datetime-local" class="form-control" id="departure" name="departure" step="3600">
                </div>
                <div class="form-group">
                <label for="shipment_type">Tipo de transporte</label>
                    <select id="shipment_type" name="shipment_type" class="form-control">
                        <option value="0">Modifica el tipo de transporte</option>
                        @foreach ($shipmentTypes as $shipmentType)
                            <option value="{{ $shipmentType->id }}">{{ ucwords($shipmentType->type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label for="shipment_line">Linea de transporte</label>
                    <select id="shipment_line" name="shipment_line" class="form-control">
                        <option value="0">Modifica la linea de transporte</option>
                        @foreach ($shipmentLines as $shipmentLine)
                            <option value="{{ $shipmentLine->id }}">{{ ucwords($shipmentLine->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block margin-bottom" form="formUpdate">Aceptar</button>
            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for add -->
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar transporte</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('shipments.store') }}" method="POST" role="form" id="formCreate">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="plate">Placa:</label>
                <input type="text" class="form-control" id="plate" name="plate">
              </div>
              <div class="form-group">
                <label for="container_number">Numero de contenedor:</label>
                <input type="number" class="form-control" id="container_number" name="container_number">
              </div>
              <div class="form-group">
                <label for="responsible_name">Nombre del responsable:</label>
                <input type="text" class="form-control" id="responsible_name" name="responsible_name">
              </div>
                <div class="form-group">
                    <label for="comments">Comentarios</label>
                    <textarea class="form-control" id="comments" name="comments"></textarea>
                </div>
                <div class="form-group">
                    <label for="entry">Entrada</label>
                    <input type="datetime-local" class="form-control" id="entry" name="entry" step="3600">
                </div>
                <div class="form-group">
                    <label for="departure">Salida</label>
                    <input type="datetime-local" class="form-control" id="departure" name="departure" step="3600">
                </div>
                <div class="form-group">
                <label for="shipment_type">Tipo de transporte</label>
                    <select id="shipment_type" name="shipment_type" class="form-control">
                        @foreach ($shipmentTypes as $shipmentType)
                            <option value="{{ $shipmentType->id }}">{{ ucwords($shipmentType->type) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                <label for="shipment_line">Linea de transporte</label>
                    <select id="shipment_line" name="shipment_line" class="form-control">
                        @foreach ($shipmentLines as $shipmentLine)
                            <option value="{{ $shipmentLine->id }}">{{ ucwords($shipmentLine->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-block margin-bottom" form="formCreate">Aceptar</button>
            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
@endsection