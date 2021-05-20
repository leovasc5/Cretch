@extends('layout.main')
@section('topBar')
@section('content')
@section('title', 'Partida')
<link rel="stylesheet" href="<?php echo asset('css/format.css')?>" type="text/css"> 
<center><div class="format">
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
        <p><b>Criador:</b> {{ $criadorPartida['name'] }} </p><br>
        @if(!$hasUserJoined)
        <b>Você assistirá essa partida?</b><br>
        <form action="/partida/join/{{ $partida->id }}" method="POST">
            @csrf
            <a href="/partida/join/ {{ $partida->id }}"
            onclick="event.preventDefault();
            this.closest('form').submit();">
            Assistirei essa partida!
            </a>
          @else
          <p>Você está participando desta partida!</p>
          @endif
        </form>
</div></center>
@endsection