import {memo} from "react";
import {useForm} from "@inertiajs/react";
import {Input} from "@/Components/ui/input.jsx";
import {Button} from "@/Components/ui/button.jsx";
import {Send} from "lucide-react";

// Define the chat types and their corresponding routes. This is used to send messages to the correct chat type.
const CHAT_TYPES = {
    'private': 'chat.send',
    'channel': 'chat.channel.send',
};

/**
 * This component is used to send a message to a chat/room/channel. It is used in the Chat component.
 * The component uses the useForm hook to manage the form state and submission. It sends the message to the correct chat type.
 *
 * @param {object} props
 * @param {*} props.id
 * @returns {JSX.Element}
 */
const SendMessage = memo(function ({ id, type = "private" }) {
    // The useForm hook is used to manage the form state and submission.
    const { data, setData, errors, post, processing, reset, isDirty } = useForm({
        message: '',
    });

    // The send function is used to send the message to the chat. It uses the post method from the useForm hook.
    // The onSuccess callback is used to reset the form after the message is sent. This is done to clear the input field.
    const send = () =>
        post(route(CHAT_TYPES[type], id), {
            onSuccess: () => reset(),
        });

    return (
        <div className="flex flex-row gap-2">
            <Input
                value={data.message}
                onChange={(e) => setData('message', e.target.value)}
                placeholder="Type a message..."
                className={`flex-grow ${errors.message ? 'border-red-500' : ''}`}
            />
            <Button onClick={send}>
                <Send size={16} />
            </Button>
        </div>
    );
});

// The component is exported as the default export.
export default SendMessage;
