<div>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>

<x-app-layout>
    <x-slot name="header">
        <h2>Creer un Article</h2>
    </x-slot>

    <div class="">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            
            @csrf

            {{-- Formulaire --}}
            <!-- Titre -->
            <x-input-label for="title" value="Titre" />
            <x-text-input id="title" name="title" type="text" />

            <!-- Image -->
             <x-input-label for="image" value="Image" />
              <x-text-input id="image" name="image" type="file" />

            <!-- Contenu -->
             <x-input-label for="content" value="Contenu" />
              <x-text-input id="content" name="content" type="text" />

            <!-- Button pour publier l'article -->
            <x-primary-button>Publier l'article</x-primary-button>
        </form>
    </div>
</x-app-layout>