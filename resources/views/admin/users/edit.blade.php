@extends('admin.master')

@section('title', 'Editar usuario')

@section('module', 'EDITAR USUARIO')


@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title"style="color: #000000;"style="color: #000000;" >EDITAR USUARIO</h5>
    <p style="color: #000000;" > <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>

  <div class="card-body"style="color: #000000;" >
    <form class="needs-validation"style="color: #000000;"  method="post" action="{{route('admin.users.update',$user)}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre:</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" style="color: #000000;" id="InputName" name="nombre" value="{{$user->nombre}}" onKeypress="return sololetras(event)"required>
      </div>

      <div class="mb-3">
        <label for="InputTel" class="form-label">Teléfono:</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control"style="color: #000000;"  id="InputTel" name="telefono" value="{{$user->telefono}}" onKeypress="return solonumeros(event)"required>
      </div>

      <div class="mb-3">
        <label for="InputCorreo" class="form-label">Correo Electrónico:</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" style="color: #000000;" id="InputCan" name="email" value="{{$user->email}}" required>
      </div>

      <div class="mb-3">
        <label for="InputPass" class="form-label">Contraseña:</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control"style="color: #000000;"  id="InputPass" name="password" value="{{$user->password}}" required>
      </div>

      <div class="mb-3">
        <label for="InputPass2" class="form-label">Confirmación de contraseña:</label><a style="color:#FF0000";>*</a>
        <input type="password" class="form-control" style="color: #000000;" id="InputPass2" name="pass2" value="{{$user->password}}" required>
      </div>

      <div class="mb-3">
        <label for="InputRol" class="form-label">Rol</label><a style="color:#FF0000";>*</a>
        <select class="form-select" aria-label="Default select example" name="rol" required>
          <option selected disabled value="">Selecciona la categoría</option>          
          <option value="Administrador">Administrador</option>
          <option value="Cajero">Cajero</option>
                   
        </select>
      </div>
     

      <button type="submit" class="btn btn-primary">Editar</button>
    </form>

  </div>
</div>

<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script type="text/javascript" src="{{asset('js/solonumeros.js')}}"></script>
<script src="{{asset('js/sololetras.js')}}"></script>
@endsection