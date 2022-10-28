<?php

namespace App\Repositories;

use App\Interfaces\ReviewRepositoryInterface;
use App\Models\Review;

class ReviewRepository implements ReviewRepositoryInterface 
{
    public function getAllReviews() 
    {
        return Review::all();
    }

    public function getReviewById($reviewId) 
    {
        return Review::findOrFail($reviewId)->get();
    }

    public function deleteReview($reviewId) 
    {
        Review::destroy($reviewId);
    }

    public function createReview(array $reviewDetails) 
    {
        return Review::firstOrCreate($reviewDetails);
    }

    public function updateReview($reviewId, array $newDetails) 
    {
        return Review::whereId($reviewId)->update($newDetails);
    }

    public function sortByDate(){
        
    }



}