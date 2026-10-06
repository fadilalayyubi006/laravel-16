<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Produk - Acara 20</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Produk Baru</h2>

        {{-- Tampilkan Pesan Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/test-acara20" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block font-medium">Nama Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Kategori ID</label>
                <input type="number" name="category_id" value="{{ old('category_id', 1) }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block font-medium">SKU</label>
                <input type="text" name="sku" value="{{ old('sku') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Harga</label>
                <input type="text" name="price" value="{{ old('price') }}" class="w-full border p-2 rounded">
            </div>
            <div class="mb-3">
                <label class="block font-medium">Stok</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Produk</button>
        </form>
    </div>
</body>
</html>
