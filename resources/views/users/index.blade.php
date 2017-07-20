@extends('layouts.app')

@section('content')
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
              @foreach ($data as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td class="text-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal" data-id="{{ $row->id }}">EDITAR</button>
                    <form method="POST" action="{{ route('users.destroy', $row->id) }}">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger" >ELIMINAR</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
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
            <form method="POST" role="form" id="formUpdate">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email">
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
            <h4 class="modal-title">Agregar usuario</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('users.store') }}" method="POST" role="form" id="formCreate">
            {{ csrf_field() }}
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email">
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