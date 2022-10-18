<?php

namespace App\Filters;
use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class DiscountsFilter extends ApiFilter {
    protected $safeParms = [
        'id' => ['eq'],
        'bookId' => ['eq'],
        'discountPrice' => ['eq', 'gt', 'gte','lt', 'lte'],
        'discountStartDate' => ['eq'],
        'discountEndDate' => ['eq'],
    ];

    protected $columMap = [
        'bookId' => 'book_id', 
        'discountPrice' => 'discount_price',
        'discountStartDate' => 'discount_start_date',
        'discountEndDate' => 'discount_end_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

  
}