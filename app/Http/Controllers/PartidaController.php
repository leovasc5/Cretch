<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partidas;
use App\Models\User;

class PartidaController extends Controller
{
    public function index(){
        $search = request('search');
        if($search){
            $partidas = Partidas::where([
                ['time_casa', 'like', '%'.$search.'%']])
                ->orWhere([['time_fora',  'like',  '%'.$search.'%']])
                ->orWhere([['descricao',  'like',  '%'.$search.'%']])
                ->orWhere([['competicao',  'like',  '%'.$search.'%']])
                ->get();
        }else{
            $partidas = Partidas::all();
        }

        return view('welcome', [
            'partidas' => $partidas,
            'search' => $search
        ]);
    }

    public function partida(){
        return view('partida');
    }

    public function criarPartida(){
        return view('criar-partida');
    }

    public function store(Request $request){
        $partida = new Partidas;

        $partida->time_casa = $request->time_casa;
        $partida->time_fora = $request->time_fora;
        $partida->competicao = $request->competicao;
        $partida->estadio = $request->estadio;
        $partida->data = $request->data;
        $partida->horario = $request->horario;
        $partida->confirmados = 0;
        $partida->emissoras = $request->emissoras;
        $partida->descricao = $request->descricao;

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;
            $request->image->move(public_path('img/partidas'), $imageName);
            $partida->image = $imageName;
        }

        $user = auth()->user();
        $partida->user_id = $user->id;

        $partida->save();
        return redirect('/')->with('msg', 'Sua partida já está disponível para o acesso dos demais usuários...');
    }

    public function show($id){
        $partida = Partidas::findOrFail($id);
        $criadorPartida = User::where('id', $partida->user_id)->first()->toArray();

        $user = auth()->user();
        $hasUserJoined = false;

        if($user){
            $userPartidas = $user->partidasAsParticipant->toArray();

            foreach($userPartidas as $userPartida){
                if($userPartida['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        return view('partida.show', [
            'partida' => $partida,
            'criadorPartida' => $criadorPartida,
            'hasUserJoined' => $hasUserJoined
        ]);
    }

    public function dashboard(){
        $user = auth()->user();
        $partidas = $user->partidas;
        $name = $user->name;
        $partidaAsParticipant = $user->partidasAsParticipant;

        return view('dashboard', [
            'partidas' => $partidas,
            'nome' => $name,
            'partidaAsParticipant' => $partidaAsParticipant
        ]);
    }

    public function destroy($id){
        Partidas::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $partida = Partidas::findOrFail($id);

        if($user->id != $partida->user_id){
            return redirect ('/dashboard');
        }

        return view('partida.edit', [
            'partida' => $partida
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")).".".$extension;
            $request->image->move(public_path('img/partidas'), $imageName);
            $data['image'] = $imageName;
        }

        Partidas::findOrFail($request->id)->update($data);
        return redirect('/dashboard')->with('msg', 'Partida editada com sucesso!');
    }

    public function join($id){
        $user = auth()->user();
        $user->partidasAsParticipant()->attach($id);

        $partida = Partidas::findOrFail($id);
        return redirect('/')->with('msg2', 'Está confirmado que você assistirá ao jogo entre '.$partida->time_casa.' x '.$partida->time_fora);
    }

    public function leave($id){
        $user = auth()->user();
        $user->partidasAsParticipant()->detach($id);

        $partida = Partidas::findOrFail($id);
        return redirect('/')->with('msg3', 'Está confirmado que você assistirá ao jogo entre '.$partida->time_casa.' x '.$partida->time_fora);
    }
}
