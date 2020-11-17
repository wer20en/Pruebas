@extends('layout.general')


@section('breadcumb')
<li class="breadcrumb-item" ><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="/Productos">Productos</a></li>
<li class="breadcrumb-item active" aria-current="page">Listar</li>
@endsection


@section('content')
@if (session('mensaje'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<a href="Productos/create" class="btn btn-primary form-control" >Proponer</a>
<table border="1" class="table table-striped">
<thead class="thead-dark">
        <th>Producto</th>
        <th>Precio</th>
        <th>Acciones</th>
</thead>
<tbody class="thead-light">
    @forelse ($productos as $producto)
        <tr @if ($producto->concesionado!=1)
            class="text-muted"
        @endif>
            <td>{{$producto->nombre}} <img src="/prods/{{$producto->imagen}}" width="50" ></td>
            <td>{{$producto->precio}}</td>
            <td>
                <a href="/Productos/{{$producto->id}}/edit" class="btn btn-success">Editar</a>
                <a href="/Productos/{{$producto->id}}" class="btn btn-warning">Mostrar</a>
                @can('delete', $producto)
                <form action="/Productos/{{$producto->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                @endcan
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Sin productos registrados</td>
        </tr>
    @endforelse
</tbody> 
</table>
@endsection