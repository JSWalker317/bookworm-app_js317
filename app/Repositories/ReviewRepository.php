<?php

namespace App\Repositories;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface 
{
    public function deleteReview($reviewId) 
    {
        Review::destroy($reviewId);
    }

    public function createReview($request) 
    {
        $review_details = $request-> all();
        // $review =  Review::firstOrCreate($request);
        $review = new Review();
        $review->book_id = $review_details['book_id'];
        $review->review_title = $review_details['review_title'];
        $review->review_details = $review_details['review_details'];
        $review->rating_start = $review_details['rating_start'];
        $review->review_date = now();
        $review->save();

        return $review;
    }
    public function sortAndPagination($reviews, $sortBy, $perPage)
    {
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
        return $reviews;
    }
    public function filter($reviews, $select_star) 
    {
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
                $reviews = $reviews
                ->where('review.rating_start','=', '5');
                break;
        }

        return $reviews;

    }

    public function getNumberStarReview($id)
    {
        
        // return Review::where('book_id', $id);
        // ->select(DB::raw('count(rating_start) as total_star'));
        // ->selectRaw("count(case when rating_start like '1' then 1 else 0 end) as one")
        // ->selectRaw("count(case when rating_start like '2' then 1 else 0 end) as two")
        // ->selectRaw("count(case when rating_start like '3' then 1 else 0 end) as three")
        // ->selectRaw("count(case when rating_start like '4' then 1 else 0 end) as four")
        // ->selectRaw("count(case when rating_start like '5' then 1 else 0 end) as five");
        // return $numberStar;

    
    }


    // public function updateReview($reviewId, array $newDetails) 
    // {
    //     return Review::whereId($reviewId)->update($newDetails);
    // }




}