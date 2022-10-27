<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'review';
      // default id
    protected $primaryKey = 'id';
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'book_id',
      'review_title',
      'review_details',
      'review_date',
      'rating_start',
    ];


    public function Book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
