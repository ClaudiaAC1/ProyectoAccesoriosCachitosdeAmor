@extends('admin.master')

@section('title', 'Editar usuario')

@section('module', 'EDITAR USUARIO')


@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">EDITAR USUARIO</h5>
  </div>

  <div class="card-body">
    <form method="post" action="{{route('admin.users.update',$user)}}" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="InputName" name="nombre" value="{{$user->nombre}}">
      </div>

      <div class="mb-3">
        <label for="InputTel" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="InputTel" name="telefono" value="{{$user->telefono}}">
      </div>

      <div class="mb-3">
        <label for="InputCorreo" class="form-label">Correo Electronico</label>
        <input type="text" class="form-control" id="InputCan" name="email" value="{{$user->email}}">
      </div>

      <div class="mb-3">
        <label for="InputPass" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="InputPass" name="password" value="{{$user->password}}">
      </div>

      <div class="mb-3">
        <label for="InputPass2" class="form-label">Confirmacion de contraseña</label>
        <input type="password" class="form-control" id="InputPass2" name="pass2" value="{{$user->password}}">
      </div>

      <div class="mb-3">
        <label for="InputRol" class="form-label">Rol</label>
        <select class="form-select" aria-label="Default select example" name="rol">
          <option selected>Selecciona la categoria</option>          
          <option value="Administrador">Administrador</option>
          <option value="Cajero">Cajero</option>
                   
        </select>
      </div>
     

      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

  </div>


</div>

@endsection