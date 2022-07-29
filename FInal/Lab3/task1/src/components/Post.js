import axios from "axios";
import { useState } from "react";

const Post = () => {
    const [posts, setPosts] = useState([]);

    axios.get("https://jsonplaceholder.typicode.com/posts").then(
        (res) => {
            setPosts(res.data);
        },
        (err) => {
            console.error(err);
        }
    );
    return (
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>User Id</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                {posts.length > 0 ? (
                    posts.map((post) => (
                        <tr key={post.id}>
                            <td>{post.id}</td>
                            <td>{post.title}</td>
                            <td>{post.userId}</td>
                            <td>{post.body}</td>
                        </tr>
                    ))
                ) : (
                    <tr>
                        <td colSpan="4">No posts found</td>
                    </tr>
                )}
            </tbody>
        </table>
    );
};

export default Post;
