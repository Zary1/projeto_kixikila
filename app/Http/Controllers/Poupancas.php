<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poupanca;
use Illuminate\Support\Facades\Auth;
class Poupancas extends Controller
{
    public function showPoupanca(){
        return view('poupancas.showPoupanca');
    }
    public function store(Request $request){
        $request->validate(
            [
            'title'=>'required|string|max:250',
            'description'=>'required|string',
            'quantidade_geral'=>'required|numeric',
            'quantidade_participante'=>'required|numeric',
            'date'=>'required|date'
            
            ],
            [
              'title.required'=>'preenche todos os campos' , 
              'description.required'=>'preenche todos os campos' , 
              'quantidade_geral.required'=>'preenhe apenas com número' , 
              'quantidade_participante.required'=>'preenhe apenas com número' , 
              'date.required'=>'preenche todos os campos'  
            ]
    
    
            );
            $poupanca= new Poupanca();
            $poupanca->title=$request->title;
            $poupanca->description=$request->description; 
            $poupanca->quantidade_geral=$request->quantidade_geral;  
            $poupanca->quantidade_participante=$request->quantidade_participante;  
            $poupanca->date= $request->date; 

            
           $admins_id=Auth::guard('admin')->user();
           $poupanca->admins_id=$admins_id->id;
      
            $poupanca->save();
            return redirect('/poupanca')->with('msg','Obrigada!entraremos em contacto brevemente.');
    }

    public function poupanca(){

        $poupanca=Poupanca::all();

        return view('poupancas.poupanca',['poupancas'=>$poupanca]);
    }

    public function destroy($id){
        $poupanca=Poupanca::findOrFail($id);
        $poupanca->delete();
        return redirect('poupanca');
    }

    public function showEdit($id){
        $poupanca=Poupanca::findOrFail($id);
        return view('poupancas.edit',['poupanca'=>$poupanca]);
       
    }
    public function update(Request $request,$id){
        $request->validate(
            [
            'title'=>'string|max:250',
            'description'=>'string',
            'quantidade_geral'=>'numeric',
            'quantidade_participante'=>'numeric',
            'date'=>'Date'
            
            ],
            [
                
               
                'quantidade_geral.numeric' => 'O campo telefone deve conter apenas números.', 
                'quantidade_participante.numeric' => 'O campo telefone deve conter apenas números.', 
            
            
              
            ]
            );
        $data=$request->all();
        Poupanca::findOrFail($id)->update($data);
        return redirect('poupanca');


    }
}
