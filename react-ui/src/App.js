import React, { useState, useEffect } from 'react';
import './App.css'; // You can create a basic App.css for styling

function App() {
    const [messages, setMessages] = useState([]);
    const [newMessage, setNewMessage] = useState('');
    const [websocket, setWebsocket] = useState(null);
    const [nickname, setNickname] = useState(''); 

    useEffect(() => {
        // Get the nickname from the hidden input field
        const nicknameElement = document.getElementById('nickname');
        const storedNickname = nicknameElement ? nicknameElement.value : '';
        setNickname(storedNickname); // Set the nickname state

        const ws = new WebSocket('ws://localhost:8080'); // Replace with your WebSocket server URL

        ws.onopen = () => {
            console.log('Connected to WebSocket server');
            console.log(`Joining chat as ${storedNickname}`); // Log the nickname

            // Send the nickname to the server
            ws.send(JSON.stringify({ type: 'join', nickname: storedNickname })); 
        };

        ws.onmessage = (event) => {
            setMessages(prevMessages => [...prevMessages, event.data]);
        };

        ws.onclose = () => {
            console.log('Disconnected from WebSocket server');
        };

        setWebsocket(ws);

        return () => {
            ws.close(); // Cleanup on component unmount
        };
    }, []); // Empty dependency array ensures this runs only once

    const handleInputChange = (event) => {
        setNewMessage(event.target.value);
    };

    const sendMessage = () => {
        if (websocket && websocket.readyState === WebSocket.OPEN) {
            websocket.send(newMessage);
            setNewMessage(''); // Clear the input
        }
    };

    return (
        <div className="App">
            <h1>Chat Room</h1>
            <h2>Welcome, {nickname}!</h2> {/* Display the nickname */}
            <div className="messages">
                {messages.map((message, index) => (
                    <p key={index}>{message}</p>
                ))}
            </div>
            <div className="input-area">
                <input
                    type="text"
                    value={newMessage}
                    onChange={handleInputChange}
                    placeholder="Enter your message"
                />
                <button onClick={sendMessage}>Send</button>
            </div>
          </div>         
        );
    }

    export default App;