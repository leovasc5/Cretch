@extends('layout.main')
@section('title', 'Cretch')

@section('topBar')

@if(session('msg'))
  <script src='js/alert.js'></script>
  <script>
    swal('Partida excluída!', 'Sua partida foi deletada do nosso banco de dados...\nEsperamos que você saiba o que está fazendo.', 'success');
  </script>
@endif

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('css/format.css')?>" type="text/css"> 
<link rel="stylesheet" href="<?php echo asset('css/show.css')?>" type="text/css"> 
<link rel="stylesheet" href="<?php echo asset('css/alert.css')?>" type="text/css"> 
<link rel="stylesheet" href="<?php echo asset('css/button_reboot.css')?>" type="text/css"> 
@if(count($partidas)>0)
<center>
<br><br>
<h4>Mostrando partidas de {{ $nome }}</h4>
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
                  <form action="/partida/{{ $partida->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                  </form>
                  <a href="partida/edit/{{ $partida->id }}">Editar</a> 
        </div>
        <hr>
    @endforeach
    </center>
@else
<center>
    <br><br><br><br><br><br><br>
    <h4>Você não tem partidas!</h4><br>
    <a href="http://127.0.0.1:8000/criar-partida">Criar Partida</a>
    <br><br><br><br><br><br><br><br>
<center>
@endif

<center>

@if(count($partidaAsParticipant)>0)
<h4>Mostrando partidas nas quais {{ $nome }} participará</h4>

@foreach($partidaAsParticipant as $partida)
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
                <form action="/partida/leave/{{ $partida->id }}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit">Não assistirei mais ao jogo</button>
                </form>
        </div>
      <hr>
@endforeach
@else
</h4>Você ainda não participa de nenhuma partida :/</h4>
<center>
@endif

@endsection