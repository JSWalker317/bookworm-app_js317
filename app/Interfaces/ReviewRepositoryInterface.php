<?php

namespace App\Interfaces;

interface ReviewRepositoryInterface 
{
    public function deleteReview($reviewId);
    public function createReview(array $reviewDetails);
    public function updateReview($reviewId, array $newDetails);

}