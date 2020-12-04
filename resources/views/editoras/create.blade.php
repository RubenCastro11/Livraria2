<form action="{{route('editoras.store')}}" method="post">
@csrf
    Editora: <input type="text" name="id_editora" value="{{old('id_editora')}}"><br><br>
    @if( $errors->has('id_editora') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Nome: <input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if( $errors->has('nome') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Observacoes: <input type="text" name="observacoes" value="{{old('observacoes')}}"><br><br>
    @if( $errors->has('observacoes') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    
    <input type="submit" value="enviar">
</form>
    