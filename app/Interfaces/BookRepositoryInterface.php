<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function getBookById($bookId);
 
    public function getCategoryById($cateId);
    public function getAuthorById($authorId);
    public function getRatingReviewByRT($ratingStart);
    // 
    public function getFinalPriceById($bookId);
    public function getListFinalPrice($bookId);
    // 
    public function getListSalePrice();
    public function getPopular();
    public function getRecommended();
    // 
    public function getListBookFinal();



}