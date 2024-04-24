import {memo} from "react";
import ChatLayout from "@/Pages/Chat/Layouts/ChatLayout.jsx";
import SendMessage from "@/Pages/Chat/Partials/SendMessage.jsx";
import Conversation from "@/Pages/Chat/Partials/Conversation.jsx";

const Chat = memo(function ({ chat }) {
    return (
        <ChatLayout head={chat.name}>
            <Conversation messages={chat.content} />
            <SendMessage id={chat.id} />
        </ChatLayout>
    );
});

export default Chat;
