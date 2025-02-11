@extends('layouts.mainAdmin')
@section('title','admin')
@section('content')

<div class="admin_form">
    
        <form action="/edit/poupancas/{{$poupanca->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            @if(session('msg'))
            <p class="mensagem_contacto">{{session('msg')}}</p>
            @endif()
           
            <input type="text" name="title" id="" value="{{$poupanca->title}}"
             placeholder="Titulo da kixikila">
            @error('title')
                    <p style="color: red;">{{ $message }}</p>
                @enderror

            <textarea type="text" name="description"  id="" 
            placeholder="Descrição">{{$poupanca->description}}</textarea>
            @error('description')
            <p style="color: red;">{{ $message }}</p>
            @enderror
       
         
            <input type="text" name="quantidade_geral" id="quantidade_geral" value="{{$poupanca->quantidade_geral}}"
            placeholder="Quintidade geral">
            @error('quantidade_geral')
            <p style="color: red;">{{ $message }}</p>
            @enderror
       
            <input type="text" name="quantidade_participante" value="{{$poupanca->quantidade_participante}}"
            id="quantidade_participante" placeholder="Quantidade de cada participante">
            @error('quantidade_participante')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <input type="date" name="date" id="date">
            @error('date')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">Enviar</button>
        </form>
        </div>
      




@endsection