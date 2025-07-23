<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <title>RS TK II DR SOEPRAOEN || AI Chat Assistant</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Other Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.5/purify.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <style>
    .typing-animation:after { content: '|'; animation: blink 1s infinite; }
    @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
    .font-league-spartan { font-family: 'League Spartan', sans-serif; }
  </style>
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center transition-colors duration-300">
 
  <div id="draggableChat"
       style="position: absolute; top: 50px; left: 50px; z-index: 1000; cursor: grab; resize: both; overflow: auto; min-width: 350px; min-height: 300px;">
    <div class="bg-white w-full h-full rounded shadow-lg flex flex-col p-2 md:p-4">
      <!-- Header -->
      <div>
        <div id="chatDragHandle" class="p-4 flex flex-row items-center justify-between bg-blue-900 rounded-t cursor-move">
          <div class="bg-white rounded-md flex flex-col items-start gap-1 p-3" style="min-width:260px;">
            <img src="/logorst.png" alt="RS TK II DR SOEPRAOEN Logo" class="h-16 mb-2 rounded">
            <p class="text-lg font-bold font-league-spartan self-center">RS TK II DR SOEPRAOEN</p>
          </div>
          <div class="flex flex-col items-end gap-1">
  <div class="text-white font-league-spartan text-2xl font-bold">Automatic Response Assistant / Artificial Intelligence Assistant</div>
  <div class="text-white font-league-spartan text-2xl font-bold">Asisten Respons Otomatis / Asisten Kecerdasan Buatan</div>
