import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import {Link } from 'react-router-dom';
import bookworm from '../../../assets/icon_bw.png';
import './Header.css';
import Login from '../../pages/Login/Login';
import {useState} from 'react';


function Header(props) {
  const [btnPopup, setBtnPopup] = useState(true);

  return (
    <>
      <Navbar collapseOnSelect expand="md" id='header' variant="dark" sticky="top">
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
            <Navbar.Toggle aria-controls="responsive-navbar-nav" />
            <Navbar.Collapse
                    id="responsive-navbar-nav"
                    className="justify-content-end"
            >
              <Nav className="d-flex">
                <Nav.Link eventKey={'/home'} as={Link} to="/home">Home</Nav.Link>
                <Nav.Link eventKey={'/shop'} as={Link} to="/shop">Shop</Nav.Link>
                <Nav.Link eventKey={'/about'} as={Link} to="/about">About</Nav.Link>
                <Nav.Link eventKey={'/cart'} as={Link} to="/cart">Cart(0)</Nav.Link>
                <Nav.Link id="login" onClick={() => setBtnPopup(true)}>Sign In</Nav.Link>
                
              </Nav>
            </Navbar.Collapse>
        </Container>
      </Navbar>
     
    </>
  );
}

export default Header;