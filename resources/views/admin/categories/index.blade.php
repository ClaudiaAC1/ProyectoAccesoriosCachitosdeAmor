@extends('admin.master')

@section('title', 'Categorias')

@section('module', 'CATEGORIAS')

@section('content')
<div class="conteiner-fluid">
  <div class="card-header">
    <h5 class="card-title">CATEGORÍAS</h5>
  </div>

  <div class="col-12">
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

          <td colspan="2" class="row">
            <a class="btn btn-warning col-2" href="{{route('admin.categories.edit', $c)}}" role="button">Editar</a>
</td>
<td>
            <form method="post" action="{{route('admin.categories.destroy',$c)}}" class="col-6 ">
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

    {{$categories->links()}}
  </div>

</div>

@endsection