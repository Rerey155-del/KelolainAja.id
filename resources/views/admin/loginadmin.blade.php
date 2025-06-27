<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
   <div class="min-h-screen flex flex-col md:flex-row items-center justify-center gap-x-20 p-4 md:p-6 lg:p-8">
        <!-- Image Section -->
        <div class="w-full md:w-1/2 lg:w-2/5 hidden md:block" data-aos="fade-in-right">
            <img src="/img/Pola1.png" class="w-full h-auto max-h-[40.1rem] object-cover rounded-lg shadow-lg">
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/2 lg:w-1/3" data-aos="zoom-in-right">
            <form action="{{ route('admin.login.submit') }}" method="POST" class="p-6 md:p-8 rounded-lg  flex flex-col items-center">
                @csrf
                <h1 class="font-bold text-black text-2xl md:text-3xl pb-4 md:pb-6">Administrator</h1>
                <input type="email" name="email" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Email" required>
                <input type="password" name="password" class="w-full h-12 md:h-14 bg-red-100 border-none rounded-lg px-4 md:px-6 text-sm md:text-base font-medium text-red-500 mb-4 md:mb-5 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Password" required>
                <button type="submit" class="w-full h-12 md:h-14 bg-red-500 text-white text-sm md:text-base font-medium rounded-lg hover:bg-red-600 transition-colors mb-4 md:mb-5">Login</button>
                @if ($errors->any())
                    <div class="text-red-500 text-sm mt-2">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi
        once: true, // Animasi hanya sekali
    });
</script>
</html>