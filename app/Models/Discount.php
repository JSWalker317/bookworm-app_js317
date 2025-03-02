<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'discount';
     // default id
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'book_id',
        'discount_start_date',
        'discount_end_date',
        'discount_price'
    ];
    // public function scopeDiscount($query)
    // {
    //     return $query->where('price', '>', 200000);
    // }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
