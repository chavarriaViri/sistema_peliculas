@extends('layouts.app')

@section('content')
<div class="container">

<a href="{{ url('peliculas/create')}}" class="btn btn-primary"> NUEVA PELICULA</a
<br><br><br>
<table class="table table-dark">

    <thead >
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Poster</th>
            <th>Duracion</th>
            <th>Clasificacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$pelicula ->id}}</td>
            <td>{{$pelicula -> Nombre}}</td>
            <td>
                <img src= "{{asset('storage'.'/'.$pelicula->Poster)}}" width="100" att="">
            </td>
            <td>{{$pelicula -> Duracion}}</td>
            <td>{{$pelicula -> Clasificacion}}</td>
            <td>
            <a href = "{{url('/peliculas/'.$pelicula->id.'/edit')}}" class="btn btn-primary"> Editar </a>    
             
                
            <form action = "{{url('/peliculas/'.$pelicula->id)}}" method = "post">
            @csrf
            {{method_field ('DELETE')}}
            <br>
            <input type="submit" onclick ="return confirm('¿Quieres eliminarlo?') " value="Eliminar"  class="btn btn-danger">  
            
            </form>
            
             </td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection