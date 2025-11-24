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
            <p>Vous aveez des articles .</p>
        @endif
    </div>
</x-app-layout>