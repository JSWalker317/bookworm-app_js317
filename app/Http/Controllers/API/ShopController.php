<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use App\Http\Controllers\Controller;
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
        $authorName =$request-> authorName;
        $categoryName = $request-> categoryName;
        $rating_star = $request-> ratingStar;

        $books = Book::select('book.*');
        // filter
        $books = $this->bookRepository->filter($books, $authorName, $categoryName, $rating_star);
        // sort
        $books = $this->bookRepository->sortAndPagination($books, $sortBy, $perPage);
        // tranh reset lai option luc chuyen trang paginate
        $books = $books->appends([  'sort_by' => $sortBy, 
                                    'show' => $perPage,
                                    'authorName' => $authorName,
                                    'categoryName'=> $categoryName,
                                    'ratingStar' => $rating_star ]);

        return new BookCollection($books);
    }

    // public function sortAndPagination($books, $sortBy, $perPage)
    // {
    //     switch ($sortBy) {
    //         case 'onSale':
    //             $books = $this->bookRepository->getOnSale($books);
    //             break;
    //         case 'popularity':
    //             $books = $this->bookRepository->getPopular($books);
    //             break;
    //         case 'price-asc':
    //             $books = $this->bookRepository->getPrice_ASC($books);
    //             break;
    //         case 'price-desc':
    //             $books = $this->bookRepository->getPrice_DESC($books);
    //             break;
    //         default:
    //             $books = $this->bookRepository->getOnSale($books);
    //             break;
    //     }
    //     $books = $books->paginate($perPage);
    //     return $books;
    // }

    // public function filter($books, $authorName, $categoryName, $rating_star ) {
    //     // AuthorName
    //     $books = $authorName!= null ? Author::where('author_name', $authorName)
    //     ->first()->books->toQuery() : $books;
    //     // CategoryName
    //     $books = $categoryName!=null ? Category::where('category_name', $categoryName)
    //     ->first()->books->toQuery() : $books;
    //     // Rating Start
    //     $books = $rating_star!= null ?  $this->bookRepository
    //     ->getReviewByRating($rating_star, $books)->toQuery():$books;

    //     return $books;
    // }

    // commment
    // public function category($categoryName, Request $request) {
    //     $perPage = $request-> show ?? env('BOOK_SALE_NUMBER');
    //     $sortBy = $request->sort_by ?? 'onSale';
    //     $books = Category::where('category_name', $categoryName)->first()->books->toQuery();

    //     $books = $this->sortAndPagination($books, $sortBy, $perPage);

    //     return $books;
    // }
}
