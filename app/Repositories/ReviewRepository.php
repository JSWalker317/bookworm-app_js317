<?php

namespace App\Repositories;

use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface 
{
    public function deleteReview($reviewId) 
    {
        Review::destroy($reviewId);
    }

    public function createReview(array $reviewDetails) 
    {
        $review =  Review::firstOrCreate($reviewDetails);
        return $review;
    }

    public function updateReview($reviewId, array $newDetails) 
    {
        return Review::whereId($reviewId)->update($newDetails);
    }




}