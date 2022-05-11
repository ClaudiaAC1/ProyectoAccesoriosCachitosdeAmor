@extends('admin.master')

@section('title', 'Editar producto')

@section('module', 'EDITAR PRODUCTO')

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