</div>
        </div>
      </div>
      <!-- Chat History Container -->
      <div id="chatHistory"
           class="flex-1 w-full overflow-y-auto p-4 space-y-2 bg-white transition-colors duration-300 rounded-b">
      </div>
      <!-- Input Area: Always visible at the bottom -->
      <div id="inputArea" class="mt-2">
        <form id="chatForm" class="flex flex-col bg-white rounded-b shadow border-t border-gray-200">
          <input id="prompt" type="text" placeholder="Custom prompt (optional)..." class="p-2 border-b border-gray-200 focus:outline-none">
          <select id="topic" class="p-2 border-b border-gray-200">
            <option value="faq">FAQ</option>
            <option value="layanan">Layanan Medical Checkup</option>
            <option value="rawat_jalan">Layanan Rawat Jalan</option>
            <option value="rapid_swab">Layanan RAPID Antigen & SWAB PCR</option>
            <option value="ruang_rawat">Layanan Kelas Ruang Rawat Inap</option>
            <option value="general">Tentang Rumah Sakit Soepraoen</option>
          </select>
          <div class="flex relative">
            <input id="message"
                   type="text"
                   placeholder="Tulis pesan Anda di sini..."
                   class="flex-1 p-4 focus:outline-none"
                   required
                   autocomplete="off">
            <button type="submit" class="bg-blue-500 text-white px-10 py-3 rounded hover:bg-blue-600">Kirim</button>
            <!-- Suggestion box -->
            <div id="suggestionBox"
                 class="absolute bottom-full w-full max-h-52 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden"></div>
          </div>
        </form>
        <div class="flex justify-end mt-2">
          <button id="tutorialBtn" class="bg-green-500 text-white px-20 py-3 rounded hover:bg-green-600">
            Cara Menggunakan
          </button>
        </div>
      </div>
      <!-- Tutorial Modal -->
      <div id="tutorialModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 ">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
          <h2 class="text-xl font-bold mb-4">Cara Menggunakan AI Chat Assistant</h2>
          <p class="mb-2">1. <strong>Pilih Topik</strong>: Gunakan menu dropdown untuk memilih topik (misalnya, FAQ, Medical Checkup) untuk mendapatkan saran yang relevan.</p>
          <p class="mb-2">2. <strong>Ketik atau Pilih Pertanyaan</strong>: Masukkan pertanyaan Anda di kolom input atau pilih saran dari daftar yang muncul saat mengetik.</p>
          <p class="mb-2">3. <strong>Kirim Pesan</strong>: Tekan tombol "Kirim" atau tekan Enter untuk mengirim pertanyaan Anda.</p>
          <p class="mb-2">4. <strong>Geser Area Input</strong>: Input area kini selalu tampil di bawah chat, dan ikut bergerak saat chat digeser.</p>
          <p class="mb-4">5. <strong>Lihat Tanggapan</strong>: Tanggapan akan muncul di riwayat obrolan di atas. Gulir untuk melihat pesan sebelumnya.</p>
          <button id="closeTutorial" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    const chatForm = document.getElementById('chatForm');
    const chatHistory = document.getElementById('chatHistory');
    const messageInput = document.getElementById('message');
    const topicInput = document.getElementById('topic');
    const promptInput = document.getElementById('prompt');
    const suggestionBox = document.getElementById('suggestionBox');
    const tutorialBtn = document.getElementById('tutorialBtn');
    const tutorialModal = document.getElementById('tutorialModal');
    const closeTutorial = document.getElementById('closeTutorial');
    // ---- Suggestions ----
    const questionSuggestions = {
      faq: [
        "Bagaimana cara pendaftaran online?",
        "Bagaimana cara pendaftaran offline?",
        "Mengapa kami Selalu Terdepan?",
        "Bagaimana Alur Pendaftaran?",
        "Bagaimana dengan biaya perawatan pasien?",
        "Bagaimana Jika ada kesulitan dalam mendapatkan Layanan Kesehatan?",
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
        "Jam operasional rumah sakit Dr.Soepraoen TK II?",
        "Apa saja layanan rumah sakit Dr.Soepraoen TK II?",
        "Nomor telepon darurat Dr.Soepraoen TK II?",
        "Cara membuat janji temu Dr.Soepraoen TK II?",
        "Sejarah Rumah Sakit TK.II dr.Soepraoen",
      ],
      rawat_jalan: [
        'Jadwal Dokter Poliklinik Penyakit Dalam',
        'Mengenai Poliklinik Komplementer',
        'Jadwal Dokter Poliklinik Fisioterapi',
        'Jadwal Dokter Poliklinik Kulit dan Kelamin',
        'Jadwal Dokter Poliklinik Penyakit Jiwa',
        'Jadwal Dokter Poliklinik Kandungan',
        'Jadwal Dokter Poliklinik Paru',
        'Jadwal Dokter Poliklinik Gigi',
        'Jadwal Dokter Poliklinik Mata',
        'Jadwal Dokter Poliklinik Anak',
        'Jadwal Dokter Poliklinik THT',
        'Jadwal Dokter Poliklinik Penyakit Syaraf',
        'Jadwal Dokter Poliklinik Bedah',
        'Jadwal Dokter Poliklinik Jantung',
        'Prosedur Pendaftaran',
        'Mengenai Poliklinik Jantung',
        'Mengenai Poliklinik Penyakit Jiwa',
        'Mengenai Poliklinik Kandungan',
        'Mengenai Poliklinik Paru',
        'Mengenai Poliklinik Gigi',
        'Mengenai Poliklinik THT',
        'Mengenai Poliklinik Syaraf',
        'Mengenai Poliklinik Bedah',
        'Mengenai Poliklinik Jantung',
        'Mengenai Poliklinik Penyakit Dalam',
        'Layanan Rawat Jalan apa saja yang tersedia?'
      ],
      rapid_swab: [
        'Tarif Rapid Swab'
      ],
      ruang_rawat: [
        'Tarif Kelas Ruang Rawat Inap'
      ]
    };
    // Show updated suggestions when topic changes
    topicInput.addEventListener('change', () => {
      updateSuggestions();
      loadChatHistory(); // Reload history when topic changes
    });
    // Show suggestions when input is focused
    messageInput.addEventListener('focus', function() {
      updateSuggestions();
      suggestionBox.classList.remove('hidden');
    });
    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
      if (!messageInput.contains(e.target) && !suggestionBox.contains(e.target)) {
        suggestionBox.classList.add('hidden');
      }
    });
    // Update suggestion list based on topic
    function updateSuggestions() {
      const topic = topicInput.value.toLowerCase();
      suggestionBox.innerHTML = '';
      if (!questionSuggestions[topic]) {
        suggestionBox.classList.add('hidden');
        return;
      }
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
      suggestionBox.classList.remove('hidden');
    }
    // Focus input again when topic changes
    topicInput.addEventListener('change', function() {
      messageInput.focus();
    });
    // Initialize suggestions and chat history on page load
    updateSuggestions();
    loadChatHistory();
    // Draggable logic for the main chat container
    const draggableChat = document.getElementById('draggableChat');
    const chatDragHandle = document.getElementById('chatDragHandle');
    let isDraggingChat = false, offsetXChat = 0, offsetYChat = 0;
    chatDragHandle.addEventListener('mousedown', (e) => {
      isDraggingChat = true;
      offsetXChat = e.clientX - draggableChat.offsetLeft;
      offsetYChat = e.clientY - draggableChat.offsetTop;
      draggableChat.style.cursor = 'grabbing';
      document.body.style.userSelect = 'none';
    });
    document.addEventListener('mousemove', (e) => {
      if (isDraggingChat) {
        draggableChat.style.left = (e.clientX - offsetXChat) + 'px';
        draggableChat.style.top = (e.clientY - offsetYChat) + 'px';
      }
    });
    document.addEventListener('mouseup', () => {
      isDraggingChat = false;
      draggableChat.style.cursor = 'grab';
      document.body.style.userSelect = '';
    });
    // Show/hide tutorial modal
    tutorialBtn.addEventListener('click', () => {
      tutorialModal.classList.remove('hidden');
    });
    closeTutorial.addEventListener('click', () => {
      tutorialModal.classList.add('hidden');
    });
    tutorialModal.addEventListener('click', (e) => {
      if (e.target === tutorialModal) {
        tutorialModal.classList.add('hidden');
      }
    });
    // Chat form submit
    chatForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const message = messageInput.value.trim();
      if (!message) return;
      const userMsg = document.createElement('div');
      userMsg.className = 'text-right';
      userMsg.innerHTML = `<span class="inline-block bg-blue-100 px-4 py-2 rounded-lg">${DOMPurify.sanitize(message)}</span>`;
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
          if (response.status === 503) {
            alert('The AI service is currently overloaded. Please try again later.');
          } else {
            alert('Server error: ' + response.status + ' - ' + text);
          }
          return;
        }
        const data = await response.json();
        const aiMsg = document.createElement('div');
        aiMsg.className = 'text-left';
        let html;
    if (/<[a-z][\s\S]*>/i.test(data.reply)) {
      html = DOMPurify.sanitize(data.reply, {ADD_ATTR: ['style', 'class']});
    } else {
      html = DOMPurify.sanitize(marked.parse(data.reply), {ADD_ATTR: ['style', 'class']});
    }
    aiMsg.innerHTML = `
      <div class="bg-gray-200 px-4 py-2 rounded-lg">
        ${html}
        <div class="text-xs text-gray-500">${data.source}</div>
      </div>`;
        chatHistory.appendChild(aiMsg);
        chatHistory.scrollTop = chatHistory.scrollHeight;
        if (window.MathJax) MathJax.typesetPromise([aiMsg]);
      } catch (err) {
        console.error('Fetch error:', err);
        alert('Something went wrong: ' + err.message);
      }
    });
    // Load chat history on page load
    async function loadChatHistory() {
      try {
        const response = await fetch('/chat/history', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: JSON.stringify({
            topic: topicInput.value
          })
        });
        if (!response.ok) {
          console.error('Failed to load chat history:', response.status);
          return;
        }
        const data = await response.json();
        chatHistory.innerHTML = '';
        data.history.forEach(item => {
          // User message
          const userMsg = document.createElement('div');
          userMsg.className = 'text-right';
          userMsg.innerHTML = `<span class="inline-block bg-blue-100 px-4 py-2 rounded-lg">${DOMPurify.sanitize(item.user_message)}</span>`;
          chatHistory.appendChild(userMsg);
          // AI response
          const aiMsg = document.createElement('div');
          aiMsg.className = 'text-left';
          let html;
      if (/<[a-z][\s\S]*>/i.test(item.ai_reply)) {
        html = DOMPurify.sanitize(item.ai_reply, {ADD_ATTR: ['style', 'class']});
      } else {
        html = DOMPurify.sanitize(marked.parse(item.ai_reply), {ADD_ATTR: ['style', 'class']});
      }
      aiMsg.innerHTML = `
        <div class="bg-gray-200 px-4 py-2 rounded-lg">
          ${html}
          <div class="text-xs text-gray-500">${item.source}</div>
        </div>`;
          chatHistory.appendChild(aiMsg);
          if (window.MathJax) MathJax.typesetPromise([aiMsg]);
        });
        chatHistory.scrollTop = chatHistory.scrollHeight;
      } catch (err) {
        console.error('Error loading chat history:', err);
      }
    }
  </script>
</body>
</html>