<form action="{{route('autores.store')}}" method="post">
@csrf
    Nome: <input type="text" name="nome" value="{{old('nome')}}"><br><br>
    @if( $errors->has('nome') )
    <b style="color:red">Preenchimento Obrigatótio</b><br>
    @endif
    Nacionalidade: <input type="text" name="nacionalidade" value="{{old('nacionalidade')}}"><br><br>
    @if( $errors->has('nacionalidade') )
    <b style="color:red"> Preenchimento Obrigatótio </b><br>
    @endif
    Data Nascimento: <input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"><br><br>
    @if( $errors->has('data_nascimento') )
    <b style="color:red"> Preenchimento Obrigatótio </b><br>
    @endif
    Fotografia: <input type="text" name="fotografia" value="{{old('fotografia')}}"><br><br>
    @if( $errors->has('fotografia') )
    <b style="color:red"> Minimo de 3 carateres</b><br>
    @endif
    <input type="submit" value="enviar">
</form>
    