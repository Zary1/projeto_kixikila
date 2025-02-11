<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

        <!-- font-awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
          <!-- bootstrap  -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
           <!-- Fonts -->
           <link rel="preconnect" href="https://fonts.bunny.net">
        
        <link rel="stylesheet" href="/css/style.css">
    <body>
    <header>
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">KIXIKILA</a> -->
   <a href="/"><img src="/img/logotipo.png" alt=""></a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/utente">Poupança</a>
        </li>
        <li class="nav-item" id="sobre">
          <a class="nav-link " aria-current="page" href="/sobre">Sobre nós</a>
        </li>
        <li class="nav-item" id="contacto">
          <a class="nav-link " aria-current="page" href="#">Contacto</a>
        </li>
        @auth
        <li class="nav-item" id="contacto">
          <a class="nav-link " aria-current="page" href="/dashboard">Minhas poupanças</a>
        </li>
        @endauth
        @guest
        <li class="nav-item">
          <a class="nav-link" href="/register">Registrar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        @endguest
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
          <a class="nav-link" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
          </form>
        
        </li>
      </ul>
    </div>
  </div>
  
</nav>
</header>
<main>
<div >
<div >
@yield('content')
</div> 
</div> 
</main>
       
        <footer>
        <img src="/img/logotipo.png" alt="">
     
        <div>
      <i class="fa-brands fa-facebook"></i>
     <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-youtube"></i>
      <i class="fa-brands fa-twitter"></i>
    
      
        
        </div>
        <p>Kixikila &copy; 2025</p>
        
        </footer>




   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="js/index.js"></script>
    </body>

    
</html>
