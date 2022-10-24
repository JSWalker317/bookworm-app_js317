import React, {useState } from 'react'
import './Navbar.css'
function Navbar (){
    const [username, setUserName] = useState('SON WALKER');
    return (
        <nav id='navbar'>
            <ul>
                <a href="#"><li>Home</li></a>
                <a href="#"><li>Contact</li></a>
                <a href="#"><li>About</li></a>
            </ul>

            <div className="nav-details">
              <p className="nav-username"> {username}</p>
            </div>
            <button onClick={() => setUserName('')}>
                SetUserName
            </button>

        </nav>
    );
}

export default Navbar;