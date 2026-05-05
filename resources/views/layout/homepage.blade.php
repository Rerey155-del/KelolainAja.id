<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KelolainAja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="font-poppins antialiased scroll-smooth">
    <section class="bg-white">
        <x-navbar></x-navbar>
        <main class="max-w-6xl mx-auto px-10 py-10">
            <div data-aos="fade-up" class="flex flex-col md:flex-row items-center justify-between">

                <div class="flex flex-col gap-6 text-gray-800">
                    <h1 class="mt-[78px] md:mt-0 text-5xl font-bold leading-tight">
                        Bisnis Sukses<br>Kelola Tanpa Stress<br>
                        di <span class="text-red-500">Kelolainaja</span>
                    </h1>
                    <p class="text-lg text-gray-600">
                        Kelolainaja adalah platform digital yang menyediakan layanan pengelolaan media sosial dan desain
                        untuk UMKM dan jasa lainnya.
                    </p>
                    <button
                        class="bg-red-500 text-white p-5 rounded-lg font-bold hover:bg-red-600 transition w-[15rem]">
                        Lihat selengkapnya
                    </button>
                </div>
                <div>
                    <img src="/img/Avatar1.png" alt="Kelolainaja Illustration"
                        class="w-[648px] h-[594px] object-contain">
                </div>
            </div>
        </main>

        {{-- ============ Layanan Kami ================== --}}

        <div class="w-full bg-[rgb(255,70,85)] px-4 py-10 md:p-20" id="layanan">
            <div class="text-center #layanan text-white mb-8 flex flex-col items-center sm:mt-12">
                <h1 class="card-title text-2xl font-bold">Layanan Kami</h1>
                <p class="text-lg sm:text-md">Bisnis Sukses Kelola Tanpa Stress</p>
            </div>
            <div data-aos="fade-up" class="container mx-auto grid grid-cols-1  md:grid-cols-3 gap-y-8 gap-x-6 px-4">
                <div class="card bg-white shadow-xl rounded-xl w-full max-w-sm mx-auto">
                    <figure class="p-3">
                        <img src="/img/feed.jpg" alt="Manajemen Media Sosial"
                            class="rounded-xl w-full h-48 object-cover" />
                    </figure>
                    <div class="card-body px-4 pb-4">
                        <h2 class="card-title text-black text-lg mb-2">Manajemen Media Sosial</h2>
                        <p class="text-sm text-gray-700">
                            Mengelola konten, jadwal posting, dan analisis performa media sosial untuk meningkatkan
                            interaksi dan brand awareness bisnis Anda.
                        </p>
                    </div>
                </div>

                <div class="card bg-white shadow-xl rounded-xl w-full max-w-sm mx-auto">
                    <figure class="p-3">
                        <img src="/img/design.jpg" alt="Layanan Desain" class="rounded-xl w-full h-48 object-cover" />
                    </figure>
                    <div class="card-body px-4 pb-4">
                        <h2 class="card-title text-black text-lg mb-2">Layanan Desain</h2>
                        <p class="text-sm text-gray-700">
                            Menyediakan desain logo, konten media sosial, dan materi promosi untuk membangun identitas
                            visual yang kuat dan menarik.
                        </p>
                    </div>
                </div>

                <div class="card bg-white shadow-xl rounded-xl w-full max-w-sm mx-auto">
                    <figure class="p-3">
                        <img src="/img/e-commerce.jpg" alt="Manajemen E-commerce"
                            class="rounded-xl w-full h-48 object-cover" />
                    </figure>
                    <div class="card-body px-4 pb-4">
                        <h2 class="card-title text-black text-lg mb-2">Manajemen E-commerce</h2>
                        <p class="text-sm text-gray-700">
                            Membantu optimasi produk, pembuatan konten, pengelolaan promosi, hingga analisis performa,
                            agar bisnis kamu tumbuh lebih cepat dan efektif.
                        </p>
                    </div>
                </div>
            </div>

        </div>

        {{-- ========= Keunggulan Kami ==================== --}}

        <div class="container mx-auto grid grid-cols-1  md:grid-cols-2 gap-x-28 p-8 md:p-20 justify-center items-center"
            id="keunggulan">
            <div>
                <img src="/img/Avatar2.png" data-aos="zoom-in-right" alt=""
                    class="w-full max-w-xs sm:max-w-lg h-auto object-cover mx-auto">
            </div>
            <div>
                <div class="mb-6 text-black">
                    <h1 class="card-title">Keunggulan Kami</h1>
                    <p>Tingkatkan kehadiran bisnis anda dengan layanan unggulan kami</p>
                </div>
                <div class="grid gap-8 text-black" data-aos="zoom-in-left">
                    <div class="card w-100 bg-white card-xs shadow-xl">
                        <div class="card-body flex flex-row items-center gap-4">
                            <div>
                                <img src="/img/lampu.png" class="w-[2.5rem] h-[3rem]">
                            </div>
                            <div>
                                <h2 class="card-title">One-Stop Solution</h2>
                                <p>Semua layanan pengelolaan digital dan desain di satu tempat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 bg-white card-xs shadow-xl">
                        <div class="card-body flex flex-row items-center gap-4">
                            <div>
                                <img src="/img/koin.png" class="w-[3rem] h-[3rem]">
                            </div>
                            <div>
                                <h2 class="card-title">Harga Terjangkau</h2>
                                <p>Layanan Berkualitas</p>
                            </div>
                        </div>
                    </div>
                    <div class="card w-100 bg-white card-xs shadow-xl">
                        <div class="card-body flex flex-row items-center gap-4">
                            <div>
                                <img src="/img/tas.png" class="w-[3rem] h-[3rem]">
                            </div>
                            <div>
                                <h2 class="card-title">Layanan Terpercaya</h2>
                                <p>Tim kami berpengalaman dalam menangani berbagai bisnis, menjamin hasil yang
                                    memuaskan.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        {{-- ================== Alur pemesanan ============================ --}}

        <div class="bg-[#FF4655]" id="alurPemesanan">
            <div
                class="container mx-auto grid grid-cols-1 gap-12 md:grid-cols-2 text-black justify-center items-center px-4 py-10 md:px-12 md:py-20">
                <div>
                    <div class="mb-6 text-white ">
                        <p class="card-title text-sm sm:text-center md:text-xl font-semibold">Alur Pemesanan</p>
                        <p class="text-xs md:text-lg mt-1">Berikut adalah alur pemesanan yang dapat digunakan untuk
                            Kelolain Aja :</p>
                    </div>
                    <div class="grid gap-8" data-aos="zoom-in-right">
                        <div class="card bg-white shadow-xl">
                            <div class="card-body flex flex-row items-center gap-4">
                                <div>
                                    <img src="/img/kardus.png" class="w-[3rem] h-[3rem]">
                                </div>
                                <div>
                                    <h2 class="card-title">Pilih Paket</h2>
                                    <p>Sesuaikan layanan dengan kebutuhan bisnismu.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-white shadow-xl">
                            <div class="card-body flex flex-row items-center gap-4">
                                <div>
                                    <img src="/img/pelayan.png" class="w-[3rem] h-[3rem]">
                                </div>
                                <div>
                                    <h2 class="card-title">Konsultasi</h2>
                                    <p>Diskusi bersama tim untuk hasil yang sesuai yang diinginkan</p>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-white shadow-xl">
                            <div class="card-body flex flex-row items-center gap-4">
                                <div>
                                    <img src="/img/mobil.png" class="w-[3rem] h-[3rem]">
                                </div>
                                <div>
                                    <h2 class="card-title">Pengiriman Hasil</h2>
                                    <p>Dapatkan hasil desain yang terbaik</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in-left">
                    <img src="/img/amico.png" alt="" class="w-auto object-cover mx-auto">
                </div>
            </div>
        </div>



        {{-- Price List Package --}}
        <div class="w-full container mx-auto bg-white pb-4">
            <div class="text-center text-black text-lg pt-12">
                <h2>Price List Package - Kelolainaja</h2>
                <h1 class="font-bold ">Paket Mana yang Sesuai dengan Kebutuhan Anda?</h1>
            </div>
            {{-- ======== paket medsos ================= --}}
            <div>
                <h2 class="text-start text-black text-xl pt-8 px-14 text-lg font-bold">Paket Layanan Media Sosial</h2>
                <div class="px-14 pt-6 ">
                    <button onclick="showSection('standar')"
                        class="px-4 py-2 bg-[#FF4655] hover:bg-red-600 text-white rounded-lg transition-colors">
                        Standar
                    </button>
                    <button onclick="showSection('custom')"
                        class="px-4 py-2 bg-[#FF4655] hover:bg-red-600 text-white rounded-lg transition-colors">
                        Custom
                    </button>
                </div>
            </div>

            <br>
            <div>
                <!-- STANDAR SECTION -->
                <div id="standar-section">
                    <div class="container p-8 mx-auto md:p-10 mt-[-2rem]">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                            @foreach ($mediaSosialPackages as $package)
                                <div class="card md:w-96 bg-[#FF4655] shadow-2xl h-full">
                                    <div class="card-body p-12 flex flex-col justify-between h-full">
                                        <div>
                                            <h2 class="text-3xl font-bold text-white">{{ $package->name }}</h2>
                                            <ul
                                                class="mt-6 flex flex-col gap-4 text-lg text-white list-disc list-inside mb-10">
                                                @foreach (explode(',', $package->description) as $desc)
                                                    <li class="text-xl marker:text-xl marker:text-white">
                                                        {{ trim($desc) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="flex justify-center gap-x-4">
                                                <h2
                                                    class="text-black font-bold text-lg line-through decoration-yellow-400">
                                                    Rp.{{ number_format($package->original_price ?? $package->price + 100000, 0, ',', '.') }}
                                                </h2>
                                                <h2 class="text-white text-3xl font-bold">
                                                    Rp.{{ number_format($package->price, 0, ',', '.') }}</h2>
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <div class="flex justify-center">
                                                <button
                                                    onclick="window.location.href='{{ route('deskripsiPaket', $package->id) }}'"
                                                    class="bg-white text-[#FF4655] px-6 py-3 rounded-lg w-80 font-semibold hover:bg-red-600 hover:text-white transition">
                                                    Pesan Sekarang
                                                </button>
                                            </div>
                                            <p class="text-white text-md text-center font-bold mt-4">
                                                1x Revisi/item | Add-on (Revisi) 10k
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- CUSTOM SECTION (PINDAHKAN KELUAR DARI #standar-section) -->
                <div id="custom-section" class="hidden mt-10">
                    <div class="container p-8 mx-auto md:p-10 mt-[-2rem]">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch">
                            @foreach ($customPackages as $package)
                                <div class="card md:w-96 bg-[#FF4655] shadow-2xl h-full">
                                    <div class="card-body p-12 flex flex-col justify-between h-full">
                                        <div>
                                            <h2 class="text-3xl font-bold text-white">{{ $package->name }}</h2>
                                            <ul
                                                class="mt-6 flex flex-col gap-4 text-lg text-white list-disc list-inside mb-10">
                                                @foreach (explode(',', $package->description) as $desc)
                                                    <li class="text-xl marker:text-xl marker:text-white">
                                                        {{ trim($desc) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="flex justify-center gap-x-4">
                                                <h2
                                                    class="text-black font-bold text-lg line-through decoration-yellow-400">
                                                    Rp.{{ number_format($package->original_price ?? $package->price + 100000, 0, ',', '.') }}
                                                </h2>
                                                <h2 class="text-white text-3xl font-bold">
                                                    Rp.{{ number_format($package->price, 0, ',', '.') }}</h2>
                                            </div>
                                        </div>
                                        <div class="mt-6">
                                            <div class="flex justify-center">
                                                <button
                                                    onclick="window.location.href='{{ route('deskripsiPaket', ['id' => $package->id, 'type' => 'custom']) }}'"
                                                    class="bg-white text-[#FF4655] px-6 py-3 rounded-lg w-80 font-semibold hover:bg-red-600 hover:text-white transition">
                                                    Pesan Sekarang
                                                </button>
                                            </div>
                                            <p class="text-white text-md text-center font-bold mt-4">
                                                1x Revisi/item | Add-on (Revisi) 10k
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>







            {{-- ============ paket desain =================== --}}

            <h2 class="text-start text-black text-xl pt-6 px-14 text-lg font-bold">Paket Layanan Desain</h2>
            <div>
                <div class="container mx-auto p-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($desainPackages as $package)
                            <div class="card md:w-96 bg-white shadow-2xl ">
                                <div class="card-body p-12">
                                    <h2 class="text-3xl font-bold text-[#FF4655]">{{ $package->name }}</h2>
                                    <ul
                                        class="mt-6 flex flex-col gap-4 text-lg text-[#FF4655] list-disc list-inside mb-10">
                                        @foreach (explode(',', $package->description) as $desc)
                                            <li class="text-xl marker:text-xl marker:text-[#FF4655]">
                                                {{ trim($desc) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="flex justify-center gap-x-4">
                                        <h2 class="text-black font-bold text-lg line-through decoration-[#FF4655]">
                                            Rp.{{ number_format($package->original_price ?? $package->price + 100000, 0, ',', '.') }}
                                        </h2>
                                        <h2 class="text-[#FF4655] text-3xl font-bold">
                                            Rp.{{ number_format($package->price, 0, ',', '.') }}</h2>
                                    </div>
                                    <div class="flex justify-center mt-6">
                                        <button onclick="window.location.href='/package/{{ $package->id }}'"
                                            class="bg-[#FF4655] text-white px-6 py-3 rounded-lg w-80 font-semibold hover:bg-red-600 hover:text-white transition">
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                    <br>
                                    <p class="text-[#FF4655] text-md text-center font-bold">1x Revisi/item | Add-on
                                        (Revisi) 10k</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        {{-- Portofolio Kami --}}
        <div class="w-full  bg-[#FF4654] p-14">
            <h1 class="text-center text-2xl text-white font-bold mb-6">Pilihan portofolio yang telah bekerja sama
                dengan
                Kami</h1>
            <div class="container mx-auto">
                <div class="flex overflow-x-auto gap-4 md:grid md:grid-cols-4 md:gap-8" data-aos="zoom-in-up">
                    @foreach ($videos as $video)
                        <div class="min-w-[16rem] bg-white shadow-lg rounded-lg flex-shrink p-4 min-w-0">
                            <video width="100%" height="auto" controls class="rounded-lg">
                                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">=
                            </video>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </section>
</body>
<script>
    AOS.init();
</script>

<script>
    function showSection(type) {
        const standar = document.getElementById('standar-section');
        const custom = document.getElementById('custom-section');

        if (type === 'standar') {
            standar.classList.remove('hidden');
            custom.classList.add('hidden');
        } else {
            standar.classList.add('hidden');
            custom.classList.remove('hidden');
        }
    }
</script>

</html>
