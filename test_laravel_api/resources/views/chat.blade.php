<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AI Chat Assistant</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Other Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.0.5/purify.min.js"></script>

  <!-- Typing Animation -->
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

<body class="bg-gray-100 text-gray-900 min-h-screen flex items-center justify-center transition-colors duration-300">
  <div class="bg-white w-full max-w-4xl rounded shadow-lg flex flex-col h-[90vh] md:h-[80vh] sm:h-full p-2 md:p-4">
    <!-- Header -->
    <div class="p-4 flex justify-between items-center bg-gray-100 rounded-t">
      <h1 class="text-lg font-bold">AI Chat Assistant</h1>
      <div class="flex items-center gap-2">
        <button id="tutorialBtn" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
          Cara Menggunakan
        </button>
      </div>
    </div>

    <!-- Chat History Container -->
    <div id="chatHistory"
         class="flex-1 w-full overflow-y-auto p-4 space-y-2 
                bg-white transition-colors duration-300 rounded-b">
    </div>

    <!-- Tutorial Modal -->
    <div id="tutorialModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Cara Menggunakan AI Chat Assistant</h2>
        <p class="mb-2">1. <strong>Pilih Topik</strong>: Gunakan menu dropdown untuk memilih topik (misalnya, FAQ, Medical Checkup) untuk mendapatkan saran yang relevan.</p>
        <p class="mb-2">2. <strong>Ketik atau Pilih Pertanyaan</strong>: Masukkan pertanyaan Anda di kolom input atau pilih saran dari daftar yang muncul saat mengetik.</p>
        <p class="mb-2">3. <strong>Kirim Pesan</strong>: Tekan tombol "Kirim" atau tekan Enter untuk mengirim pertanyaan Anda.</p>
        <p class="mb-2">4. <strong>Geser Area Input</strong>: Klik tombol toggle (kaca pembesar) untuk menampilkan/menyembunyikan area input, lalu geser dengan pegangan "Tarik di sini" untuk memindahkan posisi.</p>
        <p class="mb-4">5. <strong>Lihat Tanggapan</strong>: Tanggapan akan muncul di riwayat obrolan di atas. Gulir untuk melihat pesan sebelumnya.</p>
        <button id="closeTutorial" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tutup</button>
      </div>
    </div>
    <button id="toggleInput" class="m-2 px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"><circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" fill="none"/><line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2"/></svg>
    </button>

    <div id="draggableInputArea" style="display: none; position: absolute; bottom: 50px; left: 50px; z-index: 50;">
      <div id="dragHandle" class="cursor-move bg-gray-200 px-2 py-1 rounded-t"><span class="text-xs text-gray-600">Tarik bagian ini</span></div>
      <div id="inputArea">
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
            <button type="submit" class="bg-blue-500 text-white px-4 hover:bg-blue-600">Kirim</button>
            <!-- Suggestion box -->
            <div id="suggestionBox"
                 class="absolute bottom-full w-full max-h-52 overflow-y-auto bg-white border border-gray-300 rounded-lg shadow-lg z-50 hidden">
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
    const suggestionBox = document.getElementById('suggestionBox');
    const tutorialBtn = document.getElementById('tutorialBtn');
    const tutorialModal = document.getElementById('tutorialModal');
    const closeTutorial = document.getElementById('closeTutorial');

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
          aiMsg.innerHTML = `
            <span class="inline-block bg-gray-200 px-4 py-2 rounded-lg">
              ${DOMPurify.sanitize(item.ai_reply)}
              <div class="text-xs text-gray-500">${item.source}</div>
            </span>`;
          chatHistory.appendChild(aiMsg);

          if (window.MathJax) MathJax.typesetPromise([aiMsg]);
        });
        chatHistory.scrollTop = chatHistory.scrollHeight;
      } catch (err) {
        console.error('Error loading chat history:', err);
      }
    }

    // Show/hide tutorial modal
    tutorialBtn.addEventListener('click', () => {
      tutorialModal.classList.remove('hidden');
    });

    closeTutorial.addEventListener('click', () => {
      tutorialModal.classList.add('hidden');
    });

    // Close modal when clicking outside
    tutorialModal.addEventListener('click', (e) => {
      if (e.target === tutorialModal) {
        tutorialModal.classList.add('hidden');
      }
    });

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
        "Jam operasional rumah sakit Dr.Soepraoen TK II",
        "Jeanette rumah sakit Dr.Soepraoen TK II",
        "Nomor telepon darurat Dr.Soepraoen TK II",
        "Cara membuat janji temu Dr.Soepraoen TK II"
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
  </script>
</body>
</html>