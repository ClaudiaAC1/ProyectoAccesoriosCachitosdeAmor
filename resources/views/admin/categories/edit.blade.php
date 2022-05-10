@extends('admin.master')

@section('title', 'Ediar categoria')

@section('module', 'EDITAR CATEGORIA')

@section('lista-admin')
<!-- 
 auth()->user()->rol     (1:admi, 2:empleado)
  IMPLEMENTAR COLUMNA DE ROL EN EL MODELO DE USER
 -->
<!-- Heading -->
<div class="sidebar-heading">
  Administrador
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Acciones privilegiadas</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="#">Crear usuario</a>
      <a class="collapse-item" href="#">Ver usuarios</a>

    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    <h5 class="card-title">EDITAR CATEGORIA</h5>
  </div>

  <div class="card-body">
    <form method="post" action="{{route('admin.categories.update',$category)}}" accept-charset="UTF-8" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="InputName" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="InputName" name="nombre" value="{{$category->nombre}}" >
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

  </div>
  
</div>

@endsection