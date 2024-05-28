@extends('layouts.main')

@section('title', 'Editando:' . $evento->titulo)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-4 mt-4">
            <div id="evento-create-container">
                <h1 class="text-center roboto-bold laranja mb-5">Editando: <span class="roboto-bold-italic cinzaMedio">{{ $evento->titulo }}</span> </h1>
                <form action="/eventos/update/{{ $evento->id }}" method="POST" enctype="multipart/form-data" class="roboto-bold cinzaMedio size-18">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-5">
                        <label for="image">Imagem do Evento:</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                        <img src="/img/eventos/{{ $evento->image }}" alt="{{ $evento->titulo }}" class="img-preview">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="titulo">Evento:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento" value="{{ $evento->titulo }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="data">Data do evento:</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ date('Y-m-d', strtotime($evento->data)) }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento" value="{{ $evento->cidade }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="privado">O evento é privado?</label>
                        <select name="privado" id="privado" class="form-control">
                            <option value="0">Não</option>
                            <option value="1" {{ $evento->privado == 1 ? "selected='selected'" : "" }}>Sim</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?">{{ $evento->descricao }}</textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">Adicione itens de infraestrutura:</label>
                        <div class="form-group">
                          <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="items[]" value="Palco"> Palco
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="items[]" value="Open Food"> Open food
                        </div>
                        <div class="form-group">
                          <input type="checkbox" name="items[]" value="Brindes"> Brindes
                        </div>
                      </div>
                      <br>
                    <input type="submit" class="btn btn-primary" value="Editar Evento">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
