<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class BooksFilter extends ApiFilter {
    protected $safeParms = [
        'id' => ['eq'],
        'categoryId' => ['eq'],
        'authorId' => ['eq'],
        'bookTitle' => ['eq'],
        'bookSummary' => ['eq'],
        'bookPrice' => ['eq', 'gt', 'gte','lt', 'lte'],
        'bookCoverPhoto' => ['eq']
    ];

    protected $columMap = [
        'bookPrice' => 'book_price', 
        'bookSummary' => 'book_summary',
        'categoryId' => 'category_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

  
}