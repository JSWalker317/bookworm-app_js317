import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import {Link } from 'react-router-dom';
import bookworm from '../../../assets/icon_bw.png';
import './Header.css';

function Header() {
  return (
    <>
      <Navbar id='header' variant="dark" sticky="top">
        <Container>
            <Navbar.Brand href="/" className="alight-center" >
                <img alt="Bookworm logo"
                src={bookworm}
                width="40"
                height="40"
                className="d-inline-block align-center"
                />{' '}
                 BOOKWORM
            </Navbar.Brand>
            <Nav className="d-flex">
            {/* <Nav.Link href="home">Home</Nav.Link> */}
            <Nav.Link eventKey={'/home'} as={Link} to="/home">Home</Nav.Link>
            <Nav.Link eventKey={'/shop'} as={Link} to="/shop">Shop</Nav.Link>
            <Nav.Link eventKey={'/about'} as={Link} to="/about">About</Nav.Link>
            <Nav.Link eventKey={'/cart'} as={Link} to="/cart">Cart(0)</Nav.Link>
            <Nav.Link eventKey={'/login'} as={Link} to="/login">Sign In</Nav.Link>

            {/* <Nav.Link href="shop">Shop</Nav.Link>
            <Nav.Link href="about">About</Nav.Link>
            <Nav.Link href="cart">Cart(0)</Nav.Link>
            <Nav.Link href="login">Sign In</Nav.Link> */}
            </Nav>
           
        </Container>
      </Navbar>
    </>
  );
}

export default Header;