<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Repositories\BookRepository;
use App\Http\Resources\BookCollection;
use App\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository) 
    {
        $this->bookRepository = $bookRepository;
    }    
    
    public function getOnSale()
    {
        $books =  $this->bookRepository
                    ->getOnSale()
                    ->take(env('BOOK_SALE_NUMBER'))
                    ->get();

        return new BookCollection($books);
    }

    public function getPopular()
    {
        $books = $this->bookRepository
                    ->getPopular()
                    ->take(env('BOOK_POP_RE_NUMBER'))
                    ->get();

        return new BookCollection($books);
    }

    public function getRecommended()
    {
        // $books = Book::select('book.*');
        $books =  $this->bookRepository
                        ->getRecommended()
                        ->take(env('BOOK_POP_RE_NUMBER'))
                        ->get();
                        
        return new BookCollection($books);
        // return response()->json(
        //     $books,
        //     Response::HTTP_CREATED
        // );
        // return $books;
    }
   
}
