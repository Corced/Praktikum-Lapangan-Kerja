<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AI Chat Assistant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white w-full max-w-lg rounded shadow-lg flex flex-col h-[80vh]">
        <!-- Chat History -->
        <div id="chatHistory" class="flex-1 overflow-y-auto p-4 space-y-2">
            <!-- Messages will appear here -->
        </div>

        <!-- Input Bar -->
        <button id="toggleInput" class="m-2 px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" fill="none"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </svg>
        </button>

        <!-- Draggable input area container -->
<div id="draggableInputArea" style="display: none; position: absolute; bottom: 50px; left: 50px; z-index: 50;">
    <div id="dragHandle" class="cursor-move bg-gray-200 px-2 py-1 rounded-t">
        <span class="text-xs text-gray-600">Drag here</span>
    </div>
    <div id="inputArea">
        <form id="chatForm" class="flex border-t border-gray-200 flex-col bg-white rounded-b shadow">
            <input 
                id="prompt"
                type="text"
                placeholder="Custom prompt (optional)..."
                class="p-2 border-b border-gray-200 focus:outline-none"
            >
            <div class="flex">
                <input 
                    id="message" 
                    type="text" 
                    placeholder="Type your message..."
                    class="flex-1 p-4 focus:outline-none"
                    required
                >
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 hover:bg-blue-600"
                >
                    Send
                </button>
            </div>
        </form>
    </div>
</div>
    </div>

    <script>
    const chatForm = document.getElementById('chatForm');
    const chatHistory = document.getElementById('chatHistory');
    const messageInput = document.getElementById('message');
    const promptInput = document.getElementById('prompt');
    const toggleBtn = document.getElementById('toggleInput');
    const inputArea = document.getElementById('inputArea');

    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = messageInput.value.trim();
        if (!message) return;

        // Show user message
        const userMsg = document.createElement('div');
        userMsg.className = 'text-right';
        userMsg.innerHTML = `<span class="inline-block bg-blue-100 px-4 py-2 rounded-lg">${message}</span>`;
        chatHistory.appendChild(userMsg);
        chatHistory.scrollTop = chatHistory.scrollHeight;

        messageInput.value = '';

        // Call backend
        const response = await fetch('/chat', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ message, prompt: promptInput.value })
        });

        const data = await response.json();

        // Show AI reply with Markdown and MathJax
        const aiMsg = document.createElement('div');
        aiMsg.className = 'text-left';
        // Parse Markdown to HTML
        aiMsg.innerHTML = `<span class="inline-block bg-gray-200 px-4 py-2 rounded-lg">${marked.parse(data.reply)}</span>`;
        chatHistory.appendChild(aiMsg);
        chatHistory.scrollTop = chatHistory.scrollHeight;
        // Render LaTeX
        if (window.MathJax) {
            MathJax.typesetPromise([aiMsg]);
        }
    });

    const draggable = document.getElementById('draggableInputArea');
const dragHandle = document.getElementById('dragHandle');

    toggleBtn.addEventListener('click', () => {
        if (draggable.style.display === 'none') {
            draggable.style.display = '';
        } else {
            draggable.style.display = 'none';
        }
    });

    // Simple drag logic
    let isDragging = false, offsetX = 0, offsetY = 0;

    dragHandle.addEventListener('mousedown', function(e) {
        isDragging = true;
        offsetX = e.clientX - draggable.offsetLeft;
        offsetY = e.clientY - draggable.offsetTop;
        document.body.style.userSelect = 'none';
    });

    document.addEventListener('mousemove', function(e) {
        if (isDragging) {
            draggable.style.left = (e.clientX - offsetX) + 'px';
            draggable.style.top = (e.clientY - offsetY) + 'px';
        }
    });

    document.addEventListener('mouseup', function() {
        isDragging = false;
        document.body.style.userSelect = '';
    });
    </script>
</body>
</html>
