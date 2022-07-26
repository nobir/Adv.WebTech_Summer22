import "./App.css";
import axios from "axios";
import Department from "./components/Department";
import Student from "./components/Student";
import { useState } from "react";

function App() {
    const [student, setStudent] = useState({});
    const [department, setDepartment] = useState({});

    const LoadData = () => {
        axios
            .get("https://mocki.io/v1/72353acd-8db8-4293-9df4-2e6c22920b55")
            .then(
                (response) => {
                    setStudent(response.data.Students[0]);
                    setDepartment({
                        Id: response.data.Id,
                        Name: response.data.Name,
                    });
                },
                (error) => {
                    console.error(error);
                }
            );

        // const _data = {
        //     Students: [
        //         {
        //             Id: 4,
        //             Name: "Mobarak",
        //             Dob: "12.12.12",
        //             Cgpa: "3.45",
        //         },
        //         {
        //             Id: 5,
        //             Name: "Farhan",
        //             Dob: "12.12.12",
        //             Cgpa: "3.45",
        //         },
        //     ],
        //     Id: 2,
        //     Name: "EEE",
        // };

        // setStudent(_data.Students[0]);
        // setDepartment({
        //     Id: _data.Id,
        //     Name: _data.Name,
        // });
    };

    return (
        <>
            <button onClick={LoadData}>Load Data</button>
            <Department id={department.Id} name={department.Name} />
            <Student
                id={student.Id}
                name={student.Name}
                dob={student.Dob}
                cgpa={student.Cgpa}
            />
        </>
    );
}

export default App;
