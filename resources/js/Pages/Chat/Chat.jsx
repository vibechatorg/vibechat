import {memo} from "react";
import ChatLayout from "@/Pages/Chat/Layouts/ChatLayout.jsx";
import SendMessage from "@/Pages/Chat/Partials/SendMessage.jsx";

const Chat = memo(function ({ id, chat }) {
    return (
        <ChatLayout head={chat.name}>
            <SendMessage id={id} />
        </ChatLayout>
    );
});

export default Chat;
