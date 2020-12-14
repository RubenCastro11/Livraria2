<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutoresController extends Controller
{
    //
    public function index(){
        //$autores = Autor::all()->sortbydesc('idl');
        $autores= Autor::paginate(4);
        return view('autores.index',[
            'autores'=>$autores
        ]);
    }
    public function show(Request $request){
        $idAutores = $request->ida;
        //$autores=Autor::findOrFail($idAutores);
        //$autores=Autor::find($idAutores);
        $autores=Autor::where('id_autor',$idAutores)->with('livros')->first();
        return view('autores.show',[
            'autores'=>$autores
        ]);
    }
    public function create(){
        return view('autores.create');
    }
    public function store(Request $req){
        $novoAutor = $req->validate([
            'nome'=>['nullable','min:3','max:100'],
            'nacionalidade'=>['nullable','min:1'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],
            
        ]);    
        $autor = Autor::create($novoAutor);
        
        return redirect()->route('autores.show',[
            'ida'=>$autor->id_autor
        ]);
    }
    public function edit (Request $request){
        
        $idAutor=$request->ida;
        
        $autor = autor::where('id_autor', $idAutor)->first();
        
        return view('autores.edit',[
            'autor'=>$autor
        ]);                      
                              
        
    }
    public function update (Request $request){
        
        $idLivro=$request->id;
        
        $livro = Livro::where('id_livro', $idLivro)->first();
      
        $atualizarLivro = $request->validate([
            'nome'=>['nullable','min:3','max:100'],
            'nacionalidade'=>['nullable','min:1'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],            
        ]);
        $livro->update($atualizarLivro);
        
        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
    }
}