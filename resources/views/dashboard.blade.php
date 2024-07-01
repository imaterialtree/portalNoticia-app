@include('layouts.navigation')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container">
        <h1>Notícias</h1>
    </div>
    <a href="{{ route('noticias.create') }}" class="btn btn-primary">Criar Notícias</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>IDs</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>URL</th>
        </tr>
        @foreach ($noticias as $notica)
            <tr>
                <td>{{ $noticia->id }}</td>
                <td>{{ $noticia->titulo }}</td>
                <td>{{ $notica->descricao }}</td>
                <td><a href="{{ $noticia->url }}" target="__blank">{{ $noticia->url }}</a></td>
            </tr>
        @endforeach
    </table>
</x-app-layout>
