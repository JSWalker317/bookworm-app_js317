@extends('layouts.layout')

@section('content') 

    {{-- <h2>
        {{ $book->book_title }}
    </h2>
    <p>
        {{ $book->book_price }}
    </p>

    <p>
        {{ $book->book_summary}}
    </p> --}}
    <div class="row">
        <div class="col-4">
          <div class="card" style="width: 18rem">
            <img src={{URL::asset('assets/clients/images/bookcover/'.$book->book_cover_photo.'.jpg')}} alt="tag" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $book->book_title }}</h5>
              <p class="card-text">
                Author ID: {{ $book->author_id}}
              </p>
              <hr/>
              <p class="card-text">
                Price: {{ $book->book_price}}
              </p>
             
            </div>
          </div>
        </div>
@endsection
