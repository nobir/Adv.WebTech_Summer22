import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Navbar from "./components/Navbar";
import Post from "./components/Post";
import "./App.css";
import Home from "./components/Home";
import NotFound from "./components/NotFound";
import CreatePost from "./components/CreatePost";

function App() {
    return (
        <Router>
            <Navbar />
            <Routes>
                <Route index path="/" element={<Home />} />
                <Route path="/posts" element={<Post />} />
                <Route path="/create/post" element={<CreatePost />} />

                <Route element={<NotFound />} />
            </Routes>
        </Router>
    );
}

export default App;
