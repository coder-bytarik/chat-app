const WebSocket = require('ws');
require('dotenv').config();

const wss = new WebSocket.Server({ port: process.env.PORT || 8080 });

wss.on('connection', ws => {
    console.log('Client connected');

    ws.on('message', message => {
        // Convert Blob to text
        //This line converts the incoming message (which is a Blob) to a string.
        const messageText = message.toString(); 

        console.log(`Received: ${messageText}`);
        wss.clients.forEach(client => {
            if (client !== ws && client.readyState === WebSocket.OPEN) {
                //This line sends the string version of the message to the other clients.
                client.send(messageText); // Send the text version
            }
        });
    });

    ws.on('close', () => {
        console.log('Client disconnected');
    });
});

console.log(`WebSocket server started on port ${process.env.PORT || 8080}`);