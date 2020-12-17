<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    //
    public function index(){
        //$generos = Genero::all()->sortbydesc('idl');
        $generos= Genero::paginate(4);
        return view('generos.index',[
            'generos'=>$generos
        ]);
    }
    public function show(Request $request){
        $idgenero = $request->idg;
        //$genero=Genero::findOrFail($idgenero);
        //$genero=Genero::find($idgenero);
        $genero=Genero::where('id_genero',$idgenero)->with('livros')->first();
        return view('generos.show',[
            'genero'=>$genero
        ]);
    }
    public function create(){
        if(Gate::allows('admin')){
        
        return view('generos.create');
        }
        else{
            return redirect()->route('livros.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }         
    }
    public function store(Request $req){
        $novoGenero = $req->validate([
            'designacao'=>['required','min:3','max:255'],
            'observacoes'=>['nullable','min:1'],         
        ]);
        $genero = Genero::create($novoGenero);
        
        return redirect()->route('generos.show',[
            'idg'=>$genero->id_genero
        ]);
        
    } 
    public function edit (Request $request){
        if(Gate::allows('admin')){
        $idGenero=$request->idg;
        
        $genero = genero::where('id_genero', $idGenero)->first();
        
        return view('generos.edit',[
            'genero'=>$genero
        ]);                      
        }
        else{
            return redirect()->route('livros.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }                              
        
    }
    public function update (Request $request){
        if(Gate::allows('admin')){
        
        $idGenero=$request->idg;
     
        $genero = Genero::where('id_genero', $idGenero)->first();

      
        $atualizarGenero = $request->validate([
            'designacao'=>['required','min:3','max:255'],
            'observacoes'=>['nullable','min:1'],   
                   
        ]);
        $genero->update($atualizarGenero);
        
        return redirect()->route('generos.show',[
            'id'=>$genero->id_genero
        ]);
        }
        else{
            return redirect()->route('livros.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }               
    }
    public function delete(Request $r){
        if(Gate::allows('admin')){
        $id_genero=$r->idg;
        $genero=Genero::where('id_genero',$id_genero)->first();
        if(is_null($genero)){
            return redirect()->route('generos.index');

        }
        else
        {
            return view('generos.delete',[
                'genero'=>$genero
            ]);
        }
        
    }
    else{
        return redirect()->route('livros.index')->with('msg','Não tem permissão para aceder á área pretendida');
    }               

    }
}
