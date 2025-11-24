<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image_path',
        'is_published'
    ];

    //Une relation : Un article appartient à un utilisateur (auteur)
    //$article->user : onn récupère l'article et l'utilisateur associé à l'article
    //$article->user() : on récupère la relation entre l'article et l'utilisateur associé et avec la relation on peut faire des requêtes plus complexes par exemple récuperer tous les articles d'un utilisateur
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot(){
        parent::boot();
        //Avant de créer un article , on va génerer le slug
        static::creating(function (Article $article) {
            if(empty($article->slug)){
                $article->slug = Str::slug($article->title);
            }
        });
    }
}
