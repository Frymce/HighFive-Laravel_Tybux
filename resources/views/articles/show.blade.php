<div>
    <!-- He who is contented is rich. - Laozi -->
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-900">{{ $article->title }}</h2>
    </x-slot>

    <!-- Image de couverture -->
    @if($article->image_path)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $article->image_path) }}" alt="Image de couverture" class="w-full h-auto rounded">
        </div>
    @endif

    <div class="prose prose-lg">
        {!! nl2br(e($article->content)) !!}
    </div>
    <x-primary-button>
        <a href="{{ route('articles.index') }}">Retour aux articles</a>
    </x-primary-button>
</x-app-layout>