@extends('layout.general')


@section('breadcumb')
<li class="breadcrumb-item" ><a href="/tablero">Tablero</a></li>
<li class="breadcrumb-item"><a href="/Preguntas">Preguntas o Respuestas</a></li>
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


<a href="/Preguntas/create/2" class="btn btn-primary form-control" >Preguntar</a>    

{{-- @can('create', App\Models\Producto::class)
   <a href="Preguntas/create" class="btn btn-primary form-control" >Proponer</a>    
@endcan --}}

<table border="1" class="table table-striped">
<thead class="thead-dark">
        <th>Producto</th>
        <th>Comentario</th>
        <th>Acciones</th>
</thead>
<tbody class="thead-light">

@forelse ($comentarios as $comentario)
        <tr 
            @if ($comentario->tipo=="PREGUNTA")
                class="text-info"
            @else
                class="text-warning"                
            @endif
        >
            <td>
                 {{-- <img src="/prods/{{$comentario->producto->imagen}}" width="50" >  --}}
            </td>
            <td>
                {{$comentario->tipo}}:{{$comentario->cuestion}}
                         
            </td>
            <td>
                <a href="/Preguntas/{{$comentario->id}}/edit" class="btn btn-success">Moderar</a>
             
                {{-- @can('delete', $comentario) --}}
                <form action="/Preguntas/{{$comentario->id}}" method="post" style="display: inline;"  onsubmit="return confirm('Desea eliminar');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                {{-- @endcan --}}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3">Sin Preguntas registradas</td>
        </tr>
    @endforelse
 </tbody> 
</table>

@endsection