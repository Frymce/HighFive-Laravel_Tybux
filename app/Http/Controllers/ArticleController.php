<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;


class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     */
    public function index()
    {
        //On recupère tous les articles, du plus récent au plus vieux .
        $articles = Article::where('user_id', auth()->id())->orderBy('created_at','desc')->paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //1.
        $data = $request->all();
        // dd($data);

        //2. Gestion de l'image si présent 
        if($request->hasFile('image')){
            //Stocke dans ke storage/app/public/articles
            $path = $request->file('image')->store('articles', 'public');
            $data['image_path'] = $path;
        }

        //3. Création de l"article vie la relation  
        //Cela remplit automatiquement le user_id avec l"ID de l'utilisateur authentifié,
        $article = $request->user()->articles()->create($data);

        //4. Redirection vers la liste des articles aec un messsage de succès 
        return redirect()->route('articles.index')->with('seccess', 'Article créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // dd($article);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
