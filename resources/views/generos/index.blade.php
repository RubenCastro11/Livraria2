@extends('layout')
@section('titulo-pagina')
Livraria
@endsection
@section('conteudo')
<ul>
{{$generos->render()}}
@foreach($generos as $genero)
<li>
<a href="{{route('generos.show', ['idg'=>$genero->id_genero])}}">
    {{$genero->designacao}}
</a></li>
@endforeach
@if(auth()->check())
    <a href="{{route('generos.create')}}" class="btn btn-primary">Adicionar genero
</a>
@endif   
</ul>
@endsection