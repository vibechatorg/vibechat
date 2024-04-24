import {memo} from "react";
import Authenticated from "@/Layouts/AuthenticatedLayout.jsx";

const Index = memo(function ({ messages = [] }) {
    return (
        <Authenticated head="Chats">
            <div>
                {messages.map((message) => (
                    <div key={message.id}>{message.message}</div>
                ))}
            </div>
        </Authenticated>
    )
});

export default Index;
