<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'book_title' => $this->book_title,
            'book_summary' => $this->book_summary,
            'book_cover_photo' => $this->book_cover_photo,
            'author_name' => $this->author->author_name,
            'book_price' => $this->book_price,
            'final_price' => $this->final_price,
            'total_reviews' => $this-> total_review,
            'star_final' => $this->star_final,
            'category_name' => $this->category->category_name,

            // 'category' => new CategoryResource($this->category),
        ];
    }
}
