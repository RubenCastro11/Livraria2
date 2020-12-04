<form action="{{route('generos.store')}}" method="post">
@csrf
    Designacao: <input type="text" name="designacao" value="{{old('designacao')}}"><br><br>
    @if( $errors->has('designacao') )
    <b style="color:red">Designação incorreta</b><br>
    @endif
    Observacoes: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if( $errors->has('observacoes') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
    
    
    
    
    
    
    
    