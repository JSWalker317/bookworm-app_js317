@extends('layouts.layout')

@section('content') 
    
        <div class="row" >
          @foreach ($books as $book) 
            <div class="col-4 ">
              <div class="card mb-5" style="width: 18rem; ">
                <img style="height: 25rem;" src={{URL::asset('assets/clients/images/bookcover/'.$book->book_cover_photo.'.jpg')}} alt="tag" class="card-img-top">
                <div class="card-body">
                  <a href="/book/{{ $book['id'] }}" class="card-title ">{{ $book->book_title }}</a>
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
          @endforeach
       
        </div>
    
    
@endsection


