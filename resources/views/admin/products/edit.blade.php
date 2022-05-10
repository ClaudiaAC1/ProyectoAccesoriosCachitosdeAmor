@extends('admin.master')

@section('title', 'Editar producto')

@section('module', 'EDITAR PRODUCTO')

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
        <h5 class="card-title">EDITAR PRODUCTO</h5>
    </div>

    <div class="card-body">
        <form method="post" action="{{route('admin.products.update',$product)}}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="InputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="InputName" name="nombre" value="{{$product->nombre}}">
            </div>

            <div class="mb-3">
                <label for="InputCan" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="InputCan" name="cantidad" value="{{$product->cantidad}}">
            </div>

            <div class="mb-3">
                <label for="InputPre" class="form-label">Precio</label>
                <input type="text" class="form-control" id="InputPre" name="precio" value="{{$product->precio}}">
            </div>

            <div class="mb-3">
                <label for="InputCat" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" name="categoria" value="{{$product->category_id}}">
                    @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->nombre}}</option>
                    @endforeach


                </select>
            </div>

            <div class="mb-3">
                <label for="Inputdes" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="Inputdes" name="descripcion" value="{{$product->descripcion}}">
            </div>

            <div class="mb-3">
                <label for="Inputimg" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="Inputimg" name="url_img" value="{{$product->url_img}}">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>

    </div>


</div>

@endsection