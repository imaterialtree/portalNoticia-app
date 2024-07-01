<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Notícia') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Criar Noticia</h1>
    </div>
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ()
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('noticia.store') }}" method="post" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="titulo" :value="__('Título')"/>
            <x-text-input id="titulo" name="titulo" type="text" class="mt-1 block w-full" required autofocus/>
        </div>
        
        <div>
            <x-input-label for="descricao" :value="__('Descrição')"/>
            <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
        </div>

        <div>
            <x-input-label for="file" :value="__('File')"/>
            <x-text-input id="file" name="file" type="file" class="mt-1 block w-full" required autofocus/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'noticia-saved')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</x-app-layout>

