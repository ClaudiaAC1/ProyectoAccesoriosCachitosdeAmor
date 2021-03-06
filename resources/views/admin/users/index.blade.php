@extends('admin.master')

@section('title', 'Usuarios')

@section('module', 'USUARIOS')


@section('content')
<div class="card" style="width: 68rem;">
    <div class="card-header">
        <h5 class="card-title"style="color: #000000;" >USUARIOS</h5>
    </div>

    <div class="card-body">
        <table class="table" style="color: #000000;" >
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
                    <td>{{$u->nombre}}</td>
                    <td>{{$u->telefono}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->rol}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.users.edit', $u)}}" role="button">Editar</a>
                    </td>

                    <td>
                        <form method="post" action="{{route('admin.users.destroy',$u)}}" class="col-6 ">
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