@extends('layouts.menu_dashboard')
@section('title','Kixikila')
@section('content')


<div class="div_lista_kixikila">
<h1>Tuas Kixikilas</h1>
<div class="container_mensagem">
     
       
        <div class="container">
@if(count($poupancaparticipantes) > 0)


    @foreach($poupancaparticipantes as $poupanca)
    <div class="card">
        <p> {{$poupanca->title}}</p>
        <img src="/img/poupancas/porquinho.png" alt="Imagem do evento">
        <p> {{$poupanca->description}}</p>  
 
        <p>Valor á receber: {{$poupanca->quantidade_geral}}€</p>   
        <p>Valor a pagar mensalmente: {{$poupanca->quantidade_participante}}€</p>   
        <p>Número de participantes: {{count($poupanca->users)}}</p> 
    
    </div>
    @endforeach


    @else
    <p>Voce ainda não tem eventos</p>
    @endif
</div>




@endsection('content')