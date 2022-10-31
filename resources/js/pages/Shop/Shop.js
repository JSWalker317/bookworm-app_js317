import Accordion from '../../components/layouts/Accordion';
import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card';
import CardDeck from 'react-bootstrap/CardDeck';

import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';



function Shop() {
    return (
        <Container >
        <Row className="mt-4">
            <Col sm={3}><Accordion/></Col>
            <Col sm={9}>
                <Container>  
                <Row className="mb-3" >
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
                </Row>
                </Container>
            </Col>
        </Row>
    </Container>
    );
}

export default Shop;