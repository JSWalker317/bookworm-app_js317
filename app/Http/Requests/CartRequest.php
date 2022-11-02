<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules($id)
    {        
        // $books = Book::findOrFail($id);
        return [
            // 'id' => 'required|unique',
            // 'order_id'=> 'required|integer',
            // 'book_id' => $id,
            // 'quantity' => 'required|integer',
            // 'price' => $books->book_price,
        ];
    }
}
