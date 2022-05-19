@extends('admin.master')

@section('title', 'Generar Venta')

@section('module', 'GENERAR VENTA')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">



<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
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
<script>
    let carrito = [];
    let idsCarrito = [];
    let cantidadesc=[];
    let preciosc=[]
    
   
    function agregarCart(producto){
        $(".tablerow").detach();
        

        let index = idsCarrito.indexOf(producto["id"]);

        if(index < 0 ){
           
            console.log(producto);
            carrito.push(producto);
            idsCarrito.push(producto["id"]);
            cantidadesc.push(1);
            preciosc.push(producto.precio);
            
        }else{
            cantidadesc[index] = cantidadesc[index] + 1;
            preciosc[index] = preciosc[index] * cantidadesc[index];
            
        }
       
        carrito.forEach(function(producto, indice, array) {
        var valores = "<tr class='tablerow'>"+
            "<td class='iden'>"+ producto["id"]+"</td>"+
            "<td>"+ producto["nombre"]+" </td>"+
            "<td>"+producto.precio+"</td>"+
            "<td class='inp'> <input id ='cinput' class='inpcan' onchange='inputChange("+producto["id"]+")' type='number' value='"+cantidadesc[indice]+"'></input></td>"+
            "<td>"+preciosc[indice]+"</td>"+
            "<td>acción</td>"+
            "</tr>";
        $('#checkOut').find('tbody').append(valores);
        })
    
    
    
    
    }

    function inputChange(id) {
        console.log('identrada',id)
        let cantidad= 0;
        $('#checkOut tbody tr').each(function () {
        
        var idc= $(this).children(".iden").html();
        console.log(idc)
        
        if(idc == id){
            
          cantidad = $(this).children(".inp").find("input").val();
          console.log(cantidad)
        }
        
        })
      
        console.log("cantidad:",cantidad);
        let index = idsCarrito.indexOf(id);
        let producto = carrito[index];
        cantidadesc[index] = cantidad;
        preciosc[index] = producto.precio * cantidad;
        console.log('cantidadefin',cantidadesc[index])
        
        let cantidadc = document.getElementById('cinput').value;

        $(".tablerow").detach();

        carrito.forEach(function(producto, indice, array) {
        var valores = "<tr class='tablerow'>"+
            "<td class='iden'>"+ producto["id"]+"</td>"+
            "<td>"+ producto["nombre"]+" </td>"+
            "<td>"+producto.precio+"</td>"+
            "<td class='inp'> <input id ='cinput' class='inpcan' onchange='inputChange("+producto["id"]+")' type='number' value='"+cantidadesc[indice]+"'></input></td>"+
            "<td>"+preciosc[indice]+"</td>"+
            "<td>acción</td>"+
            "</tr>";
        $('#checkOut').find('tbody').append(valores);
        })
    }
        
    
</script>



<div class="card">
    <div class="card-header">
        <h5 class="card-title">Venta</h5>
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-6" style="margin-bottom: 2%">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#carritoModal"><i
                            class="fa-solid fa-cart-plus"></i> Ver carrito</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-striped" id="products">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Stock</th>
                                <th>Precio</th>
                                <th>Agregar al carrito</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->nombre}}</td>
                                <td>{{$p->descripcion}}</td>
                                <td>{{$p->cantidad}}</td>
                                <td>{{$p->precio}}</td>
                                <td align="center">

                                    <button class="btn btn-lg" type="submit" onclick="agregarCart({{ $p }} )"><i
                                            class="fa-solid fa-cart-plus"></i>
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

    <div class="modal fade bd-example-modal-lg" id="carritoModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carrito de Compras</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table" id="checkOut" name="checkOut">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Quitar</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Comprar</button>
                </div>
            </div>
        </div>

    </div>

    @endsection