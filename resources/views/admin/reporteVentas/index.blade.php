@extends('admin.master')

@section('title', 'Reporte de Ventas')

@section('module', 'REPORTE DE VENTAS')

@section('content')
<div class="card">
    <div class=col-12>
        <h5 class="card-title" style="color: #000000;">Reporte de las ventas</h5>
    </div>
<div class="container-fluid mb-4" style="color:#000000;">
    
        <!--Input de busqueda-->
<div class="containes-fluid mb-4" style="color:#000000;">
    <form method="GET" action="{{route('admin.reporteVentas.index')}}"  class="row d-flex justify-content-end">
      
    <div class = "row">
        <div class="col-3">
            <input type="text" style="color: #000000;"class="form-control" placeholder="ID del reporte" name="inputBusqueda" value="">
        </div>
        <!--Selector de Año-->
        <div class="col-3"style="color: #000000;">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputSelectorMes">Mes</label>
                <select class="form-select" id="inputSelectorMes" name="inputSelectorMes" value="">
                    <option value="0" selected>Seleccione un mes...</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
        </div>
        <!--Selector de Año-->
        <div class="col-3">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputSelectorAnio">Año</label>
                <select class="form-select" id="inputSelectorAnio" name="inputSelectorAnio" value="">
                    <option value="0" selected>Seleccione un año.</option>
                    @foreach($aniodisponible as $anio)
                    <option value ="{{$anio->anio}}">{{$anio->anio}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!--Boton de busqueda -->
        <div class="col-3">
            <button style="color: #000000;" type="submit" class="btn btn-light d-flex ps-3 pe-3">
                <span class="me-3">&#128269</span>
                Buscar
            </button>
        </div>
        </form>
        <!--
        <div class="col-3">
            <button type="submit" class="btn btn-light d-flex ps-3 pe-3" name="resumir" id="btn-resumir" data-bs-toggle="modal" data-bs-target="#InformacionResumida">
                <span class="me-3">&#x1f4dd;</span>
                Ver reporte
            </button>
        </div>
        -->
    </div>
</div>

<div ckass="conteiner-fluid">
    <div class="col-12">
        <table class="table"style="color: #000000;">
            <thead>
                <tr>
                    @foreach($camposTabla as $campo)
                    <th scope="col">{{$campo}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach($listaventas as $li)
        <tr>
          <th scope="row">{{$li->usuario}}</th>
          <td>{{$li->fecha}}</td>
          <td>{{$li->total}}</td>
        </tr>
        @endforeach
            </tbody>
        </table>
        {{$listaventas->links()}}
    </div>
</div>



<!-- este pedo ya no, lo traeré del controller con un for  XD
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
    </table>
</div>-->
@endsection