const WebSocket = require('ws');

const wss = new WebSocket.Server({ port: 8080 });

let clients = [];

wss.on('connection', function connection(ws) {
  clients.push(ws);

  ws.on('message', function incoming(message) {
    // Broadcast to all clients except the sender
    clients.forEach(client => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  });

  ws.on('close', () => {
    clients = clients.filter(client => client !== ws);
  });
});

console.log('WebSocket server is running on ws://localhost:8080');
