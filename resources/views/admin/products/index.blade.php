@extends('admin.master')

@section('title', 'Productos')

@section('module', 'PRODUCTOS')



@section('content')
<div class="card" style="width: 68rem;">
  <div class="card-header">
    <h5 class="card-title">PRODUCTOS</h5>
  </div>

  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Categoria</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Opciones</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $p)
        <tr>
          <th scope="row">{{$p->id}}</th>
          <td>{{$p->nombre}}</td>
          <td>{{$p->category->nombre}}</td>
          <td>{{$p->cantidad}}</td>
          <td>{{$p->precio}}</td>
          <td>{{$p->descripcion}}</td>
          <td>
            <a class="btn btn-warning " href="{{route('admin.products.edit', $p)}}" role="button">Editar</a>

          </td>
          <td>
            <form method="post" action="{{route('admin.products.destroy',$p)}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>

  <div class="card-footer">

    {{$products->links()}}
  </div>

</div>

@endsection