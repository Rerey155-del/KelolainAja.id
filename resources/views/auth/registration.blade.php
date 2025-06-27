<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col md:flex-row items-center justify-center p-4 md:p-6 lg:p-6">
        <!-- Form Section -->
        <div class="w-full md:w-1/2 flex justify-center" data-aos="zoom-in-right">
            <form action="{{ route('register.post') }}" method="POST" class="w-full max-w-md p-6 md:p-8 flex flex-col items-center">
                @csrf
                <h1 class="font-bold text-black text-2xl md:text-3xl pb-4 md:pb-6">Register</h1>
                <input type="text" name="name" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Name" required>
                <input type="email" name="email" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Email" required>
                <input type="password" name="password" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Password" required>
                <input type="password" name="password_confirmation" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Confirm Password" required>
                <button type="submit" class="w-full h-12 md:h-14 bg-red-500 text-white text-sm md:text-base font-medium rounded-lg hover:bg-red-600 transition-colors mb-4 md:mb-5">Daftarkan</button>
                @if ($errors->any())
                    <div class="text-red-500 text-sm mt-2">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-1/2 flex justify-end md:justify-center mt-6 md:mt-0" data-aos="fade-in-right">
            <img src="/img/Pola2.png" class="w-full md:w-auto h-auto max-h-[40.1rem] md:max-h-[500px] lg:max-h-[600px] object-contain rounded-lg shadow-lg">
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi
        once: true, // Animasi hanya sekali
    });

    @if (session('success'))
        Swal.fire({
            title: "Registrasi Berhasil!",
            text: "Anda akan diarahkan ke halaman login.",
            icon: "success",
            confirmButtonText: "OK"
        }).then(() => {
            window.location.href = "{{ route('login') }}";
        });
    @endif
</script>

</html>