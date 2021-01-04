<form action="{{route('editoras.update',['ide'=>$editora->id_editora])}}" method="post">
@csrf
@method('patch')  
    Editora: <input type="text" name="id_editora" value="{{$editora->editora}}"><br><br>
    @if( $errors->has('id_editora') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Nome: <input type="text" name="nome" value="{{$editora->nome}}"><br><br>
    @if( $errors->has('nome') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Observacoes: <input type="text" name="observacoes" value="{{$editora->observacoes}}"><br><br>
    @if( $errors->has('observacoes') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
    