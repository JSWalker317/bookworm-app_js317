<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
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
        $books = Book::DetailAllBooks()->find($id);
        $reviews = Book::find($id)->reviews();
        
        $reviews = $this->filter($reviews, request());

        $select_star =request()->star;
        $perPage = request()-> show ?? env('BOOK_SALE_NUMBER');
        $sortBy = request()->sort_by ?? 'latest';
        switch ($sortBy) {
            case 'latest':
                $reviews = $reviews
                ->orderBy('review.review_date', 'desc');
                break;
            case 'oldest':
                $reviews = $reviews
                ->orderBy('review.review_date', 'asc');
                break;
            default:
                $reviews = $reviews
                ->orderBy('review.review_date', 'desc');
                break;
        }

        $reviews = $reviews->paginate($perPage);
        $reviews = $reviews->appends(['sort_by' => $sortBy,'star' => $select_star, 'show' => $perPage]);


        // $reviews = $reviews->appends(['sort_by' => $sortBy]);

        return response()->json( [
            'book' => $books,
            'reviews' => $reviews,
        ],
            Response::HTTP_CREATED
        );
        // return $this->reviewRepository->getAllReviews();
    }
    public function filter($reviews, Request $request) {
        // AuthorName
        $select_star =$request->star;
        switch ($select_star) {
            case '1':
                $reviews = $reviews
                ->where('review.rating_start','=', '1');
                break;
            case '2':
                $reviews = $reviews
                ->where('review.rating_start','=', '2');
                break;
            case '3':
                $reviews = $reviews
                ->where('review.rating_start','=', '3');
                break;
            case '4':
                $reviews = $reviews
                ->where('review.rating_start','=', '4');
                break;
            case '5':
                $reviews = $reviews
                ->where('review.rating_start','=', '5');
                break;
            default:
                break;
        }

        return $reviews;

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
    public function store(ReviewRequest $request)
    {
        // $review = new Review();
        // $review->review_title = $request->review_title;
        // $review->review_details = $request->review_details;
        // $review->review_date = $request->review_date;
        // $request->save();
        $review_details = $request-> all();
    
        $review = new Review();
        $review->book_id = $review_details['book_id'];
        $review->review_title = $review_details['review_title'];
        $review->review_details = $review_details['review_details'];
        $review->rating_start = $review_details['rating_start'];
        $review->review_date = now();
        $review->save();

        return $review;
        
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
        return $this->reviewRepository->deleteReview($id);
    }
}
