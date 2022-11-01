<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Interfaces\BookRepositoryInterface;

class ShopController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository) 
    {
        $this->bookRepository = $bookRepository;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request-> show ?? env('BOOK_SALE_NUMBER');
        $sortBy = $request->sort_by ?? 'onSale';

        $books = Book::select('book.*');
// filter
        $books = $this->filter($books, $request);

        $books = $this->sortAndPagination($books, $sortBy, $perPage);
        return response()->json(
            $books,
            Response::HTTP_CREATED
        );
    }
// commment
    // public function category($categoryName, Request $request) {
    //     $perPage = $request-> show ?? env('BOOK_SALE_NUMBER');
    //     $sortBy = $request->sort_by ?? 'onSale';
    //     $books = Category::where('category_name', $categoryName)->first()->books->toQuery();

    //     $books = $this->sortAndPagination($books, $sortBy, $perPage);

    //     return $books;
    // }
    public function sortAndPagination($books, $sortBy, $perPage)
    {
        switch ($sortBy) {
            case 'onSale':
                $books = $this->bookRepository->getListSalePrice($books);
                break;
            case 'popularity':
                $books = $this->bookRepository->getPopular($books);
                break;
            case 'price-asc':
                $books = $books->orderBy('book_price');
                break;
            case 'price-desc':
                $books = $books->orderByDesc('book_price');
                break;
            default:
                $books = $books->orderBy('id');
                break;
        }
        $books = $books->paginate($perPage);
        // tranh reset lai option luc chuyen trang paginate
        $books = $books->appends(['sort_by' => $sortBy, 'show' => $perPage]);

        return $books;
    }

    public function filter($books, Request $request) {
        // AuthorName
        $authorName =$request-> authorName;
        $books = $authorName!= null ? Author::where('author_name', $authorName)
        ->first()->books->toQuery() : $books;

        // CategoryName
        $categoryName = $request-> categoryName;
        $books = $categoryName!=null ? Category::where('category_name', $categoryName)
        ->first()->books->toQuery() : $books;

        // Rating Start
        $rating_start = $request-> ratingStart;
        $books = $rating_start!= null ?  $this->bookRepository
        ->getRatingReviewByRT($rating_start, $books)->toQuery():$books;

        return $books;

    }

  
}
