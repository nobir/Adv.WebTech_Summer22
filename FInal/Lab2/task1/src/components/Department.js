const Department = (props) => {
    return (
        <table>
            <caption>Department</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{ props.id }</td>
                    <td>{ props.name }</td>
                </tr>
            </tbody>
        </table>
    );
};

export default Department;
