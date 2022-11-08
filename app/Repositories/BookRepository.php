<?php

namespace App\Repositories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{
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
    public function getOnSale($query)
    {
        $query->leftJoin('author','book.author_id','=','author.id')
            ->select('book.*','author.author_name','discount.discount_price')
            ->groupBy('book.id', 'author.author_name');
        $query = $this->getListFinalPrice($query)
            ->orderBy('sub_price', 'desc');
        return $query;
    }

    public function getPopular($query)
    {
         $query->leftJoin('review', 'book.id', '=','review.book_id')
            ->leftJoin('author','book.author_id','=','author.id')
            ->select('book.*', 'author.author_name', DB::raw('review.book_id, coalesce(count(review.id), 0.0) as total_review') )
            ->groupBy('book.id', 'review.book_id', 'author.author_name' );
        $query = $this->getListFinalPrice($query)
            ->orderBy('total_review', 'desc')
            ->orderBy('final_price', 'asc');
        return $query;      
    }

    public function getRecommended($query)
    {
        $query->leftJoin('review', 'book.id', '=','review.book_id')
            ->leftJoin('author','book.author_id','=','author.id')
            ->select('book.*', 'author.author_name', DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final') )
            ->groupBy('book.id','review.book_id', 'author.author_name');
        $query = $this->getListFinalPrice($query)
            ->orderBy('star_final', 'desc')
            ->orderBy('final_price', 'asc');
        return $query;      
    }
// Shop
    public function getPrice_ASC($query){
        $query->leftJoin('author','book.author_id','=','author.id')
            ->select('book.*', 'author.author_name');
        $query = $this->getListFinalPrice($query)
                    ->groupBy('book.book_price', 'book.id', 'author.author_name')
                    ->orderBy('final_price' );
        return $query;
    }

    public function getPrice_DESC($query){
        $query->leftJoin('author','book.author_id','=','author.id')
            ->select('book.*', 'author.author_name');
        $query = $this->getListFinalPrice($query)
                    ->groupBy('book.book_price', 'book.id', 'author.author_name')
                    ->orderByDesc('final_price');
        return $query;

    }

    public function getReviewByRating($rating_star, $query) {
        return $query->leftJoin('review', 'book.id', '=','review.book_id')
            ->select('book.*', DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final') )
            ->groupBy('book.id','review.book_id' )
            ->orderBy('star_final', 'desc')
            ->having(DB::raw('coalesce(ROUND(AVG(review.rating_start),2), 0.0) as star_final'), '>=', $rating_star)
            ->get();
      
   }

   public function sortAndPagination($books, $sortBy, $perPage)
   {
       switch ($sortBy) {
           case 'onSale':
               $books = $this->getOnSale($books);
               break;
           case 'popularity':
               $books = $this->getPopular($books);
               break;
           case 'price-asc':
               $books = $this->getPrice_ASC($books);
               break;
           case 'price-desc':
               $books = $this->getPrice_DESC($books);
               break;
           default:
               $books = $this->getOnSale($books);
               break;
       }
       $books = $books->paginate($perPage);
       return $books;
   }

    public function filter($books, $authorName, $categoryName, $rating_star ) 
    {
        // AuthorName
        $books = $authorName!= null ? Author::where('author_name', $authorName)
        ->first()->books->toQuery() : $books;
        // CategoryName
        $books = $categoryName!=null ? Category::where('category_name', $categoryName)
        ->first()->books->toQuery() : $books;
        // Rating Start
        $books = $rating_star!= null ?  $this->getReviewByRating($rating_star, $books)->toQuery():$books;

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