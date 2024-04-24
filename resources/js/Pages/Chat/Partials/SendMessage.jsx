import {memo} from "react";
import {useForm} from "@inertiajs/react";
import {Input} from "@/Components/ui/input.jsx";
import {Button} from "@/Components/ui/button.jsx";
import {Send} from "lucide-react";

const SendMessage = memo(function ({ id }) {
    const { data, setData, errors, post, processing, reset, isDirty } = useForm({
        message: '',
    });

    const send = () =>
        post(route('chat.send', id), {
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

export default SendMessage;
