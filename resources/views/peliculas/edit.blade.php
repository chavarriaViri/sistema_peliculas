@extends('layouts.app')

@section('content')
<div class="container">
<h1>Editar Pelicula</h1>
<br><br>
<form action="{{ url('/peliculas/'.$pelicula->id) }}" method="post" enctype = "multipart/form-data">
@csrf 
{{method_field('PATCH')}}
@include('peliculas.form');
</form>

</div>
@endsection