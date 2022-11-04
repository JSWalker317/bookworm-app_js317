
import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';
import Book5 from '../../../assets/bookcover/book5.jpg';
import Book6 from '../../../assets/bookcover/book6.jpg';
import Book7 from '../../../assets/bookcover/book7.jpg';
import Book8 from '../../../assets/bookcover/book8.jpg';
import Book9 from '../../../assets/bookcover/book9.jpg';
import Book10 from '../../../assets/bookcover/book10.jpg';


import defaultBookCover from '../../../assets/bookcover/default_book.jpg';

import Card from 'react-bootstrap/Card';
import React from 'react';
import axios from 'axios';

const objectBookCover = {
    book1: Book1,
    book2: Book2,
    book3: Book3,
    book4: Book4,
    book5: Book5,
    book6: Book6,
    book7: Book7,
    book8: Book8,
    book9: Book9,
    book10: Book10
  };
export default class CardBook extends React.Component {
    state = {
        onSaleBooks: [],
        recommendedBooks: [],
        popularBooks: [],
        defaultBooks: [],
        recommended: true //button
      };
    
      componentDidMount() {
        axios.get('http://127.0.0.1:8000/api/books/getOnSale').then((result) => {
          // console.log(result.data);
          const onSaleBooks = result.data;
          onSaleBooks.map((book) =>
            Object.keys(book).forEach((key) => {
              if (key === 'book_cover_photo') {
                if (book[key] === null || book[key] === 'null') {
                  book[key] = defaultBookCover;
                } else {
                  book[key] = objectBookCover[book[key]];
                }
              }
            })
          );
          this.setState({ onSaleBooks: onSaleBooks });
          console.log(this.state.onSaleBooks);
        });
    }
    render() {
        return (
            <div className="m-5">
                {this.state.onSaleBooks.map((book) => {
                return (
                        <Card key={book.id}>
                                <Card.Img variant="top" src={book.book_cover_photo} />
                                <Card.Body>
                                    <Card.Title>{book.book_title}</Card.Title>
                                    <Card.Text>
                                            {book.author_id}
                                    </Card.Text>
                                </Card.Body>
                                <Card.Footer>
                                <small className="text-muted">Price: ${book.book_price}</small>
                                </Card.Footer>
                        </Card>
                );
                })}            
            </div>
        );
    }
}