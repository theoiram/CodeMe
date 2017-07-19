@section('content')
<div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#" class="is_active">Administración de usuarios</a>
      <a href="#">Administración de transportistas</a>
      <a href="#">Control de productos y transportes</a>
      <a href="#">Cerrar sesión</a>
    </div>
    <span class="open-nav" onclick="openNav()">&#9776;</span>

    <div class="container">
      <h3>ADMINISTRACIÓN DE USUARIOS</h3>
      <div class="info-container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">AGREGAR USUARIO</button>
        <div class="table-responsive">          
          <table class="table table-striped">
            <thead>
              <tr>
                <th>id</th>
                <th>Nombre completo</th>
                <th>Correo electrónico</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Oliver Atom</td>
                <td>oliver@niupi.com</td>
                <td class="text-right">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal">EDITAR</button>
                  <button type="button" class="btn btn-danger">ELIMINAR</button>
                </td>
              </tr>
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
            <h4 class="modal-title">Editar usuario</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST" role="form">
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-block margin-bottom">Aceptar</button>
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
            <h4 class="modal-title">Agregar usuario</h4>
          </div>
          <div class="modal-body">
            <form action="" method="POST" role="form">
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-block margin-bottom">Aceptar</button>
            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
@endsection