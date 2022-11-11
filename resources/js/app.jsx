import React from 'react';
import ReactDOM from 'react-dom';

import Footer from './components/layouts/Footer';
import Header from './components/layouts/Header';
// 
import Hometest from './pages/Home/Hometest';
import Home from './pages/Home/Home';


import Shop from './pages/Shop/Shop';
import Product from './pages/Product/Product';
import About from './pages/About/About';
import Cart from './pages/Cart/Cart';
import Login from './pages/Login/Login';
import CardBook from './components/book/CardBook';

// 
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';



// import { Container } from 'react-bootstrap';

import 'bootstrap-4/node_modules/bootstrap/dist/css/bootstrap.min.css';

function App() {

  // const { useRef } = React;
  // const headerRef = useRef();

  return (
    <React.Fragment>
      <div className="App">
              <Header/>
                  <Routes>                  
                      <Route exact path="/" element={<Home/>} />
                      <Route exact path="/home" element={<Home />} />
                      {/* <Route exact path="/" element={ } /> */}
                      <Route exact path="/shop" element={<Shop />} />
                      {/* <Route
                        path="/shop/:id"
                        element={<Cart />}
                      /> */}

                      <Route exact path="/cart" element={<Cart />} />
                      <Route exact path="/about" element={<About />} />
                     
                  </Routes>
                 
              <Footer/>
              
      </div>
     </React.Fragment>
  );
}
export default App;
ReactDOM.render(
  // <React.StrictMode>
    <Router> 

    <App />

    </Router>,

  // </React.StrictMode>,
  document.getElementById("root"),
);
