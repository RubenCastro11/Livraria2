<h2> deseja eliminar a editora</h2>
<h2>{{$editora->titulo}}</h2>
<form method="post" action="{{route('editoras.destroy',['id'=>$editora->id_editora])}}">
@csrf
@method('delete')
<input type="submit" value="enviar">
</form>
    