import { useState } from "react";
import axios from "axios";
import Message from "./Message";

const CreatePost = () => {
    const [successMessage, setSuccessMessage] = useState("");
    const [errorMessage, setErrorMessage] = useState("");
    const [userId, setUserId] = useState("");
    const [title, setTitle] = useState("");
    const [body, setBody] = useState("");
    // const [skill, setSkill] = useState("angular");

    const handleCreatePost = (e) => {
        e.preventDefault();

        const form = e.target;

        setUserId(form["userId"].value);
        setTitle(form["title"].value);
        setBody(form["body"].value);

        axios
            .post("https://jsonplaceholder.typicode.com/posts", {
                userId,
                title,
                body,
            })
            .then(
                (res) => {
                    if (res.status === 201) {
                        setSuccessMessage("Successfully created post");
                        setUserId("");
                        setTitle("");
                        setBody("");
                    }
                },
                (err) => {
                    if (err.response.status === 0) {
                        setErrorMessage(err.message);
                    }
                }
            );
    };

    return (
        <>
            <Message
                successMessage={successMessage}
                errorMessage={errorMessage}
            />

            <form method="post" onSubmit={handleCreatePost}>
                <label htmlFor="userId">User Id: </label>
                <input
                    type="number"
                    name="userId"
                    id="userId"
                    onChange={(e) => setUserId(e.target.value)}
                    value={userId}
                />
                <br />
                <label htmlFor="title">Title: </label>
                <input
                    type="title"
                    name="title"
                    id="title"
                    onChange={(e) => setTitle(e.target.value)}
                    value={title}
                />
                <br />
                <label htmlFor="body">Body: </label>
                <textarea
                    name="body"
                    id="body"
                    onChange={(e) => setBody(e.target.value)}
                    value={body}
                />
                <br />
                {/* <select value={skill} onChange={(e) => setSkill(e.target.value)}>
                    <option>None</option>
                    <option value="react">React</option>
                    <option value="angular">Angular</option>
                    <option value="vue">Vue</option>
                </select> */}
                <input type="submit" value="Submit" />
            </form>
        </>
    );
};

export default CreatePost;
