<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Página de Notícias') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold"> Notícias </h1>
                    @if ($noticias->isEmpty())
                        <p>Não há noticias disponiveís no momento.</p>
                    @else
                    <div class ="row">
                        @foreach ($noticias as $noticia)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($noticia->url)
                                <img src="{{ asset($noticia->url) }}" alt="{{ $noticia->titulo }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $noticia->titulo }}</h5>
                                    <p class="card-text">{{ $noticia->descricaoAbreviada() }}</p>
                                </div>
                                <a class="stretched-link" href="#"></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
