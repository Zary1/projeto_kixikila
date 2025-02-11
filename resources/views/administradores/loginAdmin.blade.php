@extends('layouts.mainAdmin')
@section('title','login')
@section('content')


<div class="admin_form">
    
        <form action="/loginAdmin" method="post">
        @csrf
            @if(session('msg'))
            <p class="mensagem_contacto">{{session('msg')}}</p>
            @endif

            <input type="text" name="email" id="" placeholder="Seu email">
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
         
            <input type="password" name="password" id="password" placeholder="Palavra pass">
            @error('password')
            <p style="color: red;">{{ $message }}</p>
            @enderror
       
        
            <button type="submit">Enviar</button>
        </form>

        
        </div>
      




@endsection