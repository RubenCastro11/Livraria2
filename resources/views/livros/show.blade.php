@extends('layout')
<ul>
ID:{{$livro->id_livro}}<br>
Titulo:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
ISBN:{{$livro->isbn}}<br>
Data Edição:{{$livro->data_edicao}}<br>
Total paginas:{{$livro->total_paginas}}<br>
Observações:{{$livro->observacoes}}<br>
Imagem Capa:<br>
@if(isset($livro->imagem_capa))
<img src="{{asset('imagens/livros/'.$livro->imagem_capa)}}">
<br>
<br>
@endif

@if(count($livro->editoras)>0)
        @foreach($livro->editoras as $editora)
        Data Edição:{{$editora->nome}}<br>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
        Sem o nome do editora definido
        </div>
    @endif

    @if(isset ($livro->genero->designacao))
        Genero:{{$livro->genero->designacao}}<br>
    @else
        <div class="alert alert-danger" role="alert">
        Sem género definido
        </div>
    @endif
    
    @if(count($livro->autores)>0)
        @foreach($livro->autores as $autor)
            Autor:{{$autor->nome}}<br>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
        Sem o nome do autor definido
        </div>
    @endif

Sinopse:{{$livro->sinopse}}<br>


@if(auth()->check())
    <a href="{{route('livros.edit', ['id'=>$livro->id_livro])}}" class="btn btn-primary"> Editar livro

</a>
    <a href="{{route('livros.delete', ['id'=>$livro->id_livro])}}" class="btn btn-primary"> Eliminar livro
   
</a>
@endif
</ul>                       