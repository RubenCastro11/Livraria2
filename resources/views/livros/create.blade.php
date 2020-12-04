<form action="{{route('livros.store')}}" method="post">
@csrf
    Titulo: <input type="text" name="titulo" value="{{old('titulo')}}"><br><br>
    @if( $errors->has('titulo') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Idioma: <input type="text" name="idioma" value="{{old('idioma')}}"><br><br>
    @if( $errors->has('idioma') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Total Páginas: <input type="text" name="total_paginas" value="{{old('total_paginas')}}"><br><br>
    @if( $errors->has('total_paginas') )
    <b style="color:red">Insira um valor válido</b><br>
    @endif
    Data Edição: <input type="date" name="data_edicao" value="{{old('data_edicao')}}"><br><br>
    @if( $errors->has('data edicao') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    ISBN: <input type="text" name="isbn" value="{{old('isbn')}}"><br><br>
    @if( $errors->has('isbn') )
    Deverá indicar um ISBN correto (13 carateres)
    @endif
    Observações: <textarea name="observacoes" value="{{old('observacoes')}}"></textarea><br><br>
    @if( $errors->has('observacoes') )
    Minimo de 3 carateres
    @endif
    Imagem Capa: <input type="text" name="imagem_capa" value="{{old('imagem_capa')}}"><br><br>
    @if( $errors->has('imagem capa') )
    Erro
    @endif
    Género: <input type="text" name="genero" value="{{old('genero')}}"><br><br>
    @if( $errors->has('género') )
    Insira o género
    @endif
    Autor(es):
    <select name="id_autor[]" multiple="multiple">
        @foreach($autores as $autor)
        <option value="{{$autor->id_autor}}"></option>
        @endforeach
    </select> 
    <br>
    @if( $errors->has('autor') )
    Insira o autor
    @endif
    Sinopse: <textarea name="sinopse" value="{{old('sinopse')}}"></textarea><br><br>
    @if( $errors->has('sinopse') )
    Minimo de 3 palavras
    @endif
     Editor(as):
    <select name="id_editora[]" multiple="multiple">
        @foreach($editora as $editoras)
        <option value="{{$editoras->id_editora}}">{{$editoras->nome}}</option>
        @endforeach
    </select>
    <input type="submit" value="enviar">
</form>
    
    
    
    
    
    
    
    