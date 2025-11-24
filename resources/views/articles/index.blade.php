<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>

<x-app-layout>
    <x-slot name="header">
        <h2>Article</h2>
        <a href="{{ route('articles.create') }}">+ Nouvel Article</a>
    </x-slot>
    <div class="">
        @if($articles->isEmpty())
            <p>Vous n'avez pas encore d'Article</p>
            
        @else
            @if(session('seccess'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700">
                    {{ session('seccess') }}
                </div>
            @endif
            <div class="">
                @foreach ($articles as $article)
                    <h3>
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->title }}
                        </a>
                    </h3>
                    <p>Par {{ $article->user->name }} . {{ $article->created_at }}</p>
                    <p>{{ Str::limit($article->content, limit:10) }}</p>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>