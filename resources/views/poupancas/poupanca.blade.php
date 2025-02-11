@extends('layouts.mainAdmin')
@section('title','admin')
@section('content')




<div class="div_lista_kixikila">
<h1>Lista kixikila</h1>
<div class="container_mensagem">
        <div class="row_mensagem">
        @if(session('msg'))
    <p>{{ session('msg') }}</p>
             @endif

        </div>

      </div>
<div class="container">
    @foreach($poupancas as $poupanca)
    
    <div class="card">
        <p> {{$poupanca->title}}</p>
        <img src="/img/poupancas/porquinho.png" alt="Imagem do evento">
        <p> {{$poupanca->description}}</p>  
 
        <p> {{$poupanca->quantidade_geral}}</p>   
        <p> {{$poupanca->quantidade_participante}}</p>   
       
        <div class="actions">
        <button onclick="location.href='/edit/poupancas/{{$poupanca->id}}'">
               
               <i class="fa-solid fa-pen-to-square edit"></i>
               </button> 
                <form action="/poupancas/{{$poupanca->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; padding:0; cursor:pointer;">
                        <i class="fa-solid fa-trash delete"></i>
                        </button>
                    </form>
        </div>
    </div>
    @endforeach
</div>
</div>


@endsection