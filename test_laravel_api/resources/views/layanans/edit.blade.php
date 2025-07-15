<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Layanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 max-w-2xl">
        <h1 class="text-2xl font-bold mb-6">Edit Layanan</h1>
        
        <form action="{{ route('layanans.update', $layanan->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="question" class="block text-gray-700 mb-2">Pertanyaan:</label>
                <input type="text" name="question" id="question" value="{{ $layanan->question }}" required
                       class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="answer" class="block text-gray-700 mb-2">Jawaban:</label>
                <textarea name="answer" id="answer" rows="4" required
                          class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $layanan->answer }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="match_type" class="block text-gray-700 mb-2">Tipe Pencocokan:</label>
                <select name="match_type" id="match_type" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="contains" {{ $layanan->match_type == 'contains' ? 'selected' : '' }}>Mengandung Kata Kunci</option>
                    <option value="exact" {{ $layanan->match_type == 'exact' ? 'selected' : '' }}>Tepat Sama</option>
                    <option value="regex" {{ $layanan->match_type == 'regex' ? 'selected' : '' }}>Pola Regex</option>
                </select>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('layanans.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Update Layanan
                </button>
            </div>
        </form>
    </div>
</body>
</html>