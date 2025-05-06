
const liveChat = document.getElementById("liveChat");
const chatInput = document.createElement("input");
const chatButton = document.createElement("button");
const chatMessages = document.createElement("div");

// Style the chat components
chatMessages.style.height = "300px";
chatMessages.style.overflowY = "auto";
chatMessages.style.border = "1px solid #ddd";
chatMessages.style.padding = "10px";
chatMessages.style.marginBottom = "10px";

chatInput.type = "text";
chatInput.placeholder = "Type your message...";
chatInput.style.width = "80%";
chatInput.style.marginRight = "10px";
chatInput.style.border = "1px solid #ccc"; // Add a light gray border
chatInput.style.borderRadius = "4px"; // Optional: Add rounded corners
chatInput.style.padding = "8px";

chatButton.textContent = "Send";
chatButton.style.width = "18%";
chatButton.style.backgroundColor = "#007bff"; // Set background color (e.g., blue)
chatButton.style.color = "#fff"; // Set text color (e.g., white)
chatButton.style.border = "none"; // Optional: Remove border
chatButton.style.padding = "10px"; // Optional: Add padding
chatButton.style.cursor = "pointer";

liveChat.appendChild(chatMessages);
liveChat.appendChild(chatInput);
liveChat.appendChild(chatButton);

// WebSocket setup
const socket = new WebSocket("ws://localhost:8081/chat"); // Connect to the PHP WebSocket server

// Listen for messages from the server
socket.onmessage = function (event) {
    const message = document.createElement("div");
    message.textContent = event.data;
    chatMessages.appendChild(message);
    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to the latest message
};

// Send message to the server
chatButton.addEventListener("click", function () {
    if (chatInput.value.trim() !== "") {
        socket.send(chatInput.value);
        chatInput.value = ""; // Clear the input field
    }
});

// Handle Enter key for sending messages
chatInput.addEventListener("keypress", function (event) {
    if (event.key === "Enter" && chatInput.value.trim() !== "") {
        socket.send(chatInput.value);
        chatInput.value = ""; // Clear the input field
    }
});

// Handle WebSocket connection errors
socket.onerror = function (error) {
    console.error("WebSocket Error:", error);
};

// Handle WebSocket connection close
socket.onclose = function () {
    const message = document.createElement("div");
    message.textContent = "Chat disconnected.";
    message.style.color = "red";
    chatMessages.appendChild(message);
};