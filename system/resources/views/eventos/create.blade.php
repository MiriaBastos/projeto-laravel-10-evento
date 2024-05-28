@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-4 mt-4">
            <div id="evento-create-container">
                <h1 class="text-center roboto-bold laranja mb-5">Crie o seu evento</h1>
                <div class="container">
                    <div class="row">
                        @if (session('error'))
                            <p class="error">
                                {{ session('error') }}
                            </p>
                        @endif
                    </div>
                </div>
                <form action="/eventos" method="POST" enctype="multipart/form-data" class="roboto-bold cinzaMedio size-18">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="image">Imagem do Evento:</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="titulo">Evento:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="data">Data do evento:</label>
                        <input type="date" class="form-control" id="data" name="data">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="privado">O evento é privado?</label>
                        <select name="privado" id="privado" class="form-control">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea name="descricao" id="descricao" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
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
                    <input type="submit" class="btn btn-primary" value="Criar Evento">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
