@extends('admin.master')

@section('title', 'Usuarios')

@section('module', 'USUARIOS')

@section('lista-admin')

<div class="sidebar-heading">
    Administrador
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item ">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Acciones privilegiadas</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Crear usuario</a>
            <a class="collapse-item" href="#">Ver usuarios</a>

        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
@endsection

@section('content')
<div class="card" style="width: 68rem; height: 30rem;">
    <div class="card-header">
        <h5 class="card-title">USUARIOS</h5>
    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo Electronico</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Opciones</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                <tr>
                    <th scope="row">{{$u->id}}</th>
                    <td>{{$u->name}}</td>
                    <td>{{$u->telefono}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->rol}}</td>
                    <td colspam="2" class="row">
                        <a class="btn btn-warning col-4" href="{{route('admin.users.edit', $u)}}" role="button">Editar</a>

                        <form method="post" action="#" class="col-6 ">
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


</div>

@endsection