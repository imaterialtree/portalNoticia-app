<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ $noticia->titulo }}
    </h2>
</x-slot>

<div>
    <div>
        {{ $noticia->titulo }}
    </div>

    <div>
        {{ $noticia->descricao }}
    </div>

    <div>
        @if ($noticia->url)
        <img
            src="{{asset($noticia->url)}}"
            class="img-gluid rounded-top"
            alt="{{$noticia->titulo}}"
        />
        @endif
    </div>
</div>