@extends('admin.master')

@section('title', 'Reporte de Ventas')

@section('module', 'REPORTE DE VENTAS')






@section('content')
<div class="card" style="width: 68rem; height: 30rem;">
  <div class="card-header">
    <h5 class="card-title">Reporte de las ventas</h5>
  </div>
  <div class="container-fluid mb-4">
    
        <!--Input de busqueda-->
        <div class="col-5">
            <input type="text" class="form-control" placeholder="ID del reporte" name="inputBusqueda" value="">
        </div>
        <!--Selector de Mes-->
        <div class="col-5">
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
        <div class="col-5">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputSelectorAnio">Año</label>
                <select class="form-select" id="inputSelectorAnio" name="inputSelectorAnio" value="">
                    <option value="0" selected>Seleccione un año.</option>
                    
                </select>
            </div>
        </div>

        <!--Boton de busqueda -->
        <div class="col-5">
            <button type="submit" class="btn btn-light d-flex ps-3 pe-3">
                <span class="me-3">&#128269</span>
                Buscar
            </button>
        </div>
        <div class="col-5">
            <button type="submit" class="btn btn-light d-flex ps-3 pe-3" name="resumir" id="btn-resumir" data-bs-toggle="modal" data-bs-target="#InformacionResumida">
                <span class="me-3">&#x1f4dd;</span>
                Ver reporte
            </button>
        </div>
</div>





</div>
@endsection