
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
import './Home.css';

import React from 'react';
import { Link } from 'react-router-dom';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Autoplay } from 'swiper';
import 'swiper/css/navigation';
import 'swiper/css';
import Card from 'react-bootstrap/Card';
import { Button } from 'reactstrap';


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

export default class Home extends React.Component {
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
      const onSaleBooks = result.data.data;
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
    });
    axios.get('http://127.0.0.1:8000/api/books/getRecommended').then((result) => {
      // console.log(result.data);
      const recommendedBooks = result.data.data;
      recommendedBooks.map((book) =>
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
      this.setState({ recommendedBooks, defaultBooks: recommendedBooks });
    });
    axios.get('http://localhost:8000/api/books/getPopular').then((result) => {
      // console.log(result.data);
      const popularBooks = result.data.data;
      popularBooks.map((book) =>
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
      this.setState({ popularBooks: popularBooks });
    });
  }
  recommendedBookClick = () => {
    this.setState({ defaultBooks: this.state.recommendedBooks });
    this.setState({ recommended: true });
  };
  popularBookClick = () => {
    this.setState({ defaultBooks: this.state.popularBooks });
    this.setState({ recommended: false });
  };
  // nextPath(path) {
  //   this.props.push(path);
  // }
  render() {
    return (
        <div className=" m-5">
                <div className="mb-2">
                <div className="row ">
                    <h4 className="col-md-6">On Sale</h4>
                    <Link className="col-md-6 d-flex justify-content-end" to="/shop">
                        <Button color="primary" size="sm" to="/shop">
                        View All 
                        </Button>
                    </Link>
                </div>
                </div>
          <Swiper
            spaceBetween={30}
            slidesPerView={4}
            navigation={true}
            loop={true}
            loopFillGroupWithBlank={false}
            modules={[Autoplay, Navigation]}
            autoplay={{
              delay: 4000,
              disableOnInteraction: false
            }}
            breakpoints={{
                "@0.00": {
                  slidesPerView: 1,
                  spaceBetween: 10,
                },
                "@0.75": {
                  slidesPerView: 2,
                  spaceBetween: 20,
                },
                "@1.00": {
                  slidesPerView: 3,
                  spaceBetween: 40,
                },
                "@1.50": {
                  slidesPerView: 4,
                  spaceBetween: 40,
                },
              }}>
            {this.state.onSaleBooks.map((book, idx) => {
              return (
                <SwiperSlide key={idx} className="carousel">
                  <a href={`shop/${book.id}`}>
                    <Card className="h-100">
                      <Card.Img className="card-img" variant="top" src={book.book_cover_photo} />
                      <Card.Body>
                      <Card.Title className="book-title font-18px flex-grow-1">{book.book_title}</Card.Title>
                      <Card.Text>{book.author_name}</Card.Text>
                      </Card.Body>
                      <Card.Footer>
                      <del className="text-muted mr-2">${book.book_price}</del>
                      <small className="text-dark font-weight-bold">${book.final_price}</small>
                      </Card.Footer>
                    </Card>
                  </a>
                </SwiperSlide>
              );
            })}
          </Swiper>
          <div className="book-list">
            <div className="text-center">
            <h3 className="text-center mb-4 mt-4">Featured Books</h3>
              <div className="mb-4">
                <Button
                  color={this.state.recommended ? 'secondary' : 'link'}
                  onClick={this.recommendedBookClick}>
                  Recommended
                </Button>

                <Button
                  color={this.state.recommended ? 'link' : 'secondary'}
                  onClick={this.popularBookClick}>
                  Popular
                </Button>
              </div>
            </div>
            <div id="mainRow" className="row">
              {this.state.defaultBooks.map((book) => {
                return (
                  <a
                    href={`shop/${book.id}`}
                    className="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 align-items-stretch"
                    key={book.id}>
                    <Card className="h-100">
                      <Card.Img className="card-img" variant="top" src={book.book_cover_photo} />
                      <Card.Body>
                      <Card.Title className="book-title font-18px flex-grow-1">{book.book_title}</Card.Title>
                      <Card.Text>{book.author_name}</Card.Text>
                      </Card.Body>
                      <Card.Footer>
                      <small className="text-dark font-weight-bold">Price: ${book.final_price}</small>
                      </Card.Footer>
                    </Card>
                  </a>
                );
              })}
            </div>
          </div>
        </div>
    );
  }
}
