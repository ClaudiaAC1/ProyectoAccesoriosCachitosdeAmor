@extends('admin.master')

@section('title', 'Nueva categoria')

@section('module', 'NUEVA CATEGORÍA')

@section('content')
<div class="card">
  <div class="card-header">
<<<<<<< HEAD
    <h5 class="card-title">NUEVA CATEGORIA</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios.</p>
=======
    <h5 class="card-title"style="color: #000000;">NUEVA CATEGORÍA</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
>>>>>>> Erik
  </div>

  <div class="card-body">
    <form class="needs-validation"  method="post" action="{{route('admin.categories.store')}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
    @csrf
        <div class="mb-3">
            <label for="InputName" class="form-label">Nombre:</label><a style="color:#FF0000";>*</a>
            <input type="text" class="form-control" id="InputName" name="nombre" onKeypress="return sololetras(event)" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
  </div>
</div>

<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script type="text/javascript" src="{{asset('js/solonumeros.js')}}"></script>
<script src="{{asset('js/sololetras.js')}}"></script>
@endsection