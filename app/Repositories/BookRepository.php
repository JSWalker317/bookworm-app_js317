<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
    protected $book;
    public function __construct(Book $book) 
    {
        $this->book = $book;
    }   
//Group
    public function getListFinalPrice($query) 
    {
        return $query
            ->leftJoin('discount','book.id','=','discount.book_id')
            ->selectRaw('case
                        when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                        or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                            then discount.discount_price
                            else book.book_price
                        end as final_price')
            ->selectRaw('case
                        when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                        or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                            then book.book_price - discount.discount_price
                            else 0
                        end as sub_price')
            ->groupBy('discount.discount_start_date','discount.discount_end_date','discount.discount_price');
    }
// Home
// final + sub  onSale 
    public function getOnSale()
    {
        return $this->book::groupJoin()
                        ->finalPrice()
                        ->subPrice()
                        ->orderBy('sub_price', 'desc');
    }

// final + countReview  Recommended  
    public function getPopular()
    {
        return $this->book::groupJoin()
                        ->finalPrice()
                        ->countReview()
                        ->orderBy('total_review', 'desc')
                        ->orderBy('final_price', 'asc');
    }
// final +avg_star   Popularity left review
    public function getRecommended()
    {
        return $this->book::groupJoin()
                        ->finalPrice()
                        ->avgStar()
                        ->orderBy('star_final', 'desc')
                        ->orderBy('final_price', 'asc');
    }

// Shop
//     public function getPrice_ASC($query){
//         $query->leftJoin('author','book.author_id','=','author.id')
//             ->select('book.*', 'author.author_name');
//         $query = $this->getListFinalPrice($query)
//                     ->groupBy('book.book_price', 'book.id', 'author.author_name')
//                     ->orderBy('final_price' );
//         return $query;
//     }

//     public function getPrice_DESC($query){
//         $query->leftJoin('author','book.author_id','=','author.id')
//             ->select('book.*', 'author.author_name');
//         $query = $this->getListFinalPrice($query)
//                     ->groupBy('book.book_price', 'book.id', 'author.author_name')
//                     ->orderByDesc('final_price');
//         return $query;

//     }

//     public function getReviewByRating($rating_star, $query) {
//         return $query->leftJoin('review', 'book.id', '=','review.book_id')
//             ->select('book.*', DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final') )
//             ->groupBy('book.id','review.book_id' )
//             ->orderBy('star_final', 'desc')
//             ->having(DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'), '>=', $rating_star)
//             ->get();
      
//    }
// Bug sort and filter

   public function sortAndPagination($books, $sortBy, $perPage)
   {
       switch ($sortBy) {
           case 'onSale':
               $books = $books->subPrice()->orderBy('sub_price', 'desc');
               break;
           case 'popularity':
               $books = $books->countReview()
                            ->orderBy('total_review', 'desc')
                            ->orderBy('final_price', 'asc');
               break;
           case 'price-asc':
               $books = $books->orderBy('final_price' );
               break;
           case 'price-desc':
               $books = $books->orderByDesc('final_price');
               break;
           default:
            //    $books = $books->subPrice()->orderBy('sub_price', 'desc');
               break;
       }
       $books = $books->paginate($perPage);
       return $books;
   }

//    filter
   public function filter($books, $authorName, $categoryName, $rating_star ) 
   {
       // AuthorName
       $books = $authorName!= null ? $books->where('author_id', $authorName) : $books;
       // CategoryName
       $books = $categoryName!=null ? $books->where('category_id', $categoryName) : $books;
       // Rating Start
       $books = $rating_star!= null ?  
                $books
                    ->avgStar()
                    ->orderBy('star_final', 'desc')
                    ->havingRaw('COALESCE(AVG(CAST(rating_start as INT)), 0) >= ?', [$rating_star])
       
                : $books;
       return $books;
   }

    // Other
    // public function getFinalPriceById($bookId){
    //     return Book::where('id', '=', $bookId)->sum('book_price')
    //     - Discount::where('book_id', '=', $bookId)->sum('discount_price');
    // }

        // danh sach giam
    // public function getOnSale($query)
    // {
    //     return $query->leftJoin('discount','book.id', '=','discount.book_id')
    //     ->where([
    //         ['discount.discount_start_date','<=','now()'],
    //         ['discount.discount_end_date','>=','now()']
    //     ])
    //     ->orWhere([
    //         ['discount.discount_start_date','<=','now()'],
    //         ['discount.discount_end_date', null]
    //     ])
    //     ->leftJoin('author','book.author_id','=','author.id')
    //     ->select('book.*', 'author.author_name','discount.discount_price', 
    //             DB::raw('discount.discount_price as final_price'))
    //     ->groupBy('discount.discount_price', 'book.id',"author.author_name")
    //     ->orderBy(DB::raw('book.book_price - final_price'), 'desc');

    // } 
    
}