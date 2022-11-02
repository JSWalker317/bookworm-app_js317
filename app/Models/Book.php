<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Review;
use App\Models\Category;
use App\Models\Discount;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
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

    public function scopeDetailAllBooks($query)
    {
        return $query
        ->leftJoin('discount', 'discount.book_id', 'book.id')
        ->leftJoin('review', 'review.book_id', 'book.id')
        ->groupBy('book.id', 'discount.id')
        ->select(
        'book.id',
        'book.book_price',
        'book.category_id',
        'book.author_id',
        'book.book_title',
        'book.book_summary',
        'book.book_cover_photo',
        'discount.discount_price',
        'discount.discount_start_date',
        'discount.discount_end_date',
        DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'));
    }
    // public function scopePopular($query)
    // {
    //     return $query->where('book_price', '>', 50);
    // }
 
    // public function scopePagination($query)
    // {
    //     return $query->paginate()->appends(request()->query());
    // }

    // public function scopeFilter($query, array $filters)
    // {
       
    //     if($filters['category'] ?? false)
    //     {
    //         $query->where('category_id', 'like', '%'.request('category').'%');

    //     }
    //     if($filters['author'] ?? false)
    //     {
    //         $query->where('author_id', 'like', '%'.request('author').'%');

    //     }
    //     if($filters['ratingReview'] ?? false)
    //     {
    //         $query->where('rating_start', 'like', '%'.request('ratingReview').'%');
    //     }
    // }
 
    // public function getPresentPriceAttribute(){
    //     return number_format('$%i', $this->book_price);
    //     // return '$'. number_format($this->book_price);
    // }

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
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
