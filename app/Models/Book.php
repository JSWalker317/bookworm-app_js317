<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Review;
use App\Models\Category;
use App\Models\Discount;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'book';
    // default id
    protected $primaryKey = 'id';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'author_id',
        'book_title',
        'book_summary',
        'book_price',
        'book_cover_photo',
    ];

/**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
*/
    public function scopePopular($query)
    {
        return $query->where('book_price', '>', 50);
    }
 
    public function scopePagination($query)
    {
        return $query->paginate()->appends(request()->query());
    }

    public function scopeFilter($query, array $filters)
    {
       
        if($filters['category'] ?? false)
        {
            $query->where('category_id', 'like', '%'.request('category').'%');

        }
        if($filters['author'] ?? false)
        {
            $query->where('author_id', 'like', '%'.request('author').'%');

        }
        if($filters['ratingReview'] ?? false)
        {
            $query->where('rating_start', 'like', '%'.request('ratingReview').'%');
        }
    }
 
    public function getPresentPriceAttribute(){
        return number_format('$%i', $this->book_price);
        // return '$'. number_format($this->book_price);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function orders(){
        return $this->hasMany(OrderItem::class);
    }

}
