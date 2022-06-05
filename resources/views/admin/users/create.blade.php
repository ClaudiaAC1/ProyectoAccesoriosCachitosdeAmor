@extends('admin.master')

@section('title', 'Nuevo usuario')

@section('module', 'NUEVO USUARIO')


@section('content')
<div class="card">
  <div class="card-header"style="color: #000000;">
    <h5 class="card-title">NUEVO USUARIO</h5>
    <p style="color: #000000;" > <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>

  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.users.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="mb-3">
        <label for="InputName" class="form-label"style="color: #000000;">Nombre: </label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" style="color: #000000;"id="InputName" name="nombre" onKeypress="return sololetras(event)"required>
      </div>

      <div class="mb-3">
        <label for="InputTel" class="form-label"style="color: #000000;">Teléfono: </label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputTel"style="color: #000000;" name="telefono" onKeypress="return solonumeros(event)"required>
      </div>

      <div class="mb-3">
        <label for="InputCorreo" class="form-label"style="color: #000000;">Correo Electrónico</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" style="color: #000000;"id="InputCan" name="email" required>
      </div>

      <div class="mb-3">
        <label for="InputPass" class="form-label"style="color: #000000;">Contraseña</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control" style="color: #000000;"id="InputPass" name="password" required>
      </div>

      <div class="mb-3">
        <label for="InputPass2" class="form-label"style="color: #000000;">Confirmación de contraseña</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control" style="color: #000000;"id="InputPass2" name="pass2" required>
      </div>

      <div class="mb-3">
        <label for="InputRol" class="form-label"style="color: #000000;">Rol</label><a style="color:#FF0000";>*</a>
        <select class="form-select" style="color: #000000;"aria-label="Default select example" name="rol" required>
          <option selected disable style="color: #000000;"value="">Selecciona la categoria</option>          
          <option style="color: #000000;"value="Administrador">Administrador</option>
          <option style="color: #000000;" value="Cajero">Cajero</option>
                   
        </select>
      </div>
     

      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>


</div>
<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script type="text/javascript" src="{{asset('js/solonumeros.js')}}"></script>
<script src="{{asset('js/sololetras.js')}}"></script>
@endsection