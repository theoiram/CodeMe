@extends('layouts.app')

@section('content')
  @include('layouts._side_menu')
  <div class="col-sm-10">
    <h3>ADMINISTRACIÓN DE USUARIOS</h3>
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
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">AGREGAR USUARIO</button>
      <div class="table-responsive">          
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nombre completo</th>
              <th>Correo electrónico</th>
              <th>Permiso</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td class="text-right">
                  <button type="button" class="btn btn-success btn-block aux-btn-edit" data-toggle="modal" data-target="#editModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-role="{{ $user->role->id }}">EDITAR</button>
                  <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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
            <h4 class="modal-title">Editar usuario</h4>
          </div>
          <div class="modal-body">
            <form method="POST" role="form" id="formUpdate" action="{{ route('users.update', '') }}">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="role">Permiso</label>
                <select id="role" name="role" class="form-control">
                    <option value="0">Modifica el permiso</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
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
              <div class="form-group">
                <label for="role">Permiso</label>
                <select id="role" name="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
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