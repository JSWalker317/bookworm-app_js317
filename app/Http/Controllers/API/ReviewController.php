<?php

namespace App\Http\Controllers\API;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Interfaces\ReviewRepositoryInterface;

class ReviewController extends Controller
{
    private ReviewRepositoryInterface $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository) 
    {
        return $this->reviewRepository = $reviewRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sortByDate(){
        
    }

    public function index(Request $request)
    {
        $sortBy = $request->sort_by ?? 'lastest';
        switch ($sortBy) {
            case 'lastest':
                $review = Review::select('review.*')
                ->orderBy('review.review_date', 'desc');
                break;
            case 'oldest':
                $review = Review::select('review.*')
                ->orderBy('review.review_date', 'asc');
                break;
            default:
                $review = Review::select('review.*')
                ->orderBy('review.review_date', 'desc');
                break;
        }

        return $review;

        
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->reviewRepository->getReviewById($id);
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
