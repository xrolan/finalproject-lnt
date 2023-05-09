<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'sinopsis',
        'penulis',
        'url_cover_buku',
        'tahun_terbit',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    function authors() {
        return $this->belongsToMany(Author::class, 'book_author', 'book_id','author_id');
    }
}
