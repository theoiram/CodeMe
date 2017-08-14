@extends('layouts.app')

@section('content')
    <div class="container">
      <h3 class="text-center">OPCIONES PRINCIPALES PARA CONTROL DE PRODUCTO Y TRANSPORTE</h3>
      <div class="custom-pills">
        <ul class="nav nav-pills nav-justified">
          <li class="active"><a data-toggle="pill" href="#tab1">CONTROL DE PRODUCTO <span>agregar, quitar o modificar productos</span></a></li>
          <li><a data-toggle="pill" href="#tab2">CONTROL DE TRANSPORTISTAS <span>alta, baja y modificacion de transportistas</span></a></li>
          <li><a data-toggle="pill" href="#tab3">ALTA DE TRANSPORTE <span>agregar nuevas lineas de transportes</span></a></li>
          <li><a data-toggle="pill" href="#tab4">CONSULTA DE TRANSPORTES</a></li>
        </ul>
      </div>
      <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nombre producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>
                  <button class="btn btn-primary">EDITAR</button>
                  <button class="btn btn-danger">ELIMINAR</button>
                </td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
                <td>
                  <button class="btn btn-primary">EDITAR</button>
                  <button class="btn btn-danger">ELIMINAR</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div id="tab2" class="tab-pane fade">
        </div>
        <div id="tab3" class="tab-pane fade">
        </div>
        <div id="tab4" class="tab-pane fade">
        </div>
      </div>
    </div>
@endsection