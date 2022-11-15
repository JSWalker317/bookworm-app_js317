import {useState, useEffect} from 'react';
import { Row, Col, ListGroup, Image, Form, Button, Card, Container } from 'react-bootstrap';

import { useParams } from 'react-router-dom';
import React from 'react';
import './Product.css'


function Product() {
    const params = useParams()
    const bookId = params.bookId
    // console.log(bookId);

    function getProductData() 
    { 
        return fetch(`http://127.0.0.1:8000/api/reviews/${bookId}`)
        .then((response) => response.json())
    }

    const [productData, setProductData] = useState([]);
    useEffect(() =>{
        let mounted = true;
        getProductData()
        .then(items => {
            if(mounted) {
                setProductData(items.book)
            }
        })

    return () => mounted = false;
       
    }, []);

        return ( 
            <div className="m-5">

            {/* {console.log(productData.author_name)} */}
            <Col md={4}>
                <Card className="h-100">
                        <Card.Img className="card-img" variant="top" src={
                            ((productData.book_cover_photo == null) || (productData.book_cover_photo.length == 0))  ?
                                ('images/bookcover/default_book.jpg'):
                                ('images/bookcover/'+productData.book_cover_photo+'.jpg')
                        } />
                        <Card.Body>
                            <Card.Title className="book-title font-18px flex-grow-1">{productData.book_title}</Card.Title>
                            <Card.Text>
                                    {productData.author_name}
                            </Card.Text>
                        </Card.Body>
                        <Card.Footer>
                            { productData.book_price !== productData.final_price ? (
                            <>
                                <del className="text-muted mr-2">${productData.book_price}</del>
                                <small className="text-dark font-weight-bold">${productData.final_price}</small>
                            </>
                            ) : (
                            <>
                                <small className="text-dark font-weight-bold">${productData.final_price}</small>
                            </>
                            )}
                            
                        </Card.Footer>
                </Card>
            </Col>

            <Col md={8}>

            </Col>
           
              

                   
                
               
                
            </div>
        );
}

export default Product;