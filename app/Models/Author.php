<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'author';
      // default id
    protected $primaryKey = 'id';


    public function books(){
        return $this->hasMany(Book::class);
    }
}
