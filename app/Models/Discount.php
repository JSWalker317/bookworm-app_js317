<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'discount';
     // default id
    protected $primaryKey = 'id';

    // public function scopeDiscount($query)
    // {
    //     return $query->where('price', '>', 200000);
    // }

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }
}
