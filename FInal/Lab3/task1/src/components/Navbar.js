import {Link} from "react-router-dom";

const Navbar = () => {
    return (
        <nav>
            <ul>
                <li>
                    <Link to="/">Home</Link>
                </li>
                <li>
                    <Link to="/posts">Post List</Link>
                </li>
                <li>
                    <Link to="/create/post">Create Post</Link>
                </li>
            </ul>
        </nav>
    );
};

export default Navbar;
