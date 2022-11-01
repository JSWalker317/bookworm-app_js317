import Accordion from 'react-bootstrap/Accordion';
import Card from 'react-bootstrap/Card';
import ListGroup from 'react-bootstrap/ListGroup';


function AllCollapseExample() {
  return (
    <>
    <Accordion defaultActiveKey="0">
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="0">
          Category
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="0">
            <ListGroup defaultActiveKey="#link">
            <ListGroup.Item>Cras justo odio</ListGroup.Item>
            <ListGroup.Item>Dapibus ac facilisis in</ListGroup.Item>
            <ListGroup.Item>Morbi leo risus</ListGroup.Item>
            <ListGroup.Item>Porta ac consectetur ac</ListGroup.Item>
            </ListGroup>
        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="1">
          Author
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="1">
          <ListGroup defaultActiveKey="#link">
            <ListGroup.Item>Cras justo odio</ListGroup.Item>
            <ListGroup.Item>Dapibus ac facilisis in</ListGroup.Item>
            <ListGroup.Item>Morbi leo risus</ListGroup.Item>
            <ListGroup.Item>Porta ac consectetur ac</ListGroup.Item>
          </ListGroup>
        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="2">
          Rating Review
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="2">
              <ListGroup defaultActiveKey="#1">
                <ListGroup.Item action href="#">1</ListGroup.Item>
                <ListGroup.Item>2</ListGroup.Item>
                <ListGroup.Item>3</ListGroup.Item>
                <ListGroup.Item>4</ListGroup.Item>
                <ListGroup.Item>5</ListGroup.Item>
              </ListGroup>
        </Accordion.Collapse>
      </Card>
    </Accordion>
    </>

  );
}

export default AllCollapseExample;