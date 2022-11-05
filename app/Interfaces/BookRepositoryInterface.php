<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function getRatingReviewByRT($rating_start, $query);
    public function getListFinalPrice($bookId);

    public function getOnSale($query);
    public function getPopular($query);
    public function getRecommended($query);

    public function getPrice_ASC($query);
    public function getPrice_DESC($query);
    
}