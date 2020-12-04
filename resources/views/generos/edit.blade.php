<form action="{{route('generos.update',['id'=>$genero->id_genero])}}" method="post">
@csrf
@method('patch')    
    Designacao: <input type="text" name="designacao" value="{{$genero->designacao}}"><br><br>
    @if( $errors->has('designacao') )
    <b style="color:red">Designação incorreta</b><br>
    @endif
    Observacoes: <input type="text" name="observacoes" value="{{$genero->observacoes}}"><br><br>
    @if( $errors->has('observacoes') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>