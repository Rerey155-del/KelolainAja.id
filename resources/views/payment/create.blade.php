<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembayaran</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white shadow-md rounded-xl p-6 sm:p-8">
        <div class="text-center mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Form Pembayaran</h2>
            <p class="mt-1 text-sm text-gray-500">Silakan isi data berikut untuk memproses pembayaran.</p>
        </div>

        <form class="space-y-5" action="{{ route('payment.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    placeholder="Contoh: Budi Santoso"
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="Contoh: budi@example.com"
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Telepon -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                    placeholder="Contoh: 081234567890"
                    class="mt-1 block w-full px-4 py-2 text-sm border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                @error('phone')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Jumlah -->
            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran (Rp)</label>
                <div class="relative mt-1">
                    <span class="absolute left-3 top-2.5 text-gray-500 text-sm">Rp</span>
                    <input type="number" id="amount" name="amount" min="1" value="{{ old('amount') }}"
                        required placeholder="Contoh: 100000"
                        class="pl-10 pr-4 py-2 w-full text-sm border border-gray-300 rounded-lg bg-white focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                @error('amount')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>


            <!-- Tombol Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-lg text-sm shadow transition duration-200">
                    Proses Pembayaran
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
