<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{ __('Criar Notícia') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Editar Noticia</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('noticias.update', $noticia) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $noticia->titulo }}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea class="form-control" name="decricao" id="descricao">{{ $noticia->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control" name="arquivo" id="arquivo">
                @if ($noticia->arquivo)
                    <a href="{{ asset($noticia->url) }}" target="_blank">Ver arquivo</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</x-app-layout>
