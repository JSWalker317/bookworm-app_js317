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
       console.log(result.data.data);
      const onSaleBooks = result.data.data;
      this.setState({ onSaleBooks: onSaleBooks });
    });
    axios.get('http://127.0.0.1:8000/api/books/getRecommended').then((result) => {
      // console.log(result.data);
      const recommendedBooks = result.data.data;
      this.setState({ recommendedBooks, defaultBooks: recommendedBooks });
    });
    axios.get('http://localhost:8000/api/books/getPopular').then((result) => {
      // console.log(result.data);
      const popularBooks = result.data.data;
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
 
  render() {
    return (
        <div className="m-5">
                <div className="row mb-2">
                    <h4 className="col-md-6">On Sale</h4>
                    <Link className="col-md-6 d-flex justify-content-end" to="/shop">
                        <Button color="primary" size="sm" to="/shop">
                        View All 
                        </Button>
                    </Link>
                </div>
          <div id="mainSwipe" className='p-4'>
          <Swiper
            spaceBetween={30}
            slidesPerView={4}
            navigation={true}
            loop={false}
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
                  spaceBetween: 25,
                },
                "@1.50": {
                  slidesPerView: 4,
                  spaceBetween: 30,
                },
              }}>
            {this.state.onSaleBooks.map((book, idx) => {
              if ((book.book_cover_photo == null) || (book.book_cover_photo.length == 0)) {
                book.book_cover_photo = 'default_book';
              }
              return (
                <SwiperSlide key={idx} className="carousel">
                  <a href={`${book.id}`}>
                    <Card className="h-100">
                      <Card.Img className="card-img" variant="top" src={'images/bookcover/' + book.book_cover_photo + '.jpg'}  />
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
          </div>

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
            <div id="mainRow" className="row pt-4">
              {this.state.defaultBooks.map((book) => {
                  if ((book.book_cover_photo == null) || (book.book_cover_photo.length == 0)) {
                    book.book_cover_photo = 'default_book';
                  }
                return (
                  <a
                    href={`${book.id}`}
                    className="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 align-items-stretch"
                    key={book.id}>
                    <Card className="h-100">
                      <Card.Img className="card-img" variant="top" src={'images/bookcover/' + book.book_cover_photo + '.jpg'}  />
                      <Card.Body>
                      <Card.Title className="book-title font-18px flex-grow-1">{book.book_title}</Card.Title>
                      <Card.Text>{book.author_name}</Card.Text>
                      </Card.Body>
                      <Card.Footer>
                        { book.book_price !== book.final_price ? (
                          <>
                            <del className="text-muted mr-2">${book.book_price}</del>
                            <small className="text-dark font-weight-bold">${book.final_price}</small>
                          </>
                        ) : (
                          <>
                            {/* <del className="text-muted mr-2">${book.book_price}</del> */}
                            <small className="text-dark font-weight-bold">${book.final_price}</small>
                          </>
                        )}
                          
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
