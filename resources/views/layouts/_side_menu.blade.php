<div class="col-sm-2">
  <ul class="nav nav-pills nav-stacked">
    @if (Auth::user()->role->name == "logística")
      <li role="presentation" class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Administración de usuarios</a></li>
      <li role="presentation" class="{{ Request::is('shipments') ? 'active' : '' }}"><a href="{{ route('shipments.index') }}">Alta de transportes</a></li>
    @endif
    <li role="presentation"><a href="#">Consulta de transportes</a></li>
  </ul>
</div>
