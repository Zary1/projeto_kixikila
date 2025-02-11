@extends('layouts.main')
@section('title','Kixikila')
@section('content')

<div class="div_lista_kixikila">
<h1>Kixikila disponíveis</h1>
<div class="container_mensagem">
        <div class="row_mensagem">
        @if(session('msg'))
    <p style="text-align: center;">{{ session('msg') }}</p>
             @endif

        </div>

      </div>
<div class="container">
    @foreach($poupancas as $poupanca)
    
    <div class="card">
        <div class="div_on_off">
        <p> {{$poupanca->title}}</p>
        <p>
            @if($poupanca->disponivel)
               
                <i class="fa-solid fa-toggle-on" style="color: green;"></i>
            @else
            <i class="fa-solid fa-toggle-off" style="color: red;" ></i>
               
            @endif
        </p>
        </div>
        <img src="/img/poupancas/porquinho.png" alt="Imagem do evento">
        <p> {{$poupanca->description}}</p>  
 
        <p>Valor á receber: {{$poupanca->quantidade_geral}}€</p>   
        <p>Valor a pagar mensalmente: {{$poupanca->quantidade_participante}}€</p>   
        <p>Número de participantes: {{count($poupanca->users)}}</p>   
        

        <div class="actions">
            @if(!in_array($poupanca->id,$poupancasParticipadas))
            <form action="/poupancas/join/{{$poupanca->id}}" method="post">
            @csrf
            <a href="/poupancas/join/{{$poupanca->id}}" onclick="event.preventDefault();this.closest('form').submit()">
               Participar
              </a>
            </form>
        
               @else
              <p class="participar">A participar</p>
               @endif
        </div>
    </div>
    @endforeach
</div>
</div>




@endsection('content')