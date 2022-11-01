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

    public function index($id)
    {
        $reviews = Book::where('id', $id)->reviews->first()->toQuery();
        $sortBy = request()->sort_by ?? 'latest';
        switch ($sortBy) {
            case 'latest':
                $reviews = $reviews->select('review.*')
                ->orderBy('review.review_date', 'desc')->get();
                break;
            case 'oldest':
                $reviews = $reviews->select('review.*')
                ->orderBy('review.review_date', 'asc')->get();
                break;
            default:
                $reviews = $reviews->select('review.*')
                ->orderBy('review.review_date', 'desc')->get();
                break;
        }

        return response()->json(
            $reviews,
            Response::HTTP_CREATED
        );

        
        // return $this->reviewRepository->getAllReviews();
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
        $reviewDetails = $request-> all();
        return $this->reviewRepository->createReview($reviewDetails);
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
        return $this->orderRepository->deleteOrder($id);
    }
}
