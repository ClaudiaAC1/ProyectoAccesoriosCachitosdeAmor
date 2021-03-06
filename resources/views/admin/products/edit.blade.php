@extends('admin.master')

@section('title', 'Editar producto')

@section('module', 'EDITAR PRODUCTO')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title" style="color: #000000;">EDITAR PRODUCTO</h5>
        <p style="color: #000000;"> <a style="color:#FF0000";>*</a>  Campos obligatorios</p>
    </div>

    <div class="card-body">
        <form class="needs-validation" method="post" action="{{route('admin.products.update',$product)}}" accept-charset="UTF-8" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <!--Para introducir el nombre del producto en el negocio.-->
            <div class="mb-3">
                <label for="InputName" class="form-label"style="color: #000000;">Nombre:</label><a style="color:#FF0000";>*</a>
                <input type="text" class="form-control" id="InputName" name="nombre" value="{{$product->nombre}}"  onKeypress="return sololetras(event)" required>
            </div>
            <!--Para introducir la cantidad del producto en el negocio.-->

            <div class="mb-3">
                <label for="InputCan" class="form-label"style="color: #000000;">Cantidad:</label><a style="color:#FF0000";>*</a>
                <input type="number" class="form-control" placeholder="Solo cantidades mayores a 0" style="color: #000000;" id="InputCan" name="cantidad" value="{{$product->cantidad}}"  onKeypress="return solonumeros(event)"required>
            </div>
                    <!--Para introducir el PRECIOdel producto en el negocio.-->
            <div class="mb-3">
                <label for="InputPre" class="form-label"style="color: #000000;">Precio:</label><a style="color:#FF0000";>*</a>
                <input type="text" class="form-control" id="InputPre" name="precio" style="color: #000000;" value="{{$product->precio}}" required>
            </div>
            <!--Para introducir la categoria del producto en el negocio.-->

            <div class="mb-3">
                <label for="InputCat" class="form-label"style="color: #000000;">Categor??a:</label><a style="color:#FF0000";>*</a>
                <select class="form-select" aria-label="Default select example" style="color: #000000;"name="categoria" value="{{$product->category_id}}"  required>
                    @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->nombre}}</option>
                    @endforeach


                </select>
            </div>
            <!--Para introducir la descripcion del producto en el negocio.-->

            <div class="mb-3">
                <label for="Inputdes" class="form-label"style="color: #000000;">Descripci??n:</label>
                <input type="text" class="form-control" id="Inputdes" name="descripcion" value="{{$product->descripcion}}" required>
            </div>
            <!--Para introducir la imagen del producto en el negocio.-->

            <div class="mb-3">
                <label for="Inputimg" class="form-label"style="color: #000000;">Imagen del Producto:</label>
                <input type="file" class="form-control" style="color: #000000;"id="Inputimg" name="url_img" value="{{$product->url_img}}"required>
            </div>
            <!--BOTON CONFIRMAR.-->
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>


<script src="{{asset('js/Validacionimputs.js')}}"></script>
@endsection