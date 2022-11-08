<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function getListFinalPrice($bookId);

    public function getOnSale($query);
    public function getPopular($query);
    public function getRecommended($query);

    public function getPrice_ASC($query);
    public function getPrice_DESC($query);
    public function getReviewByRating($rating_star, $query);

    public function sortAndPagination($books, $sortBy, $perPage);
    public function filter($books, $authorName, $categoryName, $rating_star );
}