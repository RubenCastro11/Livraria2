<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Editora;

class EditorasController extends Controller
{
    //
    public function index(){
        //$editoras = Editora::all()->sortbydesc('idl');
        $editoras= Editora::paginate(4);
        return view('editoras.index',[
            'editoras'=>$editoras
        ]);
    }
    public function show(Request $request){
        $idEditora = $request->ide;
        //$editora=Editora::findOrFail($idEditora);
        //$editora=Editora::find($idEditora);
        $editora=Editora::where('id_editora',$idEditora)->with('livros')->first();
        return view('editoras.show',[
            'editora'=>$editora
        ]);
        }
    public function create(){
        if(Gate::allows('admin')){

        return view('editoras.create');
        }
        else{
            return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }         
        
    }
    public function store(Request $req){
        if(Gate::allows('admin')){

        $novoEditora = $req->validate([
            'nome'=>['nullable','min:3','max:100'],
            'nacionalidade'=>['nullable','min:1'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],
            
        ]);    
        $editora = Editora::create($novoEditora);
        
        return redirect()->route('editoras.show',[
            'ide'=>$editora->id_editora
        ]);
    }
    else{
        return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
    }
    }         

    public function edit (Request $request){
        if(Gate::allows('admin')){
        $idEditora=$request->ide;
        
        $editora = Editora::where('id_editora', $idEditora)->first();
        
        return view('editoras.edit',[
            'editora'=>$editora
        ]); 
        }
        else{
            return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }                       

                              
        
    }
    public function update (Request $request){
        if(Gate::allows('admin')){
        
        
        $idEditora=$request->ide;
        
        $editora = Editora::where('id_editora', $idEditora)->first();
      
        $atualizarEditora = $request->validate([
            'nome'=>['nullable','min:3','max:100'],
            'nacionalidade'=>['nullable','min:1'],
            'data_nascimento'=>['nullable','date'],
            'fotografia'=>['nullable'],
                    
        ]);
        $editora->update($atualizarEditora);
        
        return redirect()->route('editoras.show',[
            'ide'=>$editora->id_editora
        ]); 
    }
    else{
        return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
    }                 
    }
    public function delete(Request $r){
        if(Gate::allows('admin')){
        $id_editora=$r->ide;
        $editora=Editora::where('id_editora',$id_editora)->first();
        if(is_null($editora)){
            return redirect()->route('editoras.index');

        }
        else
        {
            return view('editoras.delete',[
                'editora'=>$editora
            ]);
        }
    } 
    else{
        return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
    }
    }               
    public function destroy(Request $r){
        if(Gate::allows('admin')){
        $id_editora=$r->ide;
        $editora=Editora::where('id_editora',$id_editora)->first();
        if(is_null($editora)){
            return redirect()->route('editoras.index');

        }
        else
        {
            $editora->delete();
            return redirect()->route('editoras.index')->with('msg',"Editora eliminada!");
        }  
        }
        else{
            return redirect()->route('editoras.index')->with('msg','Não tem permissão para aceder á área pretendida');
        }

    }
}
