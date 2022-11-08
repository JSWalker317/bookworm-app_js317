<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ProductResource;
use App\Interfaces\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    private ReviewRepositoryInterface $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository) 
    {
        $this->reviewRepository = $reviewRepository;
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $select_star =request()->star;
        $perPage = request()-> show ?? env('BOOK_SALE_NUMBER');
        $sortBy = request()->sort_by ?? 'latest';


        $books = Book::DetailAllBooks()->find($id);
        $reviews = Book::find($id)->reviews();

        $reviews = $this->reviewRepository->filter($reviews, $select_star);
        $reviews = $this->reviewRepository->sortAndPagination($reviews, $sortBy, $perPage);
        $numberStar = $this->reviewRepository->getNumberStarReview($id);

        $reviews = $reviews->appends(['sort_by' => $sortBy,
                                        'star' => $select_star,
                                         'show' => $perPage]);

        return response()->json( [
            'book' => new ProductResource($books),
            'reviews' => $reviews,
            'numberStar' =>  $numberStar
        ],
            Response::HTTP_CREATED
        );
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
      return $this->reviewRepository->createReview($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->reviewRepository->deleteReview($id);
    }
}
