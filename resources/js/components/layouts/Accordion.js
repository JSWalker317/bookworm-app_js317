import Accordion from 'react-bootstrap/Accordion';
import Card from 'react-bootstrap/Card';


function AllCollapseExample() {
  return (
    <>
    <Accordion defaultActiveKey="0">
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="0">
          Category
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="0">
          <Card.Body>
            <li>larson</li>
            <li>satterfield</li>
            <li>abbott</li>
          </Card.Body>
        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="1">
          Author
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="1">
          <Card.Body>Shawna Reinger</Card.Body>
          {/* <Card.Body>Adrianna Christiansen</Card.Body>
          <Card.Body>Brooklyn Braun</Card.Body>
          <Card.Body>Rahul Auer</Card.Body> */}

        </Accordion.Collapse>
      </Card>
      <Card>
        <Accordion.Toggle as={Card.Header} eventKey="2">
          Rating Review
        </Accordion.Toggle>
        <Accordion.Collapse eventKey="2">
          <Card.Body>1</Card.Body>
          {/* <Card.Body>2</Card.Body>
          <Card.Body>3</Card.Body>
          <Card.Body>4</Card.Body>
          <Card.Body>5</Card.Body> */}

        </Accordion.Collapse>
      </Card>
    </Accordion>
    </>

  );
}

export default AllCollapseExample;