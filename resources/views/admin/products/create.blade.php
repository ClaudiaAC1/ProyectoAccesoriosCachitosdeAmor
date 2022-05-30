@extends('admin.master')

@section('title', 'Nuevo producto')

@section('module', 'NUEVO PRODUCTO')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title" style="color:#000000" >NUEVO PRODUCTO</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>
    <!-- Formulario para crear un producto-->
  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.products.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
      @csrf
          <!--Para introducir el nombre del producto-->
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre:</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputName" name="nombre" onKeypress="return sololetras(event)" required>
      </div>
          <!--Para introducir la cantidad de existencia del producto en el negocio-->
      <div class="mb-3">
        <label for="InputCan" class="form-label">Cantidad:</label><a style="color:#FF0000";>*</a>
        <input type="number"placeholder="Solo cantidades positivas" class="form-control" id="InputCan" name="cantidad"required>
      </div>
          <!--Para introducir el PRECIO del producto en el negocio-->
      <div class="mb-3">
        <label for="InputPre" class="form-label">Precio:</label><a style="color:#FF0000";>*</a>
        <input type="text" placeholder="$" class="form-control" id="InputPre" name="precio" onkeypress="return solonumeros(event)" required> 
      </div>
          <!--Para introducir la categoria -->
      <div class="mb-3">
        <label for="InputCat" class="form-label">Categoria:</label><a style="color:#FF0000";>*</a>
        <select class="form-select" aria-label="Default select example" name="categoria"required>
          <option selected disabled value="">Selecciona la categoria:</option>
          @foreach($categories as $c)
          <option value="{{$c->id}}">{{$c->nombre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="Inputdes" class="form-label">Descripción:</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="Inputdes" name="descripcion" required>
      </div>
          <!--Para introducir una imagen de archivos -->
      <div class="mb-3">
        <label for="Inputimg" class="form-label">Imagen:</label><a style="color:#FF0000";>*</a>
        <input type="file" class="form-control" id="Inputimg" name="url_img" required>
      </div>
          <!--Para guardar información de producto -->
      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>


</div>
<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script type="text/javascript" src="{{asset('js/solonumeros.js')}}"></script>
<script src="{{asset('js/sololetras.js')}}"></script>
@endsection