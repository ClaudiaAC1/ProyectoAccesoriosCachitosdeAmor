@extends('admin.master')

@section('title', 'Editar categoria')

@section('module', 'EDITAR CATEGORÍA')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">EDITAR CATEGORÍA</h5>
    <p> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
  </div>

  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.categories.update',$category)}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="InputName" class="form-label">Nombre:</label><a style="color:#FF0000";>*</a>
            <input type="text" class="form-control" id="InputName" name="nombre" value="{{$category->nombre}}"  onKeypress="return sololetras(event)" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>

<script src="{{asset('js/Validacionimputs.js')}}"></script>
<script type="text/javascript" src="{{asset('js/solonumeros.js')}}"></script>
<script src="{{asset('js/sololetras.js')}}"></script>
@endsection