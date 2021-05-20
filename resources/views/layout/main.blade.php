<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="/css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/topBar.css">
        <link href="/img/cretch.ico" type="image/x-icon" rel="icon"/>
        <title>@yield('title')</title>
    </head>
    <body>
    @yield('topBar')
    <div class="mobile-container">

    <div class="topnav">
      <a href="http://127.0.0.1:8000" class="active">
      <img src='/img/cretch.png' width='22px'/> Cretch</a>
      <div id="myLinks">
      <a href="http://127.0.0.1:8000/">Página Inicial</a>
        <a href="http://127.0.0.1:8000/criar-partida">Criar Partida</a>
        @auth 
        <a href="http://127.0.0.1:8000/dashboard">Minhas Partidas</a>
        <form action="/logout" method="POST">
          @csrf
          <a href="/logout" onclick="event.preventDefault();
                            this.closest('form').submit();">Sair</a>
        </form>
        @endauth
        @guest
        <a href="http://127.0.0.1:8000/login">Login</a>
        <a href="http://127.0.0.1:8000/register">Cadastrar</a>
        @endguest
      </div>
      <a href="javascript:void(0);" class="icon" onclick="topBar()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    @yield('content')

    @yield('footer')
    <div class="footer-basic">
        <footer>
            <div class="social">
                <a href="https://github.com/leovasc5/"><i class="icon ion-social-github"></i></a>
                <a href="https://www.linkedin.com/in/leonardo-vasconcelos-paulino-7a0b41200/"><i class="icon ion-social-linkedin"></i></a>
                <a href="https://www.twitter.com/leovasc5/"><i class="icon ion-social-twitter"></i></a>
                <a href="https://www.instagram.com/leovasc5/"><i class="icon ion-social-instagram"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="mailto: leovasc5@hotmail.com">E-mail</a></li>
            </ul>
            <p class="copyright">Leonardo Vasconcelos Paulino - 2021</p>
        </footer>
    </div>

    <script src="/js/topBar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

    </body>
</html>