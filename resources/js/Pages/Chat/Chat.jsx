import { useForm } from '@inertiajs/react'
import {Input} from "@/Components/ui/input.jsx";
import {memo} from "react";

const Chat = memo(function ({ roomId }) {
    const { data, setData, errors, post, processing, reset, isDirty } = useForm({
        message: '',
    });

    const sendMessage = () =>
        post(route('chat.send', roomId), {
            onSuccess: () => reset(),
        });

    return (
        <div>
            <Input
                value={data.message}
                onChange={(e) => setData('message', e.target.value)}
                placeholder="Type a message..."
            />
            <button onClick={sendMessage}>Send</button>
        </div>
    );
});

export default Chat;
