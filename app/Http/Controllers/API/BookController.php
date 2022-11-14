<?php

namespace App\Http\Controllers\API;
use Throwable;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository) 
    {
        $this->bookRepository = $bookRepository;
    }    
    
    public function getOnSale()
    {
        try {
            $books =  $this->bookRepository
                    ->getOnSale()
                    ->take(env('BOOK_SALE_NUMBER'))
                    ->get();

            return new BookCollection($books);

        } catch (Throwable $th){
            return response()->json([
                'error' => 'Server Error'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
    }

    public function getPopular()
    {
        try {
            $books = $this->bookRepository
            ->getPopular()
            ->take(env('BOOK_POP_RE_NUMBER'))
            ->get();

            return new BookCollection($books);

        } catch (Throwable $th){
            return response()->json([
                'error' => 'Server Error'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
      
    }

    public function getRecommended()
    {
        try {
            $books =  $this->bookRepository
            ->getRecommended()
            ->take(env('BOOK_POP_RE_NUMBER'))
            ->get();
            
            return new BookCollection($books);

        } catch (Throwable $th){
            return response()->json([
                'error' => 'Server Error'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
      
        // return response()->json(
        //     $books,
        //     Response::HTTP_CREATED
        // );
        // return $books;
    }
   
}
