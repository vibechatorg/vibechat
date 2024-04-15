import  {useState} from 'react';
import { router } from '@inertiajs/react'
const ChatComponent = ({ roomId }) => {
    const [message, setMessage] = useState('');

    const sendMessage = () => {
        router.post('/send-message', { message, roomId });
        setMessage('');
    };

    return (
        <div>
            <input
                type="text"
                value={message}
                onChange={(e) => setMessage(e.target.value)}
                placeholder="Type a message..."
            />
            <button onClick={sendMessage}>Send</button>
        </div>
    );
};

export default ChatComponent;
