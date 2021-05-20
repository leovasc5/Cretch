@extends('layout.main')
@section('title', 'Cretch')
@section('topBar')

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/format.css')?>" type="text/css"> 
<link rel="stylesheet" href="<?php echo asset('css/alert.css')?>" type="text/css"> 
<center>
<div class="search-container">
    <form action="/" method="GET">
      <input type="text" placeholder="Pesquisar termo.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

  @if(session('msg'))
  <script src='js/alert.js'></script>
  <script>
    swal('Partida Criada', 'Sua partida já está disponível para o acesso dos demais usuários...', 'success');
  </script>
  @endif

  @if(session('msg2'))
  <script src='js/alert.js'></script>
  <script>
    swal('Confirmado!', "Está confirmado que você assistirá o jogo!", 'success');
  </script>
  @endif

  @if(session('msg3'))
  <script src='js/alert.js'></script>
  <script>
    swal('Você saiu da partida!', "Está confirmado que você não assistirá o jogo!", 'success');
  </script>
  @endif

  @if($search)
  <br>
    <h3>Buscando por: "{{ $search }}"</h3>
  @else
  <br>
    <h3>Próximas Partidas:</h3>
  @endif

  @foreach($partidas as $partida)
        <div class="format" onclick="window.location='partida/{{ $partida->id }}';">
          <img src="/img/partidas/{{ $partida->image }}" class="p_img"></img>
            <h2 class="titulo">{{ $partida->time_casa }} x {{ $partida->time_fora }}</h2>
                <p><b>Data: </b>
                  @php
                    $array_time = explode('-',$partida->data);
                    echo $array_time[2].' de ';
                    if($array_time[1] == '01'){
                      echo 'Janeiro';
                    }
                    if($array_time[1] == '02'){
                      echo 'Fevereiro';
                    }
                    if($array_time[1] == '03'){
                      echo 'Março';
                    }
                    if($array_time[1] == '04'){
                      echo 'Abril';
                    }
                    if($array_time[1] == '05'){
                      echo 'Maio';
                    }
                    if($array_time[1] == '06'){
                      echo 'Junho';
                    }
                    if($array_time[1] == '07'){
                      echo 'Julho';
                    }
                    if($array_time[1] == '08'){
                      echo 'Agosto';
                    }
                    if($array_time[1] == '09'){
                      echo 'Setembro';
                    }
                    if($array_time[1] == '10'){
                      echo 'Outubro';
                    }
                    if($array_time[1] == '11'){
                      echo 'Novembro';
                    }if($array_time[1] == '12'){
                      echo 'Dezembro';
                    }
                    echo " de $array_time[0]";
                  @endphp</p>
                </p>
                <p><b>Horário: </b>
                  @php
                    $array_data = explode(':',$partida->horario);
                    echo $array_data[0].':'.$array_data[1];
                  @endphp</p>
                <p><b>Campeonato:</b> {{ $partida->competicao }} </p>
                <p><b>Local:</b> {{ $partida->estadio }} </p>
                <p><b>Transmissão:</b> {{ $partida->emissoras }} </p>
                <p><b>Descrição:</b> {{ $partida->descricao }} </p>
                <p>{{ count($partida->users) }} usuários assistirão essa partida! </p>
        </div>
  @endforeach
  @if(count($partidas) == 0 && $search)
  <br><br>
    <h5>Não foi possível encontrar eventos disponíneis com o termo "{{ $search }}"</h5><a href='/'>Ver todos</a>
  @elseif(count($partidas) == 0)
    <h4>Não há eventos disponíveis...</h4>
  @endif
</center>
@endsection