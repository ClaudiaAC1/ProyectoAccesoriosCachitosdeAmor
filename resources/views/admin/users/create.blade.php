@extends('admin.master')

@section('title', 'Nuevo usuario')

@section('module', 'NUEVO USUARIO')

@section('lista-admin')
<!-- 
 auth()->user()->rol     (1:admi, 2:empleado)
  IMPLEMENTAR COLUMNA DE ROL EN EL MODELO DE USER
 -->
<!-- Heading -->
<div class="sidebar-heading">
  Administrador
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Acciones privilegiadas</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#">Crear usuario</a>
      <a class="collapse-item" href="#">Ver usuarios</a>

    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">NUEVO USUARIO</h5>
  </div>

  <div class="card-body">
    <form method="post" action="{{route('admin.users.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="InputName" name="name">
      </div>

      <div class="mb-3">
        <label for="InputTel" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="InputTel" name="tel">
      </div>

      <div class="mb-3">
        <label for="InputCorreo" class="form-label">Correo Electronico</label>
        <input type="text" class="form-control" id="InputCan" name="email">
      </div>

      <div class="mb-3">
        <label for="InputPass" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="InputPass" name="pass">
      </div>

      <div class="mb-3">
        <label for="InputPass2" class="form-label">Confirmacion de contraseña</label>
        <input type="password" class="form-control" id="InputPass2" name="pass2">
      </div>

      <div class="mb-3">
        <label for="InputRol" class="form-label">Rol</label>
        <select class="form-select" aria-label="Default select example" name="rol">
          <option selected>Selecciona la categoria</option>
          
          <option value="1">Administrador</option>
          <option value="2">Dueño</option>
          <option value="3">Cajero</option>
                   
        </select>
      </div>

     

      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>


</div>

@endsection