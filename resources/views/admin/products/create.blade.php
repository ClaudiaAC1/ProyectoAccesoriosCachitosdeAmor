@extends('admin.master')

@section('title', 'Nuevo producto')

@section('module', 'NUEVO PRODUCTO')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">NUEVO PRODUCTO</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>
    <!-- Formulario para crear un producto-->
  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.products.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
      @csrf
          <!--Para introducir el nombre del producto-->
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputName" name="nombre">
      </div>
          <!--Para introducir la cantidad de existencia del producto en el negocio-->
      <div class="mb-3">
        <label for="InputCan" class="form-label">Cantidad</label><a style="color:#FF0000";>*</a>
        <input type="number" class="form-control" id="InputCan" name="cantidad">
      </div>
          <!--Para introducir el precio del producto en el negocio-->
      <div class="mb-3">
        <label for="InputPre" class="form-label">Precio</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="InputPre" name="precio">
      </div>
          <!--Para introducir la categoria -->
      <div class="mb-3">
        <label for="InputCat" class="form-label">Categoria</label><a style="color:#FF0000";>*</a>
        <select class="form-select" aria-label="Default select example" name="categoria">
          <option selected>Selecciona la categoria</option>
          @foreach($categories as $c)
          <option value="{{$c->id}}">{{$c->nombre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="Inputdes" class="form-label">Descripción</label><a style="color:#FF0000";>*</a>
        <input type="text" class="form-control" id="Inputdes" name="descripcion">
      </div>
          <!--Para introducir una imagen de archivos -->
      <div class="mb-3">
        <label for="Inputimg" class="form-label">Imagen</label><a style="color:#FF0000";>*</a>
        <input type="file" class="form-control" id="Inputimg" name="url_img">
      </div>
          <!--Para guardar información de producto -->
      <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>


</div>
<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script>
      function sololetras(e){
    key=e.KeyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();

    letras = "abcdefghijklmñnopqrstuvwxyz";
    especiales = "8-37-38-46-164"
    teclado_especial=false;
    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;break;
        }
    }
    if(letras.indexOf(teclado)==-1 && !teclado_especial){
         return false;
    }
       
}
</script>
@endsection