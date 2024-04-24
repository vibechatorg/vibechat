import {memo} from "react";
import Authenticated from "@/Layouts/AuthenticatedLayout.jsx";

const Index = memo(function ({ messages = [] }) {
    return (
        <Authenticated>
            <div>
                {messages.map((message) => (
                    <div key={message.id}>{message.message}</div>
                ))}
            </div>
        </Authenticated>
    )
});
