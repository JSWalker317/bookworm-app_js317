<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Models\Author;
use App\Models\Review;
use App\Models\Category;
use App\Filters\BooksFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;

class BookController extends Controller
{
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
        if(request()->categoryName) {
            $books = Book::with('category')->whereHas('category', function ($query) {
                $query->where('category_name', request()->categoryName);
            })->pagination();
            $category = Category::all();
        } elseif(request()->authorName) {
            $books = Book::with('author')->whereHas('author', function ($query) {
                $query->where('author_name', request()->authorName);
            })->pagination();
            $author = Author::all();

        } elseif(request()->ratingReview) {
            $books = Book::with('reviews')->whereHas('reviews', function ($query) {
                $query->where('rating_start','>=', request()->ratingReview);
            })->pagination();
            $reviews = Review::all();

        } else {
            $books = Book::pagination();
        }
        // $author = Author::all();
        // $ratingReview = Review::get('rating_start');

        // $books = Book::filter(request(['category', 'author', 'ratingReview']))->get();
        // 
        // return new BookCollection($books);
        // return BookResource::collection($books);

        // $books = Book::orderBy('id', 'desc')->paginate(5);
        return new BookCollection($books);
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
        $mightAlsoLike = Book::where('id','!=', $id)->inRandomOrder()->take(4)->get();
        $book = Book::findOrFail($id);
        return new BookResource($book);
    }
    public function filterByCategory($cate_id)
    {
        $category = Category::find($cate_id);
        return BookResource::collection($category->book);
    }

    public function filterByAuthor($author_id)
    {
        $author = Author::find($author_id);
        return BookResource::collection($author->book);
    }



     /**
     * Display the specified resource.
     *
     * @param  str  $book_title
     * @return \Illuminate\Http\Response
     */
    public function search($book_title)
    {
        return Book::where('book_title', 'like', '%'.$book_title.'%')->get();
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
