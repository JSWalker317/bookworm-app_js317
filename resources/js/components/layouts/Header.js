import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import {Link } from 'react-router-dom';
import './Header.css';
import Login from '../../pages/Login/Login';
import {useState} from 'react';
import Button from 'react-bootstrap/Button';
import Modal from 'react-bootstrap/Modal';
import Form from 'react-bootstrap/Form';

function Header(props) {
  // const [sign, setSign] = useState(false);
  const [login, setLogin] = useState(false);


  return (
    <>
      <Navbar collapseOnSelect expand="md" id='header' variant="dark" sticky="top">
        <Container>
            <Navbar.Brand href="/" className="alight-center" >
                <img alt="Bookworm logo"
                src={'images/bookcover/icon_bw.png'}
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
                <Nav.Link eventKey={() => setLogin(true)} onClick={() => setLogin(true)}>Sign In</Nav.Link>
                {/* <button className="btn btn-primary-outline" id="login" onClick={() => setLogin(true)}>Login</button> */}
                
              </Nav>
            </Navbar.Collapse>
        </Container>
      </Navbar>
    {/* 
      <!-- login --> */}
    {/* <Login show={login} onHide={() => setLogin(false)}
    open={login} onClose={() => setLogin(false)}/> */}

    <Modal show={login} onHide={() => setLogin(false)}>
        <Modal.Header closeButton>
          <Modal.Title>Login and get Started</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          <span className="subtitle">Just fill in the form below</span>
          <form className="contact-form form-validate4" novalidate="novalidate">
              <div className="form-group">
                  <input className="form-control" type="email" name="email" placeholder="E-mail" required="" autocomplete="off" aria-required="true" />
              </div>
              <div className="form-group">
                  <input type="password" name="pass" className="form-control" placeholder="Password" required="" autocomplete="off" aria-required="true" />
              </div>
          </form>
        </Modal.Body>
        <Modal.Footer>
            <Button variant="secondary" onClick={() => setLogin(false)}>
              Cancel
            </Button>
            <Button variant="primary" onClick={() => setLogin(false)}>
              Login
            </Button>
        </Modal.Footer>      
    </Modal>
    </>
  );
}

export default Header;