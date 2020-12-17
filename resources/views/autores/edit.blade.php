<form action="{{route('autores.update',['ida'=>$autor->id_autor])}}" method="post">
@csrf
@method('patch')     
    Nome: <input type="text" name="nome" value="{{$autor->nome}}"><br><br>
    @if( $errors->has('nome') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Nacionalidade: <input type="text" name="nacionalidade" value="{{$autor->macionalidade}}"><br><br>
    @if( $errors->has('nacionalidade') )
    <b style="color:red"> Preenchimento Obrigatótio </b><br>
    @endif
    Data Nascimento: <input type="date" name="data_nascimento" value="{{$autor->data_nascimento}}"><br><br>
    @if( $errors->has('data_nascimento') )
    <b style="color:red"> Preenchimento Obrigatótio </b><br>
    @endif
    Fotografia: <input type="text" name="fotografia" value="{{$autor->fotografia}}"><br><br>
    @if( $errors->has('fotografia') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
    