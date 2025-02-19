@extends('layouts.menu_dashboard')
@section('title','Kixikila')
@section('content')

<div class="div_lista_kixikila">
    <h1>Tuas Kixikilas</h1>

    <div class="container">
        @if(count($poupancaparticipantes) > 0)
            @foreach($poupancaparticipantes as $poupanca)
                <div class="card">
                    <p>{{ $poupanca->title }}</p>
                    <img src="/img/poupancas/porquinho.png" alt="Imagem do evento">
                    <p>{{ $poupanca->description }}</p>

                    <!-- Mensagem fixa da posição -->
                    <p>
                        @if($poupanca->user_position == 1)
                            Você é o <strong>primeiro</strong> a receber.
                        @elseif($poupanca->user_position == 2)
                            Você é o <strong>segundo</strong> a receber.
                        @elseif($poupanca->user_position == 3)
                            Você é o <strong>terceiro</strong> a receber.
                        @endif
                    </p>

                    <p>Valor a receber: {{ $poupanca->quantidade_geral }}€</p>
                    <p>Valor a pagar mensalmente: {{ $poupanca->quantidade_participante }}€</p>
                    <p>Número de participantes: {{ count($poupanca->users) }}</p>
                </div>
            @endforeach
        @else
            <p>Você ainda não tem eventos.</p>
        @endif
    </div>
</div>

@endsection('content')
