<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BookCollection;
use App\Interfaces\BookRepositoryInterface;

class BookRepository implements BookRepositoryInterface
{

    public function getAllBooks() {
        return Book::all();
    }
    public function getBookById($bookId) {
        return Book::findOrFail($bookId);
    }
    public function deleteBook($bookId) {
        Book::destroy($bookId);
    }
    public function createBook(array $bookDetails) {
        return Book::create($bookDetails);
    }
    public function updateBook($bookId, array $newDetails) {
        return Book::whereId($bookId)->update($newDetails);

    }
//Filter
    public function getCategoryById($cateId) {
        return Category::findOrFail($cateId);
    }
    public function getAuthorById($authorId) {
        return Author::findOrFail($authorId);
    }
    public function getRatingReviewByRT($ratingStart) {
        return $this->getRecommended()
        ->where('star_final', '>=', $ratingStart);
    }
    //Sort
    public function getListSalePrice()
    {
        return DB::table('discount')
        ->where([
            ['discount.discount_start_date','<=','now()'],
            ['discount.discount_end_date','>=','now()']
        ])
        ->orWhere([
            ['discount.discount_start_date','<=','now()'],
            ['discount.discount_end_date', null]
        ])
        ->leftJoin('book', 'discount.book_id', '=', 'book.id')
        ->select('book.*', 'discount.discount_price', 
                DB::raw('(book.book_price - discount.discount_price) as final_price'))
        ->groupBy('discount.discount_price', 'book.id')
        ->orderBy('final_price', 'desc')
        ->take('10')
        ->get();
        // ->groupBy('book.id', 'discount.discount_price');
        // ->get('final_price')->sortDESC()->values()->all();
    } 
    public function getPopular()
    {
        $books = DB::table('review')
            ->rightJoin('book', 'review.book_id', '=','book.id')
            ->select('book.*', DB::raw('review.book_id, coalesce(count(review.id), 0.0) as total_review') )
            ->groupBy('book.id', 'review.book_id', );
        $books = $this->getListFinalPrice($books)
            ->orderBy('total_review', 'desc')
            ->orderBy('final_price', 'asc')
            ->take('8')
            ->get();
        return $books;      
    }

    public function getRecommended()
    {
        $books = DB::table('review')
            ->rightJoin('book', 'review.book_id', '=','book.id')
            ->select('book.*', DB::raw('coalesce(AVG(review.rating_start), 0.0) as star_final') )
            ->groupBy('review.book_id', 'book.id');
        $books = $this->getListFinalPrice($books)
            ->orderBy('star_final', 'desc')
            ->orderBy('final_price', 'asc')
            // ->take('8')
            ->get();
            return $books;      
    }



// Other
    public function getFinalPriceById($bookId){
        return Book::where('id', '=', $bookId)->sum('book_price')
        - Discount::where('book_id', '=', $bookId)->sum('discount_price');
    }
    public function getListFinalPrice($query) {
      
        return $query->leftJoin('discount','book.id','=','discount.book_id')
                        ->selectRaw('case
                                    when ((now() >= discount.discount_start_date and now() <= discount.discount_end_date)
                                    or (now() >= discount.discount_start_date and discount.discount_end_date is null))
                                        then book.book_price - discount.discount_price
                                        else book.book_price
                                    end as final_price')
                        ->groupBy('discount.discount_start_date','discount.discount_end_date','discount.discount_price');
    }
    public function getListBookFinal()
    {
        $books = DB::table('book')
        ->select('book.*')
        ->groupBy('book.id')
        ->orderBy('book.id');
        $books =  $this->getListFinalPrice($books)
        ->get();
        return $books;
    }



}