
import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';

import Container from 'react-bootstrap/Container';
import Row from 'react-bootstrap/Row';
// import Col from 'react-bootstrap/Col';
import Card from 'react-bootstrap/Card';
import CardDeck from 'react-bootstrap/CardDeck';
import Carousel from 'react-bootstrap/Carousel';





import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from 'reactstrap';

const Home = (props) => {
    return (
        <div>
            <div className="container mt-3">
            <div className="row ">
                <h4 className="col-md-6">On Sale</h4>
                <Link className="col-md-6 d-flex justify-content-end" to="/shop">
                    <Button color="secondary" size="sm" to="/shop">
                    View All 
                    </Button>
                </Link>
            </div>
            </div>
{/*  */}
            
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

{/*  */}

        {/* <Swiper className="m-5"
            // install Swiper modules
            modules={[Navigation, Pagination, Scrollbar, A11y]}
            spaceBetween={20}
            slidesPerView={4}
            navigation
            pagination={{ clickable: true }}
            scrollbar={{ draggable: true }}
            onSwiper={(swiper) => console.log(swiper)}
            onSlideChange={() => console.log('slide change')}
            >
            <SwiperSlide>
                <Card>
                    <Card.Img variant="top" src={Book1} />
                    <Card.Body>
                    <Card.Title>Card title</Card.Title>
                    <Card.Text>
                        This is a wider card with supporting text 
                    </Card.Text>
                    </Card.Body>
                    <Card.Footer>
                    <small className="text-muted">Price: $1000</small>
                    </Card.Footer>
                </Card>
            </SwiperSlide>
            <SwiperSlide>
            <Card>
                    <Card.Img variant="top" src={Book2} />
                    <Card.Body>
                    <Card.Title>Card title</Card.Title>
                    <Card.Text>
                        This is a wider card with supporting text 
                    </Card.Text>
                    </Card.Body>
                    <Card.Footer>
                    <small className="text-muted">Price: $1000</small>
                    </Card.Footer>
                </Card>
            </SwiperSlide>
            <SwiperSlide>
            <Card>
                    <Card.Img variant="top" src={Book3} />
                    <Card.Body>
                    <Card.Title>Card title</Card.Title>
                    <Card.Text>
                        This is a wider card with supporting text 
                    </Card.Text>
                    </Card.Body>
                    <Card.Footer>
                    <small className="text-muted">Price: $1000</small>
                    </Card.Footer>
                </Card>
            </SwiperSlide>
            <SwiperSlide>
            <Card>
                    <Card.Img variant="top" src={Book4} />
                    <Card.Body>
                    <Card.Title>Card title</Card.Title>
                    <Card.Text>
                        This is a wider card with supporting text
                    </Card.Text>
                    </Card.Body>
                    <Card.Footer>
                    <small className="text-muted">Price: $1000</small>
                    </Card.Footer>
                </Card>
            </SwiperSlide>
            <SwiperSlide>
            <Card>
                    <Card.Img variant="top" src={Book1} />
                    <Card.Body>
                    <Card.Title>Card title</Card.Title>
                    <Card.Text>
                        This is a wider card with supporting text
                    </Card.Text>
                    </Card.Body>
                    <Card.Footer>
                    <small className="text-muted">Price: $1000</small>
                    </Card.Footer>
                </Card>
            </SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
        </Swiper> */}

        <h3 className="text-center"> Featured Books</h3>
        <div className="row justify-content-center ">
            <Button className="m-1"
                color="secondary" size="sm" to="/shop">
                Recommended 
            </Button>
            <Button className="m-1" 
                color="secondary" size="sm" to="/shop">
                Popular
            </Button>
        </div>

        <span className="border border-secondary">
            <Container >  
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
            <Row className="mb-3">
                row3
            </Row>
            </Container>

        </span>

        
        </div>

    //   </section>
       
    );
}


export default Home;