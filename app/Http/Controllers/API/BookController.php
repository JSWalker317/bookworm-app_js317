<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;
use App\Interfaces\BookRepositoryInterface;

class BookController extends Controller
{
    private BookRepositoryInterface $bookRepository;

    public function __construct(BookRepositoryInterface $bookRepository) 
    {
        $this->bookRepository = $bookRepository;
    }    
// Filter
    public function filterBookByCategory($cateId)
    {
        //return $this->bookRepository->getCategoryById($cateId)->books;

        return new BookCollection($this->bookRepository->getCategoryById($cateId)->books);
        // return BookResource::collection($this->bookRepository->getCategoryById($cateId)->books);
    }
    public function filterBookByAuthor($authorId)
    {
        // $author = Author::where('id', $authorId)->get();
        // $books = Book::whereBeLongsTo($author)->get();
        
        // $author2 = Author::findOrFail($authorId)->books;
        // return BookResource::collection($books);
        return BookResource::collection($this->bookRepository->getAuthorById($authorId)->books);
    }
    public function filterRatingReviewByRT($rating_start) 
    {
        return $this->bookRepository->getRatingReviewByRT($rating_start);   
    }


// Home page
    // public function getFinalPriceById($bookId)
    // {
    //     return $this->bookRepository->getFinalPriceById($bookId);   
    // }
    public function getListSalePrice()
    {
        // return $this->bookRepository->getListSalePrice();

        return new BookCollection($this->bookRepository->getListSalePrice());
    }
    public function getPopular()
    {
        // return new BookCollection($this->bookRepository->getPopular());
        return $this->bookRepository->getPopular();
    }
    public function getRecommended()
    {
        return $this->bookRepository->getRecommended();
    }
    public function getListBookFinal()
    {
        return $this->bookRepository->getListBookFinal();
    }

    public function mixFilterSort() {

    }

// other

          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {


        // if(){
        // tao moi Book
        // else
        // trong sort $books= $books->sortBy()
        // viet lai toan bo
        $books = Book::get();
        if(request()->category) {
            $books =  $this->filterBookByCategory(request()->category);
        } 
        else if(request()->author) 
        {
            $books = $this->filterBookByAuthor(request()->author);
        } 
        else if(request()->ratingReview) 
        {
            $books = $this->filterRatingReviewByRT(request()->ratingReview);
        }
        
        // switch (request()->sortBy) {
        //     case 'onSale':
        //         $books = $this->getListSalePrice($books);
        //         break;

        //     case 'onPopular':
        //         $books = $this->getPopular($books);
        //         break;

        //     case 'priceAsc':
        //         $books = $this->getListBookFinal($books)->orderBy('final_price');
        //         break;

        //     case 'priceDesc':
        //         $books = $this->getListBookFinal($books)->orderByDesc('final_price');
        //         break;
        //     default:
        //         break;
        // }
    
        // $books = Book::orderBy('id', 'desc')->paginate(5);
        return $books;
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    

        return new BookResource($this->bookRepository->getBookById($id));
    }

     /**
     * Display the specified resource.
     *
     * @param  str  $book_title
     * @return \Illuminate\Http\Response
     */
    public function search($book_title)
    {

    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


  

    
}
