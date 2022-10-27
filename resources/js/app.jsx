import React from 'react';
import ReactDOM from 'react-dom';
import Footer from './components/layouts/Footer';
import Header from './components/layouts/Header';
import Accordion from './components/layouts/Accordion';
import { Routes, Route } from 'react-router-dom';
import { BrowserRouter } from 'react-router-dom';
// import Routes from './routes';
import { Container } from 'react-bootstrap';

import 'bootstrap-4/node_modules/bootstrap/dist/css/bootstrap.min.css';



function App() {
  return (
    <React.Fragment>
      <div className="App">  
              <Header/>
              <Routes>
                <Route path="/" element={<Accordion />} />



                
              </Routes>

              {/* <main className="py-3">
                <Container>
                  <Routes/>
                </Container>
              </main> */}

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
