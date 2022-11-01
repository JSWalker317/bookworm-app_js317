
import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';

import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card';
import CardDeck from 'react-bootstrap/CardDeck';
import Carousel from 'react-bootstrap/Carousel';
import Tab from 'react-bootstrap/Tab';
import Nav from 'react-bootstrap/Nav';
import ListGroup from 'react-bootstrap/ListGroup';
// import Sonnet from '../../components/Sonnet';






import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from 'reactstrap';

const Home = (props) => {
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
{/*  */}
        
        <ListGroup.Item>    
        <Carousel className="m-5">
        <Carousel.Item interval={1000}>
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
            
        </Carousel.Item>
        <Carousel.Item interval={500}>
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
        </Carousel.Item>
        </Carousel>
        </ListGroup.Item>

        <h3 className="text-center m-4">Featured Books</h3>

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
                    <span >
         {/* <div className="border border-4 m-5 p-2"> */}
                        <Container >  
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
        </Tab.Container>

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


export default Home;