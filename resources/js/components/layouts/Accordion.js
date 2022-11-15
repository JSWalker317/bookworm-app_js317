import Accordion from 'react-bootstrap/Accordion';
import Card from 'react-bootstrap/Card';
import ListGroup from 'react-bootstrap/ListGroup';
import {useState, useEffect} from 'react';
import './Accordion.css'

function AllCollapseExample() {
  const [authorData, setAuthorData] = useState([]);
  const [categoryData, setCategoryData] = useState([]);

  useEffect(() =>{
      fetch(`http://127.0.0.1:8000/api/shop/getCategoryName`)
      .then((response) =>response.json())
      .then((response) => setCategoryData(response.data))
      .catch((error) => console.log(error))
  }, []);

  useEffect(() =>{
    fetch("http://127.0.0.1:8000/api/shop/getAuthorName")
    .then((response) =>response.json())
    .then((response) => setAuthorData(response.data))
    .catch((error) => console.log(error))
  }, []);


  return (
    <>
    {/* {console.log(categoryData)} */}
    <Accordion className="mt-4" defaultActiveKey="0">
      <Card className="accordion-card">
        <Accordion.Toggle as={Card.Header} eventKey="0">
          Category
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="0">
            <ListGroup  defaultActiveKey="#">
            {categoryData.map((categoryName,idx) => {
              return(
                <ListGroup.Item className='item-group' action href={'#'+categoryName.category_name} key={idx}>{categoryName.category_name}</ListGroup.Item>

              );

            })}

            {/* <ListGroup.Item>Dapibus ac facilisis in</ListGroup.Item>
            <ListGroup.Item>Morbi leo risus</ListGroup.Item>
            <ListGroup.Item>Porta ac consectetur ac</ListGroup.Item> */}
            </ListGroup>
        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="1">
          Author
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="1">
          <ListGroup defaultActiveKey="#">
            {authorData.map((authorName,idx) => {
                return(
                  // {'images/bookcover/' + book.book_cover_photo + '.jpg'}
                  <ListGroup.Item className='item-group' action href={'#'+authorName.author_name} key={idx}>{authorName.author_name}</ListGroup.Item>
                );

              })}
          </ListGroup>
        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="2">
          Rating Review
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="2">
              <ListGroup  defaultActiveKey="#">
                <ListGroup.Item className='item-group' action href="#1">1</ListGroup.Item>
                <ListGroup.Item className='item-group' action href="#2">2</ListGroup.Item>
                <ListGroup.Item className='item-group' action href="#3">3</ListGroup.Item>
                <ListGroup.Item className='item-group' action href="#4">4</ListGroup.Item>
                <ListGroup.Item className='item-group' action href="#5">5</ListGroup.Item>
              </ListGroup>
        </Accordion.Collapse>
      </Card>
    </Accordion>
    </>

  );
}

export default AllCollapseExample;