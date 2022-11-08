import React, { useEffect } from 'react'
import { Row, Col, ListGroup, Image, Form, Button, Card, Container } from 'react-bootstrap'

function Cart() {
    return ( 
    <Container className="mt-4">

    <Row>
      <Col md={8}>
        <h1>Shopping Cart</h1>

      </Col>
      <Col md={4}>
        <Card>
          <ListGroup variant='flush'>
            <ListGroup.Item>
              <h2>Cart totals</h2>
              9999999$
            </ListGroup.Item>
            <ListGroup.Item>
              <Button
                type='button'
                className='btn-block'
                // disabled={}
                // onClick={checkoutHandler}
              >
                Place Order
              </Button>
            </ListGroup.Item>
          </ListGroup>
        </Card>
      </Col>
    </Row>
    </Container>

  )
}

export default Cart;
