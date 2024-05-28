<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evento;

use App\Models\User;

class EventosController extends Controller
{
    public function index() {

        $pesquisa = request('pesquisa');

        if ($pesquisa) {

            $eventos = Evento::where([
                ['titulo', 'like', '%'.$pesquisa.'%']
            ])->get();

        }else {

            $eventos = Evento::all();
        }

        return view('home',['eventos' => $eventos, 'pesquisa' => $pesquisa]);
    }

    public function create() {

        return view('eventos.create');
    }

    public function store(Request $request) {

        $evento = new Evento;

        $evento->titulo = $request->titulo;
        $evento->data = $request->data;
        $evento->cidade = $request->cidade;
        $evento->privado = $request->privado;
        $evento->descricao = $request->descricao;
        $evento->items = $request->items;

        // image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extensao = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $requestImage->move(public_path('img/eventos'), $imageName);
            $evento->image = $imageName;
        }else {
            return redirect('/eventos/create')->with('error', 'Campo de Imagem de Envio Obrigatória!');
        }

        $user = auth()->user();
        $evento->user_id = $user->id;

        $evento->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){

        $evento = Evento::findOrFail($id);

        $eventoProprietario = User::where('id', $evento->user_id)->first()->toArray();

        return view('eventos.show', ['evento' => $evento, 'eventoProprietario' => $eventoProprietario]);
    }

    public function dashboard() {

        $user = auth()->user();

        $evento = $user->eventos;

        return view('eventos.dashboard', ['evento' => $evento]);
    }

    public function produtos() {

        $busca = request('search');

        return view('produtos', ['busca' => $busca]);
    }

    public function contatos() {

        return view('contatos');
    }

    public function destroy($id) {

        Evento::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento excluido com sucesso!');
    }

    public function edit($id) {

        $evento = Evento::findOrFail($id);

        return view('eventos.edit', ['evento' => $evento]);
    }

    public function uptade(Request $request) {

        $data = $request->all();

        // image Upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extensao = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extensao;
            $requestImage->move(public_path('img/eventos'), $imageName);
            $data['image'] = $imageName;
        }

        Evento::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvento($id) {

        $user = auth()->user();

        $user->eventosComParticipantes()->attach($id);

        $evento = Evento::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença está confirmada no evento' . $evento->titulo);
    }
}
