<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'author_name' => $this->author_name,
            'book_price' => $this->book_price,
            'final_price' => $this->final_price,
            // 'total_review' => $this->total_review,
            //  'discounts' => DiscountResource::collection($this->discount),
            // 'reviews' => ReviewResource::collection($this->reviews),
            //  'category' => new CategoryResource($this->category),
        ];
    }
}
