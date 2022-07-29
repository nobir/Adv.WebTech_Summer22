const Message = (props) => {
    return (
        <>
            {props.successMessage ? (
                <div className="success_message">{props.successMessage}</div>
            ) : (
                ""
            )}
            {props.errorMessage ? (
                <div className="error_message">{props.errorMessage}</div>
            ) : (
                ""
            )}
        </>
    );
};

export default Message;
