@extends('layout.main')
@section('title', 'Cretch')

@section('topBar')

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/forms.css')?>" type="text/css"> 
<center><h3>Editando partida</h3></center>

<div class='forms'>
  <form action="/partida/update/{{ $partida->id }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <label>Imagem do Evento:</label><br>
    <img src='../../img/partidas/{{ $partida->image }}' style="max-width: 100%; max-height:350px;">
    <input type="file" name="image" required>
      <hr>
    <label>Time Anfitrião</label>
    <input type="text" name="time_casa" value="{{ $partida->time_casa }}" placeholder="Digite aqui..." required>
      <hr>
    <label>Time Visitante</label>
    <input type="text" name="time_fora" value="{{ $partida->time_fora }}" placeholder="Digite aqui..." required>
      <hr>
      <label>Competição</label>
    <input type="text" name="competicao" value="{{ $partida->competicao }}" placeholder="Digite aqui..." required>
      <hr>
    <label>Estádio</label>
    <input type="text" name="estadio" value="{{ $partida->estadio }}" placeholder="Digite aqui..." required>
      <hr>
    <label>Data</label><br>
    <input type="date" name="data" value="{{ $partida->data }}" required>
      <hr>
    <label>Horário</label><br>
    <input type="time" name="horario" value="{{ $partida->horario }}" required>
      <hr>
    <label>Emissoras</label>
    <input type="text" name="emissoras"  value="{{ $partida->emissoras }}" placeholder="Ex: Globo, ESPN Brasil, TNT Sports, SporTV..." required>
      <hr>
    <label>Descrição (Prévia da partida)</label><br>
    <textarea name="descricao" required>
    {{ $partida->descricao }}
    </textarea>      
  
    <center>
      <input type="submit" value="Finalizar Edição">
    </center>
  </form>
</div>

<style>
::-webkit-scrollbar-track {
  background-color: #ffffff;
}
::-webkit-scrollbar {
  width: 8px;
  background: #000;
}
::-webkit-scrollbar-thumb {
  background: #5e997b;
  border-radius: 16px;
}::-webkit-scrollbar-track {
  background-color: #ffffff;
}
::-webkit-scrollbar {
  width: 8px;
  background: #000;
}
::-webkit-scrollbar-thumb {
  background: #5e997b;
  border-radius: 16px;
}
</style>
@endsection