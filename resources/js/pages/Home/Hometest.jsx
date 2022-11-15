
// import Book1 from '../../../assets/bookcover/book1.jpg';
// import Book2 from '../../../assets/bookcover/book2.jpg';
// import Book3 from '../../../assets/bookcover/book3.jpg';
// import Book4 from '../../../assets/bookcover/book4.jpg';
// import Book5 from '../../../assets/bookcover/book5.jpg';
// import Book6 from '../../../assets/bookcover/book6.jpg';
// import Book7 from '../../../assets/bookcover/book7.jpg';
// import Book8 from '../../../assets/bookcover/book8.jpg';
// import Book9 from '../../../assets/bookcover/book9.jpg';
// import Book10 from '../../../assets/bookcover/book10.jpg';


// import defaultBookCover from '../../../assets/bookcover/default_book.jpg';


import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Card from 'react-bootstrap/Card';
import CardDeck from 'react-bootstrap/CardDeck';
import Carousel from 'react-bootstrap/Carousel';
import Tab from 'react-bootstrap/Tab';
import Nav from 'react-bootstrap/Nav';
import ListGroup from 'react-bootstrap/ListGroup';
import {useState,useEffect} from 'react';
import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from 'reactstrap';
import axios from 'axios';
import CardBook from '../../components/book/CardBook'
// const objectBookCover = {
//     book1: Book1,
//     book2: Book2,
//     book3: Book3,
//     book4: Book4,
//     book5: Book5,
//     book6: Book6,
//     book7: Book7,
//     book8: Book8,
//     book9: Book9,
//     book10: Book10
//   };
export default class Home extends React.Component {
    // const [books, setBooks] = useState([]);
    
    // const componentDidMount()=> {
    //     axios.get(`http://127.0.0.1:8000/api/books/getOnSale`)
    //       .then(res => {
    //         // console.log(res.data)
    //         const bookData = res.data;
    //         // setBooks(bookData)
    //         bookData.map((book) =>
          
    //       );
    //     });
    // }
    //   useEffect(()=> {
    //     componentDidMount().then(res =>{
    //         books.length!=0? console.log( "oke"):
    //         console.log(books)
    //     })

    //   },[])

    // state = {
    //     onSaleBooks: [],
    //     recommendedBooks: [],
    //     popularBooks: [],
    //     defaultBooks: [],
    //     recommended: true //button
    //   };
    
    //   componentDidMount() {
    //     axios.get('http://127.0.0.1:8000/api/books/getOnSale').then((result) => {
    //       // console.log(result.data);
    //       const onSaleBooks = result.data;
    //       onSaleBooks.map((book) =>
    //         Object.keys(book).forEach((key) => {
    //           if (key === 'book_cover_photo') {
    //             if (book[key] === null || book[key] === 'null') {
    //               book[key] = defaultBookCover;
    //             } else {
    //               book[key] = objectBookCover[book[key]];
    //             }
    //           }
    //         })
    //       );
    //       this.setState({ onSaleBooks: onSaleBooks });
    //       console.log(this.state.onSaleBooks);
    //     });
    // }

