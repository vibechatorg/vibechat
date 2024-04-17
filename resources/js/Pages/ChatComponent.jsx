import { useForm } from '@inertiajs/react'
import {Input} from "@/Components/ui/input.jsx";
const ChatComponent = ({ roomId }) => {
    const { data, setData, errors, post, processing, reset } = useForm({
        message: '',
    });

    const sendMessage = () => {
        post(route('chat.send', roomId), {
            onSuccess: () => {
                reset();
            },
        });
    };

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
};

export default ChatComponent;
