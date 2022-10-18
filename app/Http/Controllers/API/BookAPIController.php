<?php

namespace App\Http\Controllers\API;
use App\Models\Book;
use App\Filters\BooksFilter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookCollection;

class BookAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new BooksFilter();
        $filterItems = $filter->transform($request);  //[['column', 'operator','value']]

        $books = Book::where($filterItems)
        ->when('includeDiscount')
        ->with('discounts')
        ->whereHas('discounts')
        ->discount()
        ->popular();
        
        return new BookCollection($books);

        // $books = Book::orderBy('id', 'desc')->paginate(5);
        // return new BookCollection($books);
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
        $book = Book::find($id);
        return new BookResource($book);
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
