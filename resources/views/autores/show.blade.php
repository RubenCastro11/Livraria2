@extends('layout')
<ul>
IDA:{{$autor->id_autor}}<br>
Nome:{{$autor->nome}}<br>
    @if(count($autor->livros))
        @foreach($autor->livros as $livro)
            Livros deste autor: {{$livro->titulo}}<br>
        @endforeach
    @else  
        <div class="alert alert-danger" role="alert">
            Neste autor ainda não tem livros!
        </div>
    @endif
Nacionalidade:{{$autor->nacionalidade}}<br>
Data de Nascimento:{{$autor->data_nascimento}}
Fotografia:{{$autor->fotografia}}<br>
Created_at:{{$autor->created_at}}<br>
Updated_at:{{$autor->updated_at}}<br>
Deleted_at:{{$autor->deleted_at}}
</ul>
@if(auth()->check())
    <a href="{{route('autores.edit', ['ida'=>$autor->id_autor])}}" class="btn btn-primary"> Editar autor

 </a>
 
    <a href="{{route('autores.delete', ['ida'=>$autor->id_autor])}}" class="btn btn-primary"> Eliminar autor
</a>
 @endif   
</ul>