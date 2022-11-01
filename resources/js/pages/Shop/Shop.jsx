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



function Shop() {
    return (

        <Container >
        <h2>Books</h2>
        <hr/>

        <Row className="mt-4">
            <Col sm={3}>
                <h4>Filter By</h4>
                <Accordion/>
            </Col>
            <Col sm={9}>
                <Container> 
                    <Row>
                        <Col><h5>Showing 1-12 of 126 books</h5></Col>
                        <Col>
                            <div className="row justify-content-end mb-2">
                                <DropdownButton as={ButtonGroup} title="Sort by on sale" id="bg-nested-dropdown"
                                className="m-1">
                                    <Dropdown.Item eventKey="1">Dropdown link</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Dropdown link</Dropdown.Item>
                                </DropdownButton>

                                <DropdownButton as={ButtonGroup} title="Show 20" id="bg-nested-dropdown"
                                className="m-1">
                                    <Dropdown.Item eventKey="1">Dropdown link</Dropdown.Item>
                                    <Dropdown.Item eventKey="2">Dropdown link</Dropdown.Item>
                                </DropdownButton>
                            </div>
                        </Col>

                    </Row>
                  
                    {/* <Button className="m-1  p-2 "
                        color="secondary" size="sm" to="/shop">
                        Sort by on sale 
                    </Button>
                    <Button className="m-1  p-2" 
                        color="secondary" size="sm" to="/shop">
                        Show 20
                    </Button> */}
                <Row className="mb-4" >
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