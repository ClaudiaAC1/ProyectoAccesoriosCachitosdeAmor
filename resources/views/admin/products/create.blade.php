@extends('admin.master')

@section('title', 'Nuevo producto')

@section('module', 'NUEVO PRODUCTO')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">NUEVO PRODUCTO</h5>
  </div>

  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.products.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
      @csrf
      <div class="mb-3">
        <label for="InputName" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="InputName" name="nombre" onKeypress="return sololetras(event)" required>
        <div class="valid-feedback">
      Looks good!
    </div>
      </div>

      <div class="mb-3">
        <label for="InputCan" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="InputCan" name="cantidad"required>
      </div>

      <div class="mb-3">
        <label for="InputPre" class="form-label">Precio</label>
        <input type="text" class="form-control" id="InputPre" name="precio"required>
      </div>

      <div class="mb-3">
        <label for="InputCat" class="form-label">Categoria</label>
        <select class="form-select" aria-label="Default select example" name="categoria"required>
          <option selected disabled value="">Selecciona la categoria</option>
          @foreach($categories as $c)
          <option value="{{$c->id}}">{{$c->nombre}}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="Inputdes" class="form-label">Descripción</label>
        <input type="text" class="form-control" id="Inputdes" name="descripcion" onKeypress="return sololetras(event)"required>
      </div>

      <div class="mb-3">
        <label for="Inputimg" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="Inputimg" name="url_img"required>
      </div>

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