@extends('layouts.main')
@section('title','Kixikila')
@section('content')
<div class="bannerSobre">

<img src="/img/banner.png" alt="">
    <div class="textoBanner">
 <div class="info_banner">
 <h1>Sobre nós</h1>
<p >Somos um grupo dedicado a tornar a poupança mais leve, prática e organizada.
    A kixikila funciona da seguinte forma:um grupo de 3
     ou mais participantes se reúne para criar uma poupança compartilhada. Cada integrante contribui com um valor fixo mensal – por exemplo, 1000€. Ao final de cada mês, um dos participantes recebe o montante total do grupo (neste caso, 3000€). 
    Este processo continua até que todos tenham recebido a 
    sua parte.</p>
    <div class="div_facaParte">
    <a href="/utente" class="linkEventos">Faça parte de um grupo!</a>
    </div>

 </div>

<div class="euros">
     <!-- <i class="fa-solid fa-money-bill-wave euro"></i> -->
  <img src="/img/image.png" class="euro" alt="">
  <img src="/img/image.png" class="euro" alt="">
  <img src="/img/image.png" class="euro" alt="">
  <img src="/img/image.png" class="euro" alt="">
  <img src="/img/image.png" class="euro" alt="">

   
        </div>
    </div>
</div>
<div class="money-animation">
    <i class="fa-solid fa-sack-dollar center-icon"></i>
    <div class="notes">
        <i class="fa-solid fa-money-bill-wave note" style="--i: 1;"></i>
        <i class="fa-solid fa-money-bill-wave note" style="--i: 2;"></i>
        <i class="fa-solid fa-money-bill-wave note" style="--i: 3;"></i>
        <i class="fa-solid fa-money-bill-wave note" style="--i: 4;"></i>
        <i class="fa-solid fa-money-bill-wave note" style="--i: 5;"></i>
        <i class="fa-solid fa-money-bill-wave note" style="--i: 6;"></i> 
        <i class="fa-solid fa-money-bill-wave note" style="--i: 7;"></i> 
        <i class="fa-solid fa-money-bill-wave note" style="--i: 8;"></i> 
    </div>
    </div>
<div class="contacto" id="contato">

        <div class="contacto_info">
        <h1>  Contacto</h1>
        <p>Entre em contacto para obter mais informações não perca mais tempo, venha fazer parte da nossa equipa.</p>
       <div class="div_info_contacto"><i class="fa-solid fa-phone"></i><p>+3159808938</p></div> 
        <div class="div_info_contacto"><i class="fa-solid fa-location-dot"></i><p>rua dom jose , Aveiro</p></div> 
       <div class="div_info_contacto"><i class="fa-solid fa-envelope"></i><p>email:kixilila@hotmail.com</p></div> 
        </div>
        <div class="contacto_form">
        <form action="/contactoForm" method="post">
            @if(session('msg'))
            <p class="mensagem_contacto">{{session('msg')}}</p>
            @endif()
            @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="erros_form_contacto">{{$error}}*</p>
            @endforeach()

            @endif()
        @csrf

            <input type="text" name="name" id="" placeholder="Seu nome">
            <input type="text" name="email" id="" placeholder="Seu email">
            <input type="text" name="phone" id="" placeholder="Seu telefone">
            <textarea name="message" id="" placeholder="Deixe a sua mensagem"></textarea>
            <button type="submit">Enviar</button>
        </form>
        </div>
      
</div>
  





@endsection('content')