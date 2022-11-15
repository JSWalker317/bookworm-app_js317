import React, { useEffect } from 'react';
import { Row, Col, ListGroup, Image, Form, Button, Card, Container } from 'react-bootstrap';
import './Cart.css';
import Table from 'react-bootstrap/Table';


function Cart() {
    return ( 
    <Container className="mt-4">
    <h3>Your Cart: 3 items</h3>
    <hr/>
    <Row>
      <Col xl={8}>
        <Table id="cssTable" bordered hover size="xs">
          <thead>
            <tr>
              <th>Product</th>
              <th className="p-name"></th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td className="cart-pic first-row"><img src={'images/bookcover/book1.jpg'} alt=""/></td>
                  <td  className="cart-title first-row">
                      <h5>Book title</h5>
                      <text>Author Name</text>
                  </td>
                  <td className="p-price first-row">$60.00</td>
                  <td className="qua-col first-row">
                      <div className="quantity">
                          <div className="pro-qty">
                              <span className="dec qtybtn">-</span>
                              <input type="text" value="1"/>
                              <span className="inc qtybtn">+</span>

                          </div>
                      </div>
                  </td>
                  <td className="total-price first-row">$60.00</td>
            
              </tr>


              <tr>
                  <td className="cart-pic"><img src={'images/bookcover/book1.jpg'} alt=""/></td>
                  <td className="cart-title">
                      <h5>American lobster</h5>
                  </td>
                  <td className="p-price">$60.00</td>
                  <td className="qua-col">
                      <div className="quantity">
                          <div className="pro-qty">
                              <input type="text" value="1"/>
                          </div>
                      </div>
                  </td>
                  <td className="total-price">$60.00</td>
                 
              </tr>

              <tr>
                  <td className="cart-pic"><img src={'images/bookcover/book1.jpg'} alt=""/></td>
                  <td className="cart-title">
                      <h5>Guangzhou sweater</h5>
                  </td>
                  <td className="p-price">$60.00</td>
                  <td className="qua-col">
                      <div className="quantity">
                          <div className="pro-qty">
                              <input type="text" value="1"/>
                          </div>
                      </div>
                  </td>
                  <td className="total-price">$60.00</td>
                 
              </tr>
          </tbody>
        </Table>
      </Col>
      <Col xl={4}>
        <Card className="text-center">
          <ListGroup variant='flush'>
            <ListGroup.Item className="p-1">
              <h4>Cart totals</h4>
            </ListGroup.Item>
            <ListGroup.Item className="p-4">
              <h3 className="p-4">99.99$</h3>                
              <Button
                variant="light"
                type='button'
                id='btn-order'
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
