const Student = (props) => {
    return (
        <table>
            <caption>Student</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Dob</th>
                    <th>Cgpa</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{ props.id }</td>
                    <td>{ props.name }</td>
                    <td>{ props.dob }</td>
                    <td>{ props.cgpa }</td>
                </tr>
            </tbody>
        </table>
    );
};

export default Student;