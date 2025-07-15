<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Daftar Layanan</h1>
            <a href="{{ route('layanans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Tambah Layanan Baru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded">
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 text-left">Pertanyaan</th>
                        <th class="py-3 px-4 text-left">Tipe Pencocokan</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($layanans as $layanan)
                    <tr class="border-b">
                        <td class="py-3 px-4">{{ $layanan->question }}</td>
                        <td class="py-3 px-4 capitalize">{{ $layanan->match_type }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <a href="{{ route('layanans.edit', $layanan->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('layanans.destroy', $layanan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="py-4 px-4 text-center">Belum ada layanan tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>