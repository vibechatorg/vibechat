import {memo} from "react";

const Conversation = memo(function ({ messages = [] }) {
    console.log("Conversations Component:", messages);
    return (
        <div>
            {messages.map((message, index) => (
                <div key={index} className="flex items-center space-x-2">
                    <div className="font-semibold">{message.user.name}:</div>
                    <div>{message.message}</div>
                </div>
            ))}
        </div>
    )
});

export default Conversation;
