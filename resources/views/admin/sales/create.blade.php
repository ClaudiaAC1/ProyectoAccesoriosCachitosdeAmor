@extends('admin.master')

@section('title', 'Generar Venta')

@section('module', 'GENERAR VENTA')

@section('content')

<link rel="stylesheet" type="text/css" href="https:cdn.datatables.net/1.12.0/css/jquery.dataTables.css">



{{-- <script src="https:code.jquery.com/jquery-3.1.0.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="https:cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>
<script src="https:cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
<script src="https:cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" crossorigin="anonymous">
</script>
<script src="https:cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="https:cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https:cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />



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
    let total =0;

    
    
   
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
            "<td class='total'>"+preciosc[indice]+"</td>"+
            "<td><button class='btn btn-lg' onclick='eliminarProducto("+producto["id"]+")'> <i class='fa-solid fa-minus-circle'></i> </button></td>"+
            "</tr>";
        $('#checkOut').find('tbody').append(valores);
        })

        getTotal()
        document.getElementById("total").value = total;

        $('.toast').toast({
        delay:2500,
        position : 'bottom-right',
        bgColor : 'primary',
        // Other options
        });

        $('#toastAgregado').toast('show');
    
    
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
            "<td class='total'>"+preciosc[indice]+"</td>"+
            "<td><button class='btn btn-lg' onclick='eliminarProducto("+producto["id"]+")'> <i class='fa-solid fa-minus-circle'></i> </button></td>"+
            "</tr>";
        $('#checkOut').find('tbody').append(valores);
        })

        getTotal()
        document.getElementById("total").value = total;
    }

    function getTotal(){
        let totalFinal = 0;
        $('#checkOut tbody tr').each(function () {
            var tot= parseInt($(this).children(".total").html())
            totalFinal = totalFinal + tot;
        })
        total = totalFinal;
    }

    function comprar(){
            if(carrito.length > 0){
                $("#mi-modal").modal('hide');
                console.log(carrito);
                console.log(cantidadesc);
                console.log(preciosc);
                console.log(idsCarrito);
        
                const data = new Object();
        
                 data.total =  total;
                 data.productos = idsCarrito;
                 data.cantidades= cantidadesc;
        
                 data._token = "{{ csrf_token() }}";
                 JSON.stringify(data)
                
                console.log("body", data)
        
                    $.post('{{route('admin.sales.store')}}' ,data, function (data,status) {
                        console.log( status );
                        $('#checkOut').find('tbody').detach()
                          carrito = [];
                          idsCarrito = [];
                          cantidadesc=[];
                          preciosc=[]
                          total =0;
                        $("#carritoModal").modal('hide');
                        $('#total').value = '';
                    })
                    .then( response => {
                    $.get('{{route('admin.sales.saleproduct')}}', function (status) {   
                        
                        window.location.href = "{{ route('admin.sales.create')}}";
                        
                    });
                    
                    })
            } else {
                $("#mi-modal").modal('hide');
            }
     
    }

    function confirmar(){
        $("#mi-modal").modal('show');
    }
    function ticket(){
        $("#mi-modal").modal('hide');

        carrito.forEach(function(producto, indice, array) {
        var valores = "<tr>"+
            "<td >"+ indice+"</td>"+
            "<td>"+ producto["nombre"]+" </td>"+
            "<td>"+cantidadesc[indice]+"</td>"+
            "<td class='total'>"+preciosc[indice]+"</td>"+
            "</tr>";
        $('#ticket_tabla').find('tbody').append(valores);
        })

   $("#ticket_total").html(total);


        $("#ticket").modal('show');
    }

    function eliminarProducto(id) {
    
    let index = idsCarrito.indexOf(id);
    carrito.splice(index,1);
    cantidadesc.splice(index,1)
    idsCarrito.splice(index,1)
    preciosc.splice(index,index+1)
    
    console.log("carrito", carrito);
    console.log("cantidades",cantidadesc);
    console.log("idscarrito",idsCarrito);
    console.log("precios",preciosc);
    console.log("totla",total);
    
    $(".tablerow").detach();
    
    carrito.forEach(function(producto, indice, array) {
    var valores = "<tr class='tablerow'>"+
        "<td class='iden'>"+ producto["id"]+"</td>"+
        "<td>"+ producto["nombre"]+" </td>"+
        "<td>"+producto.precio+"</td>"+
        "<td class='inp'> <input id='cinput' class='inpcan' onchange='inputChange("+producto["id"]+")' type='number' value='"+cantidadesc[indice]+"'></input></td>"+
        "<td class='total'>"+preciosc[indice]+"</td>"+
        "<td><button class='btn btn-lg' onclick='eliminarProducto("+producto["id"]+")'> <i class='fa-solid fa-minus-circle'></i> </button></td>"+
        "</tr>";
    $('#checkOut').find('tbody').append(valores);
    })
    
    getTotal()
    document.getElementById("total").value = total;

    
    
    }
   
        
    
</script>




<div class="card">
    <div class="card-header">
        <h5 class="card-title">Venta</h5>
    </div>

    <div class="card-body">
        <div class="container">
            <div class="row ">


                <div class="col-lg-8 col-md-6 col-sm-6" style="margin-bottom: 2%">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#carritoModal"><i
                            class="fa-solid fa-cart-plus"></i> Ver carrito</button>
                </div>
                <div class="col">
                    <div aria-live="polite" aria-atomic="true"
                        class="d-flex justify-content-center align-items-center w-100">

                        <!-- Then put toasts within -->
                        <div class="toast bg-info" role="alert" id="toastAgregado" name="toastAgregado"
                            aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded me-2" alt="...">
                                <strong class="me-auto">Cachitos de amor..</strong>
                                <small></small>
                            </div>
                            <div class="toast-body">
                                Producto agregado al carrito con éxito.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="width: 75">
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

    <div class="modal fade bd-example-modal-lg" id="carritoModal" nombre="carritoModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Carrito de Compras</h6>
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
                    <form action="route{admin.sales.saleproduct}" method="get" id="datas" name="datas">
                        @csrf
                        <div class="row">
                            <div class="col " style="text-align:right; align-items:stretch">
                                <label for="total">TOTAL:</label>
                            </div>
                            <div class=" col-md-2">
                                <input type="text" class="form-control" name="total" id="total" value="" readonly
                                    disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="comprar" onclick="confirmar()" name="comprar"
                            class="btn btn-primary">Comprar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        id="mi-modal">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="myModalLabel">Notificación</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    ¿Desea confirmar su compra?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="modal-btn-no">No</button>
                    <button type="button" onclick="ticket()" class="btn btn-success" id="modal-btn-si">Si</button>
                </div>
            </div>
        </div>
    </div>

    <div class="alert" role="alert" id="result"></div>

    <div class="modal fade" id="ticket" name='ticket' tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Ticket de compra</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    {{-- <img class="img-center img-size" mat-card-lg-image src="{{ asset('img/logo.jpg') }}"> --}}
                    <div class="text-center">

                        <h6 class="text-center"> Accesorios Cachitos de amor</h6>

                        <p> Comprobante de compra</p>
                        <p>****************************************************************** </p>
                    </div>
                    <table class="table table-borderless" id='ticket_tabla' name="ticket_tabla">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Catidad</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col " style="text-align:right; align-items:stretch">
                        <label for="">TOTAL:</label>
                    </div>
                    <div class=" col-md-2">
                        <label id='ticket_total' name="ticket_total"> </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="comprar()"
                        data-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>




    @endsection