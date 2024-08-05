@include('layouts.navigation')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <form method="GET" action="{{ route('noticias.index') }}" class="form-inline">
            <div class="form-group mb-2">
                <label for="title" class="sr-only">Título</label>
                <input type="text" name="title" id="title"
                    class="form-control form-control-sm form-control-custom mr-2" placeholder="Título"
                    value="{{ request('title') }}">
            </div>
            <div class="form-group mb-2">
                <label for="description" class="sr-only">Descrição</label>
                <input type="text" name="description" id="description"
                    class="form-control form-control-sm form-control-custom mr-2" placeholder="Descrição"
                    value="{{ request('description') }}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm mr-2">Filtrar</button>
            <a href="{{ route('noticias.index') }}" class="btn btn-secondary btn-sm">Limpar Filtros</a>
        </form>
    </div>

    <div class="container">
        <h1>Notícias</h1>
        <a href="{{ route('noticias.create') }}" class="btn btn-primary ms-auto">Criar notícia</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        {{-- Searchbar --}}
        <form action="{{ route('search') }}" method="post" class="container mt-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Pesquisa" aria-label="searchbar"
                    aria-describedby="button-search">
                <button class="btn btn-primary" type="button" id="button-search">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        @if ($noticias->count())
            <table class="table table-bordered mt-2">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>URL</th>
                        <th colspan="3">Ações</th>
                    </tr>
                </thead>
                @foreach ($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->id }}</td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ substr($noticia->descricao, 0, 250) . '...' }}</td>
                        <td><a href="{{ $noticia->url }}" target="_blank">{{ $noticia->url }}</a></td>
                        <td>
                            <a class="btn btn-info" href="{{ route('noticias.show', $noticia->id) }}">
                                <i class="bi bi-eye-fill">Ver</i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('noticias.edit', $noticia->id) }}">
                                <i class="bi bi-pencil-square">Editar</i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash-fill">Excluir</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div>
                {{ $noticias->links() }}
            </div>
        @else
            <p>Nenhuma noticia cadastrada</p>
        @endif
</x-app-layout>
