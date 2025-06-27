<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket</title>

    @vite('resources/css/app.css')

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Midtrans Snap -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>

<body class="bg-white overflow-x-hidden">
    <!-- Navbar -->
    <x-navbar />

    <!-- Content Section -->
    <section class="min-h-screen grid justify-center items-center py-20 md:p-16 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
            <!-- Paket Card -->
            <div class="flex flex-col">
                <div class="container mx-auto p-6 md:p-10">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="card w-full md:w-96 bg-[#FF4655] shadow-2xl">
                            <div class="card-body p-6 md:p-12">
                                <h2 class="text-2xl md:text-3xl font-bold text-white">{{ $paket->name }}</h2>
                                <ul class="mt-4 md:mt-6 flex flex-col gap-2 md:gap-4 text-base md:text-lg text-white list-disc list-inside mb-6 md:mb-10">
                                    @foreach (explode(',', $paket->description) as $desc)
                                        <li class="marker:text-white">{{ trim($desc) }}</li>
                                    @endforeach
                                </ul>
                                <div class="flex justify-center gap-x-4">
                                    <h2 class="text-black font-bold text-xl md:text-2xl line-through decoration-white">
                                        Rp {{ number_format($paket->original_price ?? $paket->price + 100000, 0, ',', '.') }}
                                    </h2>
                                    <h2 class="text-white text-2xl md:text-4xl font-bold">
                                        Rp {{ number_format($paket->price, 0, ',', '.') }}
                                    </h2>
                                </div>
                                <p class="text-white text-center mt-4 text-sm md:text-md font-bold">
                                    1x Revisi/item | Add-on (Revisi) Rp10.000
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Order -->
            <div class="p-4">
                <h2 class="font-bold text-black text-xl md:text-2xl mb-4">Produk Dipesan :</h2>
                <p class="text-black mb-2">{{ $paket->name }}</p>
                <p class="text-[#FF4655] mb-4">Harga : Rp {{ number_format($paket->price, 0, ',', '.') }}</p>

                <label class="text-black block mb-1">Pesan:</label>
                <input
                    type="text"
                    name="pesan"
                    placeholder="Tulis instruksi desain (opsional)"
                    class="input border-[#FF4655] bg-white w-full md:w-[33rem] mt-2 mb-6 px-4 py-2 border rounded" />

                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 mt-8">
                    <button id="payNow" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded shadow font-bold">
                        Bayar Sekarang
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- AOS Init -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init();
        });
    </script>

    <!-- Midtrans Payment Handling -->
    <script>
        document.getElementById('payNow')?.addEventListener('click', function () {
            @guest
                Swal.fire({
                    title: 'Login Diperlukan',
                    text: 'Silakan login terlebih dahulu untuk melakukan pembayaran.',
                    icon: 'warning',
                    confirmButtonText: 'Login',
                }).then(() => {
                    window.location.href = '{{ route('login') }}';
                });
            @else
                Swal.fire({
                    title: 'Memproses Pembayaran...',
                    text: 'Mohon tunggu sebentar.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch("{{ route('payment.snap.create') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        package_id: {{ $paket->id }},
                        package_name: "{{ $paket->name }}",
                        price: {{ $paket->price }}
                    })
                })
                .then(res => res.json())
                .then(data => {
                    Swal.close();
                    if (data.snap_token) {
                        window.snap.pay(data.snap_token);
                    } else {
                        throw new Error('Token tidak ditemukan.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    Swal.fire("Gagal", "Terjadi kesalahan saat memproses pembayaran", "error");
                });
            @endguest
        });
    </script>
</body>

</html>
