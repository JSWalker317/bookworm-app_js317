<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'book';
    // default id
    protected $primaryKey = 'id';





    public function author(){
        return $this->belongsTo(Author::class,'author_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function discounts(){
        return $this->hasMany(Discount::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
