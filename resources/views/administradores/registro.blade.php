@extends('layouts.mainAdmin')
@section('title','registrar')
@section('content')

<div class="titulo_formulario">
<h1>Preenche o formulário</h1>
</div>
<div class="admin_form">
    
        <form action="/registroAdmin" method="post">
        @csrf
            @if(session('msg'))
            <p class="mensagem_contacto">{{session('msg')}}</p>
            @endif()
            @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            <input type="text" name="name" id="" placeholder="Seu nome">

            <input type="text" name="email" id="" placeholder="Seu email">
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
          
            <input type="text" name="phone" id="" placeholder="Seu telefone">
            @error('phone')
            <p style="color: red;">{{ $message }}</p>
            @enderror
         
            <input type="password" name="password" id="password" placeholder="Palavra pass">
            @error('password')
            <p style="color: red;">{{ $message }}</p>
            @enderror
       
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm palavra pass">
            @error('password_confirmation')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">Enviar</button>
        </form>
        </div>
      




@endsection