    // componentDidMount() {
    //     axios.get('http://127.0.0.1:8000/api/books/getRecommended').then((result) => {
    //       // console.log(result.data);
    //       const recommendedBooks = result.data;
    //       recommendedBooks.map((book) =>
    //         Object.keys(book).forEach((key) => {
    //           if (key === 'book_cover_photo') {
    //             if (book[key] === null || book[key] === 'null') {
    //               book[key] = defaultBookCover;
    //             } else {
    //               book[key] = objectBookCover[book[key]];
    //             }
    //           }
    //         })
    //       );
    //       this.setState({ recommendedBooks: recommendedBooks });
    //       console.log(this.state.recommendedBooks);
    //     });
    // }
    render() {
        return (
            
            <div className="m-5">
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
            
            <CardBook/>


            {/* <ListGroup.Item>    
            <Carousel className="m-5">
            
            {this.state.onSaleBooks.map((book) => {
              return (
                
                  <Carousel.Item key={book.id} interval={1000}>
                  <CardDeck key={book.id}>
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
                    </Card> */}
                      {/* <Card>
                          <Card.Img variant="top" src={Book2} />
                          <Card.Body>
                          <Card.Title></Card.Title>
                          <Card.Text>
                              This card has 
                          </Card.Text>
                          </Card.Body>
                          <Card.Footer>
                          <small className="text-muted">Price: $1000</small>
                          </Card.Footer>
                      </Card>
                      <Card>
                          <Card.Img variant="top" src={Book3} />
                          <Card.Body>
                          <Card.Title></Card.Title>
                          <Card.Text>
                              This is a wider 
                          </Card.Text>
                          </Card.Body>
                          <Card.Footer>
                          <small className="text-muted">Price: $1000</small>
                          </Card.Footer>
                      </Card>
                      <Card>
                          <Card.Img variant="top" src={Book4} />
                          <Card.Body>
                          <Card.Title></Card.Title>
                          <Card.Text>
                              This is a wider 
                          </Card.Text>
                          </Card.Body>
                          <Card.Footer>
                          <small className="text-muted">Price: $1000</small>
                          </Card.Footer>
                      </Card> */}
                  {/* </CardDeck>
                      
                  </Carousel.Item>
                  

              );
            })}      */}
          
            {/* <Carousel.Item interval={500}>
            <CardDeck>
                        <Card>
                            <Card.Img variant="top" src={Book1} />
                            <Card.Body>
                            <Card.Title>{bookData}</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book2} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This card has 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book3} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book4} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                    </CardDeck>
            </Carousel.Item>
            <Carousel.Item>
            <CardDeck>
                        <Card>
                            <Card.Img variant="top" src={Book1} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book2} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This card has 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book3} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                        <Card>
                            <Card.Img variant="top" src={Book4} />
                            <Card.Body>
                            <Card.Title>Card title</Card.Title>
                            <Card.Text>
                                This is a wider 
                            </Card.Text>
                            </Card.Body>
                            <Card.Footer>
                            <small className="text-muted">Price: $1000</small>
                            </Card.Footer>
                        </Card>
                    </CardDeck>
            </Carousel.Item> */}
            {/* </Carousel>
            </ListGroup.Item> */}

            {/* <h3 className="text-center m-4">Featured Books</h3>

            <Tab.Container id="left-tabs-example" defaultActiveKey="first">

                <Row className="row justify-content-center mb-3" >
                    <Nav variant="pills">
                        <Nav.Item>
                        <Nav.Link color="secondary" eventKey="first">Recommended</Nav.Link>
                        </Nav.Item>
                        <Nav.Item>
                        <Nav.Link color="secondary" eventKey="second">Popular</Nav.Link>
                        </Nav.Item>
                    </Nav>
                </Row>


                <ListGroup.Item>
                <Row className="row justify-content-center " >
                    <Tab.Content>
                        <Tab.Pane eventKey="first">
                        <span > */}
            {/* <div className="border border-4 m-5 p-2"> */}
                            {/* <Container >  
                            <Row className="mb-4">
                                <CardDeck>
                                    <Card>
                                        <Card.Img variant="top" src={Book1} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book2} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This card has 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book3} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book4} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                </CardDeck>
                            </Row>
                            <Row className="mb-3">
                            <CardDeck>
                                    <Card>
                                        <Card.Img variant="top" src={Book1} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book2} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This card has 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book3} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                    <Card>
                                        <Card.Img variant="top" src={Book4} />
                                        <Card.Body>
                                        <Card.Title>Card title</Card.Title>
                                        <Card.Text>
                                            This is a wider 
                                        </Card.Text>
                                        </Card.Body>
                                        <Card.Footer>
                                        <small className="text-muted">Price: $1000</small>
                                        </Card.Footer>
                                    </Card>
                                </CardDeck>
                            </Row>
                            </Container>

                        </span>

            
                        </Tab.Pane>
                        <Tab.Pane eventKey="second">
                        <h1>second</h1>
                        </Tab.Pane>
                    </Tab.Content>
                </Row>
                </ListGroup.Item>
            </Tab.Container> */}

            {/* <div className="row justify-content-center mb-2">
                <Button className="m-1  p-2 "
                    color="secondary" size="sm" to="/shop">
                    Recommended 
                </Button>
                <Button className="m-1  p-2" 
                    color="secondary" size="sm" to="/shop">
                    Popular
                </Button>
            </div> */}
        
            </div>

        //   </section>
        
        );
    }
}