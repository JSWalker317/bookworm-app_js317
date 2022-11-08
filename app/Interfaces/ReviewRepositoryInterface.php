<?php

namespace App\Interfaces;

interface ReviewRepositoryInterface 
{
    public function deleteReview($reviewId);
    public function createReview($request);
    public function filter($reviews, $select_star);
    public function sortAndPagination($reviews, $sortBy, $perPage);
    public function getNumberStarReview($id);
    // public function updateReview($reviewId, array $newDetails);

}