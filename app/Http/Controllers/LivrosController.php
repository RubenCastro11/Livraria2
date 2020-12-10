<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Livro;
use App\Models\Genero;
use App\Models\Autor;
use App\Models\Editora;

class LivrosController extends Controller
{
    //
    public function index(){
        //$livros = Livro::all()->sortbydesc('idl');
        $livros= Livro::paginate(4);
        return view('livros.index',[
            'livros'=>$livros
        ]);
    }
    public function show(Request $request){
        $idLivro = $request->id;
        //$livro=Livro::findOrFail($idLivro);
        //$livro=Livro::find($idLivro);
        $livro=Livro::where('id_livro',$idLivro)->with(['genero','autores','editoras'])->first();
        return view('livros.show',[
            'livro'=>$livro
        ]);
    }
    
    public function create(){


        $generos = Genero::all();
        $autores = Autor::all();
        $editoras = Editora::all();
        return view('livros.create',[
            'generos'=> $generos,
            'autores'=> $autores,
            'editora'=> $editoras
        ]);
    }
    public function store(Request $req){

        $novoLivro = $req->validate([
           
            'titulo'=>['required', 'min:3','max:100'],
            'idioma'=>['nullable','min:3','max:20'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['nullable','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],            
        ]);
        if(Auth::check()){
            $userAtual=Auth::user()->id;
            $novolivro['id_user']=$userAtual;
        }
        $autores=$req->id_autor;
        $editoras=$req->id_editora;
        $livro = Livro::create($novoLivro);
        $livro->autores()->attach($autores);
        $livro->editoras()->attach($editoras);
        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
        
    }     
    public function edit (Request $request){
        
        $idLivro=$request->id;
        $autores = Autor::all();
        $editoras = Editora::all();
        $livro = livro::where('id_livro', $idLivro)->with('autores')->first();
        $autoresLivro=[];
        foreach($livro->autores as $autor){
            $autoresLivro[] = $autor->id_autor;
        }
         $editorasLivro=[];
        foreach($livro->editoras as $editora){
            $editorasLivro[] = $editora->id_editora;
        }
        return view('livros.edit',[
            'livro'=>$livro,
            'autores'=>$autores,
            'autoresLivro'=>$autoresLivro,
            'editoras'=>$editoras,
            'editorasLivro'=>$editorasLivro
        ]);                      
                              
        
    }
    public function update (Request $request){
        
        $idLivro=$request->id;
        
        $livro = Livro::where('id_livro', $idLivro)->first();
      
        $atualizarLivro = $request->validate([
            'titulo'=>['required', 'min:3','max:100'],
            'idioma'=>['nullable','min:3','max:20'],
            'total_paginas'=>['nullable','numeric','min:1'],
            'data_edicao'=>['nullable','date'],
            'isbn'=>['nullable','min:13','max:13'],
            'observacoes'=>['nullable','min:3','max:255'],
            'imagem_capa'=>['nullable'],
            'id_genero'=>['numeric','nullable'],
            'sinopse'=>['nullable','min:3','max:255'],            
        ]);
        $autores=$request->id_autor;
        $editoras=$request->id_editora;
        $livro->update($atualizarLivro);
        $livro->autores()->sync($autores);
        $livro->editoras()->sync($editoras);
        
        
        return redirect()->route('livros.show',[
            'id'=>$livro->id_livro
        ]);
    
        
    }
    public function delete(Request $r){
        $livro = Livro::where('id_livro', $r->id)->first();
        if(is_null($livro)){
            return redirect()->route('livros.index')
                ->with('msg', 'O livro não existe');
        }
        else{
            return view('livros.delete', ['livro'=>$livro]);
        }
    }
    public function destroy(Request $r){
        $idLivro = $r->id;
        
        $livro = livro::where('id_livro',$idLivro)->first();
        $autoresLivro=livro::where('id_livro',$idLivro)->first();
        $editorasLivro=livro::where('id_livro',$idLivro)->first();
        $livro->autores()->detach($autoresLivro);
        $livro->editoras()->detach($editorasLivro);
        $livro->delete();
        return redirect()->route('livros.index')->with('msg','Livro eliminado!');
    }
    
}
