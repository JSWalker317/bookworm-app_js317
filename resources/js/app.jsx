import React from 'react';
import ReactDOM from 'react-dom';
import Footer from './components/layouts/Footer';
import Header from './components/layouts/Header';
import Home from './components/pages/Home/Home';
import Accordion from './components/layouts/Accordion';
import { Routes, Route } from 'react-router-dom';
import { BrowserRouter } from 'react-router-dom';


import 'bootstrap-4/node_modules/bootstrap/dist/css/bootstrap.min.css';



function App() {
  return (
    <React.Fragment>
      <div className="App">  
              <Header/>
              <Routes>
                <Route path="/" element={<Accordion />} />
                {/* <Route path="/shop" element={<Shop />} />
                <Route
                  path="/cart"
                  element={<Cart 
                      openModal={() => headerRef.current.handleModal()}  
                      checkCart={() => headerRef.current.checkCart()}
                  />}
                />
                <Route
                  path="/shop/:id"
                  element={<Product checkCart={() => headerRef.current.checkCart()} />}
                />
                <Route path="/about" element={<About />} />
                <Route path="/login" element={<Login />} /> */}
              </Routes>

              {/* <Accordion/> */}
              <Footer/>
      </div>
    </React.Fragment>
  );
}

ReactDOM.render(
  <React.StrictMode>
      {/* <Provider store={store}> */}
          <BrowserRouter> 
              <App />
         </BrowserRouter>
     {/* </Provider> */}
  </React.StrictMode>,
  document.getElementById("root"),
);
