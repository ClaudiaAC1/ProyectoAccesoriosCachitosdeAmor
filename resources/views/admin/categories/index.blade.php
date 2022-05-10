@extends('admin.master')

@section('title', 'Categorias')

@section('module', 'CATEGORIAS')

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
<div class="card" style="width: 68rem; height: 30rem;">
  <div class="card-header">
    <h5 class="card-title">PRODUCTOS</h5>
  </div>

  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Acciones</th>
          <th scope="col"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($categories as $c)
        <tr>
          <th scope="row">{{$c->id}}</th>
          <td>{{$c->nombre}}</td>

          <td colspam="2" class="row">
            <a class="btn btn-warning col-2" href="{{route('admin.categories.edit', $c)}}" role="button">Editar</a>

            <form method="post" action="{{route('admin.categories.destroy',$c)}}"class="col-6 ">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" >Eliminar</button>
            </form>

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

  </div>


</div>

@endsection