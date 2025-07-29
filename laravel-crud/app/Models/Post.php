<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'published'
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    // Scope pour les articles publiés
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    // Méthode pour obtenir un extrait du contenu
    public function getExcerptAttribute($length = 150)
    {
        return strlen($this->content) > $length 
            ? substr($this->content, 0, $length) . '...' 
            : $this->content;
    }
}
