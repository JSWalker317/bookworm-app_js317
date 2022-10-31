import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import bookworm from '../../../assets/icon_bw.png';
import './Header.css';

function Header() {
  return (
    <>
      <Navbar id='header' variant="dark" sticky="top">
        <Container>
            <Navbar.Brand href="home" className="alight-center" >
                <img alt="Bookworm logo"
                src={bookworm}
                width="40"
                height="40"
                className="d-inline-block align-center"
                />{' '}
                 BOOKWORM
            </Navbar.Brand>
                <Nav className="d-flex">
                <Nav.Link href="home">Home</Nav.Link>
                <Nav.Link href="shop">Shop</Nav.Link>
                <Nav.Link href="about">About</Nav.Link>
                <Nav.Link href="cart">Cart(0)</Nav.Link>
                <Nav.Link href="signin">Sign In</Nav.Link>
                </Nav>
        </Container>
      </Navbar>
    
    </>
  );
}

export default Header;