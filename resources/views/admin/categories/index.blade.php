@extends('admin.master')

@section('title', 'Categorias')

@section('module', 'CATEGORIAS')

@section('content')
<div class="card">

<div class=col-12>
        <h5 class="card-title" style="color: #000000;">Categorías</h5>
</div>
<div class="containes-fluid mb-4" style="color:#000000;">
    <form method="GET" action="{{route('admin.categories.index')}}"  class="row d-flex justify-content-end">
    <div class = "row">
        <div class="col-2">
            <label for="numeropaginado" class="form-label"style="color: #000000;">Número de paginado</label>
        </div>
        <div class="col-2">
            <input type="text" style="color: #000000;"class="form-control" placeholder="Número de paginado" name="numeropaginado" value="6">
        </div>
        <div class="col-3">
            <button style="color: #000000;" type="submit" class="btn btn-light d-flex ps-3 pe-3">
                <span class="me-3">&#xF479</span>
                Paginar
            </button>
        </div>
</div>
</form>
</div>

  <div class="col-12">
    <table class="table" style="color: #000000;">
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
            <a class="btn btn-warning col-5" href="{{route('admin.categories.edit', $c)}}" role="button">Editar</a>       
</td>

<td>
            <form method="post" action="{{route('admin.categories.destroy',$c)}}" class="col-6 ">
              @csrf
              @method('DELETE')
              <button type="submit" style="width: 5rem;" class="btn btn-danger">Borrar</button>
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