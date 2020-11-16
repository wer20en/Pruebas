@extends('layout.general')


@section('breadcumb')
<li class="breadcrumb-item" ><a href="#">Home</a></li>
<li class="breadcrumb-item"><a href="Categorias">Categorias</a></li>
<li class="breadcrumb-item active">Listar</li>
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

<a href="Categorias/create" class="btn btn-primary form-control" >Agregar Categoria</a>
<table border="1" class="table table-striped">
<thead class="thead-dark">
        <th>Nombre</th>
        <th>Productos</th>
        <th>Acciones</th>
</thead>
<tbody class="thead-light">
@forelse ($categorias as $categoria)
    <tr>
        <td>{{$categoria->nombre}}</td>
        <td>#</td>
        <td>
            <a href="/Categorias/{{$categoria->id}}/edit" class="btn btn-success">Editar</a>
            <a href="/Categorias/{{$categoria->id}}" class="btn btn-warning">Mostrar</a>
            <form action="/Categorias/{{$categoria->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>    
        </td>
    </tr>
@empty
    <tr>
        <td colspan="3">Sin categorias registradas</td>
    </tr>
@endforelse
</tbody> 
</table>

@endsection