<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    // public function getBookById($bookId);
 
    // public function getCategoryById($cateId);
    // public function getAuthorById($authorId);
    public function getRatingReviewByRT($rating_start, $query);

    // 
    // public function getFinalPriceById($bookId);
    public function getListFinalPrice($bookId);
    // 
    public function getOnSale($query);
    public function getPopular($query);
    public function getRecommended($query);
    // 
    // public function getListBookFinal();
    public function getListSalePrice($query);




}