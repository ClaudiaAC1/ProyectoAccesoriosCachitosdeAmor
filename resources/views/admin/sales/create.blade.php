@extends('admin.master')

@section('title', 'Generar Venta')

@section('module', 'GENERAR VENTA')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">



<script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
<script>
    $(document).ready(function() {
        var table = $('#products').DataTable({
            lengthChange:false,
            paging:true,
            colReorder: true,
            responsive: true,
            autoWidth:true,
            ordering: true,
            info:false,
            language: {
                        "emptyTable": "...",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                        "infoEmpty": "Mostrando 0 de 0 Entradas",
                        "lengthMenu": "Mostrar _MENU_ registros",
                },

        });
    });
</script>



<div class="card">
    <div class="card-header">
        <h5 class="card-title">Venta</h5>
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6" style="margin-bottom: 2%">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                        data-bs-target="#carritoModal"><i class="fa-solid fa-cart-plus"></i> Ver carrito</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped" id="products">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Descripcion</th>
                                <th>Agregar al carrito</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->category->nombre}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->precio}}</td>
                                <td>{{$p->descripcion}}</td>
                                <td align="center">
                                    <button class="btn btn-lg" onclick=""><i class="fa-solid fa-cart-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="carritoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Carrito de compras</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Realizar compra</button>
                </div>
            </div>
        </div>
    </div>

    @endsection