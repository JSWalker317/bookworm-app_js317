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

/**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePopular($query)
    {
        return $query->paginate()->appends(request()->query());
    }
 
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeDiscount($query)
    {
        $query->where('book_price', '>', 50);
    }



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
