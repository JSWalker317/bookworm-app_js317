<?php

namespace App\Http\Controllers\API;
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
        return $this->bookRepository->getCategoryById($cateId)->books;

        // return new BookCollection($this->bookRepository->getCategoryById($cateId)->books);
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


// Sort
    public function getFinalPriceById($bookId)
    {
        return $this->bookRepository->getFinalPriceById($bookId);   
    }
    public function getListSalePrice()
    {
        return $this->bookRepository->getListSalePrice();
    }
    public function getListBookFinal()
    {
        return $this->bookRepository->getListBookFinal();
    }
    public function getPopular()
    {
        return $this->bookRepository->getPopular();
    }
    public function getRecommended()
    {
        return $this->bookRepository->getRecommended();
    }

// other

          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        // $filter = new BooksFilter();
        // $filterItems = $filter->transform($request);  //[['column', 'operator','value']]

        // $books = Book::where($filterItems)
        // ->when('includeDiscount')
        // ->with('discounts')
        // ->whereHas('discounts')
        // ->discount()
        // ->popular();
        // 
        // $books = Book::with('discounts')
        // ->whereHas('discounts')->with('reviews')
        // ->whereHas('reviews')
        // ->pagination();
        // 
        // $books = Book::with('discounts')->popular();
        // if(request()->categoryName) {
        //     $books = Book::with('category')->whereHas('category', function ($query) {
        //         $query->where('category_name', request()->categoryName);
        //     })->pagination();
        //     $category = Category::all();
        // } elseif(request()->authorName) {
        //     $books = Book::with('author')->whereHas('author', function ($query) {
        //         $query->where('author_name', request()->authorName);
        //     })->pagination();
        //     $author = Author::all();

        // } elseif(request()->ratingReview) {
        //     $books = Book::with('reviews')->whereHas('reviews', function ($query) {
        //         $query->where('rating_start','>=', request()->ratingReview);
        //     })->pagination();
        //     $reviews = Review::all();

        // } else {
        //     $books = Book::pagination();
        // }
        // $author = Author::all();
        // $ratingReview = Review::get('rating_start');

        // $books = Book::filter(request(['category', 'author', 'ratingReview']))->get();
        // 
        // return new BookCollection($books);
        // return BookResource::collection($books);

        // $books = Book::orderBy('id', 'desc')->paginate(5);
        return BookResource::collection($this->bookRepository->getListBookFinal());
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
