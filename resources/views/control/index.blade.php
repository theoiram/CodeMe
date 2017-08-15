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
      <!-- ///////////////////////////////////////////////////////////////////////////    -->
        <div id="tab2" class="tab-pane fade">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id Transportista</th>
                  <th>Nombre Transportista</th>
                  <th>Correo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>011</td>
                  <td>Doe James</td>
                  <td>james@example.com</td>
                  <td>
                    <button class="btn btn-primary">EDITAR</button>
                    <button class="btn btn-danger">ELIMINAR</button>
                  </td>
                </tr>
                <tr>
                  <td>001</td>
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



<!-- ////////////////////////////////////////////////////////////////////////////////////////////   -->
        <div id="tab3" class="tab-pane fade">
          <form class="form-horizontal">
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="dropdown">
                       <p>Tipo de Transportista</p>
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Seleccionar
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                  </div>

                <div class="dropdown col-sm-6">
                   <p>Linea de Transporte</p>
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Seleccionar
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu" style="    width: 100%; text-align: center;">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                  </ul>
                </div>

                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="col-sm-6 dropdown" style="padding: 0">
                       <p>Placa camion</p>
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Seleccionar
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                    <div class="col-sm-6 dropdown" style="padding: 0">
                       <p>Numero de caja</p>
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Seleccionar
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group" style="margin-right: 0; margin-left: 0;">
                      <p>Nombre responsable</p>
                        <input class="form-control" id="disabledInput" type="text" placeholder="..." disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="dropdown">
                       <p>Tipo de Transporte</p>
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Seleccionar
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="col-sm-6">
                      <p>Fecha y hora salida</p>
                      <input type="text" name="date" value="10/24/1994" />
                    </div>

                    <div class="col-sm-6">
                      <p>Fecha y hora salida</p>
                      <input type="text" name="date" value="10/24/1994" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-sm-12">
                    <label for="comment">Comentarios:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                  </div>
                </div>

              </div>
            </div>
          </form>
        </div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////   -->
        <div id="tab4" class="tab-pane fade">
        </div>
      </div>
    </div>


    <script type="text/javascript">
    $(function() {
        $('input[name="birthdate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        },
        function(start, end, label) {
            var years = moment().diff(start, 'years');
            alert("You are " + years + " years old.");
        });
    });
    </script>
      </div>
    </div>
@endsection
