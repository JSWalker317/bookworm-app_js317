<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository) 
    {
        $this->bookRepository = $bookRepository;
    }    
    public function getOnSale()
    {
        $books = Book::select('book.*');
        $books =  $this->bookRepository->getOnSale($books)->take(env('BOOK_SALE_NUMBER'))
        ->get();
        // return response()->json(
        //     $books,
        //     Response::HTTP_CREATED
        // );
        // return $books;

         return new BookCollection($books);
    }
    public function getPopular()
    {
        $books = Book::select('book.*');
        // return new BookCollection($this->bookRepository->getPopular());
        $books = $this->bookRepository->getPopular($books)->take(env('BOOK_POP_RE_NUMBER'))
        ->get();

        // return response()->json(
        //     $books,
        //     Response::HTTP_CREATED
        // );
        return new BookCollection($books);

    }
    public function getRecommended()
    {
        $books = Book::select('book.*');
        $books =  $this->bookRepository->getRecommended($books)->take(env('BOOK_POP_RE_NUMBER'))
        ->get();
        // return response()->json(
        //     $books,
        //     Response::HTTP_CREATED
        // );
        return new BookCollection($books);

    }
   
}
