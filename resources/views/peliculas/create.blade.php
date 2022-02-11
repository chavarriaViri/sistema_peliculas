@extends('layouts.app')

@section('content')
<div class="container">

<h1>Registrar Nueva Pelicula</h1>
<br><br>
<form action="{{url('/peliculas')}}" method="post"  enctype = "multipart/form-data">
    @csrf
    @include('peliculas.form');
</form>
</div>
@endsection