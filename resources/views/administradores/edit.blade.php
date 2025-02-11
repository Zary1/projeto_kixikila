@extends('layouts.mainAdmin')
@section('title','admin')
@section('content')

<div class="admin_form">
    
        <form action="/edit/admin/{{$admin->id }}" method="post">
        @csrf
        @method('PUT')
           
            @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            <input type="text" name="nome" id="" placeholder="Seu nome" value="{{$admin->nome}}">
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <input type="text" name="email" id="" placeholder="Seu email" value="{{$admin->email}}">
            @error('email')
            <p style="color: red;">{{ $message }}</p>
            @enderror
          
            <input type="text" name="phone" id="" placeholder="Seu telefone" value="{{$admin->phone}}">
            @error('phone')
            <p style="color: red;">{{ $message }}</p>
            @enderror
         
            <input type="password" name="password" id="password" placeholder="Palavra pass" value="{{$admin->password}}">
            @error('password')
            <p style="color: red;">{{ $message }}</p>
            @enderror
       
            <input type="password" name="password_confirmation" id="password_confirmation" value="{{$admin->confime_password}}"
             placeholder="Confirme sua palavra pass">
            @error('password_confirmation')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">Enviar</button>
        </form>
        </div>
      
@endsection