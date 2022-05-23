@extends('admin.master')

@section('title', 'Nuevo usuario')

@section('module', 'NUEVO USUARIO')


@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">NUEVO USUARIO</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>

  <div class="card-body">
    <form method="post" action="{{route('admin.users.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputName" name="nombre">
      </div>

      <div class="mb-3">
        <label for="InputTel" class="form-label">Telefono</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputTel" name="telefono">
      </div>

      <div class="mb-3">
        <label for="InputCorreo" class="form-label">Correo Electronico</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputCan" name="email">
      </div>

      <div class="mb-3">
        <label for="InputPass" class="form-label">Contraseña</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control" id="InputPass" name="password">
      </div>

      <div class="mb-3">
        <label for="InputPass2" class="form-label">Confirmacion de contraseña</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control" id="InputPass2" name="pass2">
      </div>

      <div class="mb-3">
        <label for="InputRol" class="form-label">Rol</label><a style="color:#FF0000";>*</a>
        <select class="form-select" aria-label="Default select example" name="rol">
          <option selected>Selecciona la categoria</option>          
          <option value="Administrador">Administrador</option>
          <option value="Cajero">Cajero</option>
                   
        </select>
      </div>
     

      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>


</div>

@endsection