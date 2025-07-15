<!-- resources/views/chat.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI Chat Assistant</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.5/purify.min.js"></script>
  <style>
    .typing-animation:after {
      content: '|';
      animation: blink 1s infinite;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }
  </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white w-full max-w-lg rounded shadow-lg flex flex-col h-[80vh]">
    <div class="p-4 flex justify-between items-center bg-gray-100">
      <h1 class="text-lg font-bold">AI Chat Assistant</h1>
      <a href="{{ route('layanans.index') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">View All Services</a>
    </div>
    <div id="chatHistory" class="flex-1 overflow-y-auto p-4 space-y-2"></div>

    <button id="toggleInput" class="m-2 px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"><circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" fill="none"/><line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"/></svg>
    </button>

    <div id="draggableInputArea" style="display: none; position: absolute; bottom: 50px; left: 50px; z-index: 50;">
      <div id="dragHandle" class="cursor-move bg-gray-200 px-2 py-1 rounded-t"><span class="text-xs text-gray-600">Drag here</span></div>
      <div id="inputArea">
        <form id="chatForm" class="flex flex-col bg-white rounded-b shadow border-t border-gray-200">
          <input id="prompt" type="text" placeholder="Custom prompt (optional)..." class="p-2 border-b border-gray-200 focus:outline-none">
          <select id="topic" class="p-2 border-b border-gray-200">
            <option value="faq">FAQ</option>
            <option value="layanan">Layanan</option>
            <option value="general">General</option>
          </select>
<div class="flex relative">
  <input id="message"
         type="text"
         placeholder="Type your message..."
         class="flex-1 p-4 focus:outline-none"
         required
         autocomplete="off"> <!-- ✅ Disable browser autocomplete -->
  <button type="submit" class="bg-blue-500 text-white px-4 hover:bg-blue-600">Send</button>

  <!-- Suggestion box: stays inside this relative container -->
  <div id="suggestionBox"
       class="absolute bottom-full w-full max-h-52 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden">
    <!-- Suggestions will be injected here by JS -->
  </div>
</div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const chatForm = document.getElementById('chatForm');
    const chatHistory = document.getElementById('chatHistory');
    const messageInput = document.getElementById('message');
const topicInput = document.getElementById('topic');
    const promptInput = document.getElementById('prompt');
    const toggleBtn = document.getElementById('toggleInput');
    const draggable = document.getElementById('draggableInputArea');
    const dragHandle = document.getElementById('dragHandle');

    chatForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (!message) return;

      const userMsg = document.createElement('div');
      userMsg.className = 'text-right';
      userMsg.innerHTML = `<span class="inline-block bg-blue-100 px-4 py-2 rounded-lg">${message}</span>`;
      chatHistory.appendChild(userMsg);
      chatHistory.scrollTop = chatHistory.scrollHeight;

      messageInput.value = '';

      try {
        const response = await fetch('/chat', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            message,
            prompt: promptInput.value,
            topic: topicInput.value
          })
        });

        if (!response.ok) {
          const text = await response.text();
          console.error('Server returned error:', text);
          alert('Server error: ' + response.status);
          return;
        }

        const data = await response.json();

        const aiMsg = document.createElement('div');
        aiMsg.className = 'text-left';
        aiMsg.innerHTML = `
          <span class="inline-block bg-gray-200 px-4 py-2 rounded-lg">
            ${DOMPurify.sanitize(data.reply)}
            <div class="text-xs text-gray-500">${data.source}</div>
          </span>`;
        chatHistory.appendChild(aiMsg);
        chatHistory.scrollTop = chatHistory.scrollHeight;

        if (window.MathJax) MathJax.typesetPromise([aiMsg]);

      } catch (err) {
        console.error('Fetch error:', err);
        alert('Something went wrong: ' + err.message);
      }
    });

    toggleBtn.addEventListener('click', () => {
      draggable.style.display = draggable.style.display === 'none' ? '' : 'none';
    });

    let isDragging = false, offsetX = 0, offsetY = 0;
    dragHandle.addEventListener('mousedown', (e) => {
      isDragging = true;
      offsetX = e.clientX - draggable.offsetLeft;
      offsetY = e.clientY - draggable.offsetTop;
      document.body.style.userSelect = 'none';
    });
    document.addEventListener('mousemove', (e) => {
      if (isDragging) {
        draggable.style.left = (e.clientX - offsetX) + 'px';
        draggable.style.top = (e.clientY - offsetY) + 'px';
      }
    });
    document.addEventListener('mouseup', () => {
      isDragging = false;
      document.body.style.userSelect = '';
    });

    // ---- Suggestions ----
const questionSuggestions = {
  faq: [
    "Mengapa kami Selalu Terdepan?",
    "Bagaimana Alur Pendaftaran?",
    "Bagaimana dengan biaya perawatan pasien?",
    "Bagaimana Jika ada kesulitan dalam mendapatkan Layanan Kesehatan?"
  ],
  layanan: [
    "Apa itu Medical Checkup?",
    "Berapa Tarif Medical Checkup?",
    "Apa itu ESWL?",
    "Apa itu Kemoterapi?",
    "Apa itu Radioterapi?",
    "Apa itu Onkologi",
    "Apa itu CT Scan",
    "Apa itu CathLab",
    "Apa itu Echokardiografi",
    "Apa itu Treadmill",
    "Apa itu Pemeriksaan Medis Kejiwaan?",
    "Apa itu Endoskopi?"
  ],
  general: [
    "Jam operasional rumah sakit",
    "Lokasi rumah sakit",
    "Nomor telepon darurat",
    "Cara membuat janji temu"
  ]
};

    const suggestionBox = document.createElement('div');
    suggestionBox.className = 'absolute bottom-full w-full max-h-52 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden';
    document.querySelector('.flex.relative').appendChild(suggestionBox);

let typingPlaceholder = document.createElement('div');
typingPlaceholder.className = 'text-gray-600 absolute left-4 top-4 pointer-events-none typing-animation';
messageInput.parentNode.appendChild(typingPlaceholder);

// Show updated suggestions when topic changes
topicInput.addEventListener('change', updateSuggestions);

// Show suggestions when input is focused
messageInput.addEventListener('focus', function() {
  updateSuggestions();
  suggestionBox.classList.remove('hidden');
});

// Keep suggestions visible while typing
// (OPTIONAL: If you want to filter dynamic matches, add that here)

// Hide suggestions when clicking outside
document.addEventListener('click', function(e) {
  if (!messageInput.contains(e.target) && !suggestionBox.contains(e.target)) {
    suggestionBox.classList.add('hidden');
  }
});

// Update suggestion list based on topic
function updateSuggestions() {
  const topic = topicInput.value;
  typingPlaceholder.textContent = `Contoh pertanyaan tentang ${topic}...`;

  suggestionBox.innerHTML = ''; // Clear
  questionSuggestions[topic].forEach(question => {
    const item = document.createElement('div');
    item.className = 'px-4 py-2 cursor-pointer hover:bg-gray-100 text-gray-700';
    item.textContent = question;
    item.addEventListener('click', function() {
      messageInput.value = question;
      suggestionBox.classList.add('hidden');
      messageInput.focus();
    });
    suggestionBox.appendChild(item);
  });

  suggestionBox.classList.remove('hidden'); // Always show when updated
}

// Focus input again when topic changes
topicInput.addEventListener('change', function() {
  messageInput.focus();
});
  </script>
</body>
</html>
