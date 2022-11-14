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
// Vi tinh sub final leftjoin 2 lan, avgstar countreview tach ra leftjoin 2 lan k duoc
    public function scopeGroupJoin($query)
    {
        return $query
            ->leftJoin('discount','book.id','=','discount.book_id')
            ->leftJoin('review', 'review.book_id', 'book.id')
            ->select('book.*')
            ->groupBy('book.id','discount.discount_start_date',
            'discount.discount_end_date','discount.discount_price',
            'review.book_id');
    }
// final left discount
    public function scopeFinalPrice($query)
    {
        return $query
        ->addSelect(DB::raw('case
                            when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                            or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                                then discount.discount_price
                                else book.book_price
                            end as final_price'));
    }
// sub left discount
    public function scopeSubPrice($query)
    {
        return $query
        ->addSelect(DB::raw('case
                            when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                            or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                                then book.book_price - discount.discount_price
                                else 0
                            end as sub_price'));
    }
//  avg_star left review
    public function scopeAvgStar($query)
    {
        return $query
        ->addSelect(DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'));

    }
// countReview left review
    public function scopeCountReview($query)
    {
        return $query
        ->addSelect(DB::raw('review.book_id, coalesce(count(review.id), 0.0) as total_review'));
    }
// Shop controllers
    // public function scopePriceAsc($query)
    // {
    //     return $query
    //     ->finalPrice()
    //     ->orderBy('final_price' );
    // }

    // public function scopePriceDesc($query)
    // {
    //     return $query
    //     ->finalPrice()
    //     ->orderByDesc('final_price');
    // }

    // public function scopeReviewByRating($rating_star, $query) 
    // {
    //     return $query
    //         ->avgStar()
    //         ->orderBy('star_final', 'desc')
    //         ->having(DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'), '>=', $rating_star)
    //         ->get();
    
    // }


// apply in review
    public function scopeDetailAllBooks($query) {
        return $query
            ->groupJoin()
            ->finalPrice()
            ->avgStar()
            ->countReview();
    }
   
    // 
    // 
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
