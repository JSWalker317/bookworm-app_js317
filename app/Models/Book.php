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

    public function scopeDetailAllBooks($query) {
        return  $query->leftJoin('discount','book.id','=','discount.book_id')
                    ->leftJoin('review', 'review.book_id', 'book.id')
                    ->leftJoin('author','book.author_id','=','author.id')
                    ->select(
                        'book.id',
                        'book.book_price',
                        'book.category_id',
                        'book.book_title',
                        'book.book_summary',
                        'book.book_cover_photo',
                        'author.author_name',
                        DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'),
                        DB::raw('case
                                    when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                                    or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                                        then discount.discount_price
                                        else book.book_price
                                    end as final_price'))
                    ->groupBy('book.id', 'author.author_name','discount.discount_start_date','discount.discount_end_date','discount.discount_price');
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
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
