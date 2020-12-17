<h2> deseja eliminar a editora</h2>
<h2>{{$autor->titulo}}</h2>
<form method="post" action="{{route('autores.destroy',['ida'=>$autor->id_autor])}}">
@csrf
@method('delete')
<input type="submit" value="enviar">
</form>