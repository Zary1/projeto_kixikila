<?php

namespace App\Http\Controllers;

use App\Models\Poupanca;
use Illuminate\Http\Request;

class User extends Controller
{
    // Página inicial
    public function index()
    {
        $user = auth()->user();
        $poupanca = Poupanca::all();
        $poupancasParticipadas = $user->poupancaParticipantes->pluck('id')->toArray();

        return view('users.index', [
            'poupancas' => $poupanca,
            'poupancasParticipadas' => $poupancasParticipadas
        ]);
    }

    // Dashboard do usuário
    public function dashboard()
    {
        $user = auth()->user();

      
        $poupancaParticipantes = $user->poupancaParticipantes->map(function ($poupanca) use ($user) {
            $position = $poupanca->users->search(fn($u) => $u->id == $user->id) + 1;
            $poupanca->user_position = $position; 
            return $poupanca;
        });

        return view('users.dashboard', [
            'users' => $user,
            'poupancaparticipantes' => $poupancaParticipantes
        ]);
    }

    public function joinPoupanca($id)
    {
        $user = auth()->user();
        $poupanca = Poupanca::findOrFail($id);
    
        // Verificar se a poupança está disponível
        if (!$poupanca->disponivel) {
            return redirect()->back()->with('msg', 'Essa poupança não está mais disponível.');
        }
    
        // Verificar se o usuário já participa dessa poupança
        if ($user->poupancaParticipantes()->where('poupanca_id', $id)->exists()) {
            return redirect()->back()->with('msg', 'Já pertences a esta kixikila.');
        }
    
        // Adicionar o usuário à poupança
        $user->poupancaParticipantes()->attach($id);
    
        // Atualizar a disponibilidade caso atinja o limite
        if ($poupanca->users()->count() >= 3) {
            $poupanca->update(['disponivel' => false]);
        }
    
        return redirect('dashboard')->with('msg', 'Você ingressou na poupança.');
    }
    
    // Página "Sobre"
    public function sobre()
    {
        return view('users.sobre');
    }
}
