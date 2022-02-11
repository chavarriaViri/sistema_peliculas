
@if(count($errors)>0)
<ul>
    @foreach($errors->all() as $error)
        <li>{$error}</li>
    @endforeach
</ul>
@endif

<label>Nombre</label>
    <br>
    <input type="text" name = "Nombre" value = "{{isset($pelicula->Nombre)?$pelicula->Nombre:'' }}" id = "Nombre">
    <br><br>
    <label>Poster</label>
    <br>
    @if(isset($pelicula->Poster))
    <img src= "{{asset('storage'.'/'.$pelicula->Poster)}}" width="100" alt="">
    @endif
    <input type="file" name = "Poster" value = "" id = "Poster">
    <br><br>
    <label>Duracion</label>
    <br>
    <input type="text" name = "Duracion" value = "{{isset($pelicula->Duracion)?$pelicula->Duracion:'' }}" id = "Duracion"> 
    <br><br>
    <label>Clasificacion</label>
    <br>
    <input type="text" name = "Clasificacion" value = "{{isset($pelicula->Clasificacion)?$pelicula->Clasificacion:'' }}" id = "Clasificacion">

    <br><br>
    <input type="Submit" value="Guardar datos" class="btn btn-primary">
    <a href="{{ url('peliculas/')}}" class="btn btn-primary" >Regresar</a>

    <br>
