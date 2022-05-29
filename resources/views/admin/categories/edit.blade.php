@extends('admin.master')

@section('title', 'Ediar categoria')

@section('module', 'EDITAR CATEGORIA')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">EDITAR CATEGORIA</h5>
  </div>

  <div class="card-body">
    <form class="needs-validation" method="post" action="{{route('admin.categories.update',$category)}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="InputName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="InputName" name="nombre" value="{{$category->nombre}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>

<script src="{{asset('js/Validacionimputs.js')}}"></script>
@endsection