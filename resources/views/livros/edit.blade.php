<form action="{{route('livros.update',['id'=>$livro->id_livro])}}" method="post">
@csrf
@method('patch')
    Titulo: <input type="text" name="titulo" value="{{$livro->titulo}}"><br><br>
    @if( $errors->has('titulo') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Idioma: <input type="text" name="idioma" value="{{$livro->idioma}}"><br><br>
    @if( $errors->has('idioma') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Total Páginas: <input type="text" name="total_paginas" value="{{$livro->total_paginas}}"><br><br>
    @if( $errors->has('total_paginas') )
    <b style="color:red">Insira um valor válido</b><br>
    @endif
    Data Edição: <input type="date" name="data_edicao" value="{{$livro->data_edicao}}"><br><br>
    @if( $errors->has('data edicao') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    ISBN: <input type="text" name="isbn" value="{{$livro->isbn}}"><br><br>
    @if( $errors->has('isbn') )
    Deverá indicar um ISBN correto (13 carateres)
    @endif
    Observações: <textarea name="observacoes" value="{{$livro->observacoes}}"></textarea><br><br>
    @if( $errors->has('observacoes') )
    Minimo de 3 carateres
    @endif
    Imagem Capa: <input type="text" name="imagem_capa" value=""><br><br>
    @if( $errors->has('imagem capa') )
    Erro
    @endif
    Género: <input type="text" name="id_genero" value="{{$livro->id_genero}}"><br><br>
    @if( $errors->has('genero') )
    Insira o género
    @endif
    Autor(es):
    <select name="id_autor[]" multiple="multiple">
        @foreach($autores as $autor)
        <option value="{{$autor->id_autor}}"@if(in_array($autor->id_autor, $autoresLivro))selected @endif>{{$autor->nome}}</option>
        
        @endforeach
    </select>
    @if( $errors->has('autor') )
    Insira o autor
    @endif
    Sinopse: <textarea name="sinopse" value="{{$livro->sinopse}}"></textarea><br><br>
    @if( $errors->has('sinopse') )
    Minimo de 3 palavras
    @endif
     Editor(as):
    <select name="id_editora[]" multiple="multiple">
        @foreach($editoras as $editora)
        <option value="{{$editora->id_editora}}"@if(in_array($editora->id_editora, $editorasLivros))selected @endif>{{$editora->nome}}</option>
        @endforeach
    </select>
    <input type="submit" value="enviar">
</form>
    
    
    
    