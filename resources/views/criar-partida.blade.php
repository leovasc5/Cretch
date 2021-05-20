@extends('layout.main')
@section('title', 'Cretch')

@section('topBar')

@section('content')
<link rel="stylesheet" href="<?php echo asset('css/forms.css')?>" type="text/css"> 
<center><h3>Criar Partida</h3></center>

<div class='forms'>
  <form action="/validando-partida" method="POST" enctype="multipart/form-data">
  @csrf
    <label>Imagem do Evento:</label><br>
    <input type="file" name="image" required>
      <hr>
    <label>Time Anfitrião</label>
    <input type="text" name="time_casa" placeholder="Digite aqui..." required>
      <hr>
    <label>Time Visitante</label>
    <input type="text" name="time_fora" placeholder="Digite aqui..." required>
      <hr>
      <label>Competição</label>
    <input type="text" name="competicao" placeholder="Digite aqui..." required>
      <hr>
    <label>Estádio</label>
    <input type="text" name="estadio" placeholder="Digite aqui..." required>
      <hr>
    <label>Data</label><br>
    <input type="date" name="data" required>
      <hr>
    <label>Horário</label><br>
    <input type="time" name="horario" required>
      <hr>
    <label>Emissoras</label>
    <input type="text" name="emissoras" placeholder="Ex: Globo, ESPN Brasil, TNT Sports, SporTV..." required>
      <hr>
    <label>Descrição (Prévia da partida)</label><br>
    <textarea name="descricao" required>
    </textarea>      
  
    <center>
      <input type="submit" value="Criar">
    </center>
  </form>
</div>
@endsection