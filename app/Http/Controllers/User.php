<?php

namespace App\Http\Controllers;
use App\Models\Poupanca;
use Illuminate\Http\Request;

class User extends Controller
{
    public function index(){
        $user=auth()->user();
        $poupanca=Poupanca::all();
        $poupancasParticipadas=$user->poupancaParticipantes->pluck('id')->toArray();

        return view('users.index',['poupancas'=>$poupanca,'poupancasParticipadas'=>$poupancasParticipadas]);
    }


    public function dashboard(){
        $user=auth()->user();
        // $poupanca=$user->poupanca;  
        $poupancaParticipantes=$user->poupancaParticipantes;  
     
        return view('users.dashboard',['users'=>$user,'poupancaparticipantes'=> $poupancaParticipantes]); 
    }
   public function joinPoupanca($id){

    $user=auth()->user();
    $poupanca = Poupanca::findOrFail($id);
    if(!$poupanca->disponivel){
        return redirect()->back()->with('msg', 'Essa poupança não está mais disponível.');
    }
    $currentParticipants = $poupanca->users()->count();
    if($currentParticipants>=3){
        $poupanca->disponivel = false;
        $poupanca->save();
        return redirect()->back()->with('msg', 'Essa poupança já atingiu o limite de participantes.');
    }
    if($user->poupancaParticipantes()->where('poupanca_id',$id)->exists()){
       return redirect()->back()->with('msg','ja pertences a esta kixikila');
    }
    $user->poupancaParticipantes()->attach($id);
    Poupanca::findOrfail($id);
    return redirect('dashboard')->with('msg','presenca confirmadada');;
   }



   public function sobre(){
    return view('users.sobre');
   }
}

