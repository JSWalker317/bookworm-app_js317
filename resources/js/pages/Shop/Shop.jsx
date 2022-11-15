import Accordion from '../../components/layouts/Accordion';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card';
import CardDeck from 'react-bootstrap/CardDeck';
import { Button } from 'reactstrap';
import DropdownButton from 'react-bootstrap/DropdownButton';
import Dropdown from 'react-bootstrap/Dropdown';
import ButtonGroup from 'react-bootstrap/ButtonGroup';


import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';
import {useState, useEffect} from 'react';


function Shop() {
    const [shopData, setShopData] = useState([]);
    useEffect(() =>{
        fetch("http://127.0.0.1:8000/api/shop")
        .then((response) =>response.json())
        .then((response) => setShopData(response.data))
        .catch((error) => console.log(error))
    }, []);

    return (
        <div className=" m-5">
        {/* {console.log(shopData)} */}

        {/* <Container> */}
        <h3>Books</h3>
        <hr/>

        <Row className="mt-4">
            <Col sm={3}>
                <h4>Filter By</h4>
                <Accordion/>
            </Col>
            <Col sm={9}>
                <Container fluid> 
                    <Row>
                        <Col><h5>Showing 1-12 of 126 books</h5></Col>
                        <Col>
                            <div className="row justify-content-end mb-2">

                                <DropdownButton as={ButtonGroup} title="Sort by on sale" id="bg-nested-dropdown"
                                className="m-1">
                                    <Dropdown.Item eventKey="1">Sort by popularity</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Sort by price: low to high</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Sort by price: high to low</Dropdown.Item>
                                </DropdownButton>

                                <DropdownButton as={ButtonGroup} title="Show 20" id="bg-nested-dropdown"
                                className="m-1">
                                    <Dropdown.Item eventKey="1">Show: 5</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Show: 15</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Show: 20</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Show: 25</Dropdown.Item>
                                </DropdownButton>
                            </div>
                        </Col>

                    </Row>
                    <div className="book-list">
                        <div id="mainRow" className="row pt-4">
                            {shopData.map((book) => {
                                 if ((book.book_cover_photo == null) || (book.book_cover_photo.length == 0)) {
                                    book.book_cover_photo = 'default_book';
                                }
                                return (
                                    <a
                                        href={`${book.id}`}
                                        className="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 align-items-stretch"
                                        key={book.id}>
                                        <Card className="h-100">
                                        <Card.Img className="card-img" 
                                            variant="top" 
                                            src={'images/bookcover/' + book.book_cover_photo + '.jpg'} 
                                            />
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
                    
                    {/* <Button className="m-1  p-2 "
                        color="secondary" size="sm" to="/shop">
                        Sort by on sale 
                    </Button>
                    <Button className="m-1  p-2" 
                        color="secondary" size="sm" to="/shop">
                        Show 20
                    </Button> */}
                {/* <Row className="mb-4" >
                    <CardDeck>
                        {shopData.map((book, idx) => {
                             <Card key={idx}>
                             <Card.Img variant="top" src={Book1} />
                             <Card.Body>
                             <Card.Title>{book.book_title}</Card.Title>
                             <Card.Text>
                             {book.book_summary}
                             </Card.Text>
                             </Card.Body>
                             <Card.Footer>
                             <small className="text-muted">Price:{book.final_price}</small>
                             </Card.Footer>
                         </Card>
                        })}
                       
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
                <Row >
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
                <Row >
                    row3
                </Row> */}
                </Container>
            </Col>
        </Row>
    {/* </Container> */}
    </div>
    );
}

export default Shop;