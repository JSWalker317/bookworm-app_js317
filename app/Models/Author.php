<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'author';
      // default id
    protected $primaryKey = 'id';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'author_name',
      'author_bio'
    ];


    public function books(){
        return $this->hasMany(Book::class);
    }
}
