<!-- TODO: validate is_active relative to active view -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ route('users.index') }}" class="{{ request('users*') ? 'is_active' : '' }}">Administración de usuarios</a>
  <a href="#">Administración de transportistas</a>
  <a href="#">Control de productos y transportes</a>
  <a href="#">Cerrar sesión</a>
</div>
<span class="open-nav" onclick="openNav()">&#9776;</span>