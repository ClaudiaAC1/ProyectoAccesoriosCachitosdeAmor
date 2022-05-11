@extends('admin.master')

@section('title', 'Nueva categoria')

@section('module', 'NUEVA CATEGORIA')

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">NUEVA CATEGORIA</h5>
  </div>

  <div class="card-body">
    <form method="post" action="{{route('admin.categories.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="InputName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="InputName" name="nombre" >
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>

  </div>
  
</div>

@endsection