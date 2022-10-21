<?php

namespace App\Interfaces;

interface BookRepositoryInterface 
{
    public function getAllBooks();
    public function getBookById($bookId);
    public function deleteBook($bookId);
    public function createBook(array $bookDetails);
    public function updateBook($bookId, array $newDetails);
    // 
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