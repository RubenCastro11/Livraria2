<form action="{{route('editoras.update',['id'=>$editora->id_editora])}}" method="post">
@csrf
@method('patch')  
    Editora: <input type="text" name="id_editora" value="{{$editora->editora}}"><br><br>
    @if( $errors->has('id_editora') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Nome: <input type="text" name="nome" value="{{$genero->nome}}"><br><br>
    @if( $errors->has('nome') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Observacoes: <input type="text" name="observacoes" value="{{$genero->observacoes}}"><br><br>
    @if( $errors->has('observacoes') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
    