import React from 'react';
import ReactDOM from 'react-dom';
import Welcome from './welcome';
import Home from './components/Home';

// index

ReactDOM.render(
  // <Welcome/>,
  <Home bootcamp= { 'Rookies'}/>,
  document.getElementById('root')
);


// const root = ReactDOM.createRoot(document.getElementById('root'));
// root.render(
//   <React.StrictMode>
//     <Home bootcamp= { 'Rookies'}/>
//   </React.StrictMode>
// );
