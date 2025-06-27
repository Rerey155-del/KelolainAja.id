<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body class="bg-white overflow-x-hidden">
    <section class="min-h-screen grid justify-center py-20 md:p-16 bg-white">
        <x-navbar></x-navbar>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
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
                                        {{ $paket->price }}</h2>
                                    <h2 class="text-white text-2xl md:text-4xl font-bold">{{ $paket->price }}</h2>
                                </div>
                                <p class="text-white text-center mt-4 text-sm md:text-md font-bold">1x Revisi/item | Add-on (Revisi) 10k</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Order -->
            <div class="p-4">
                <h2 class="font-bold text-black text-xl md:text-2xl mb-4">Produk Dipesan :</h2>
                <p class="text-black mb-2">{{ $paket->name }}</p>
                <p class="text-[#FF4655] mb-4">Harga : Rp.{{ $paket->price }}</p>

                <p class="text-black">Pesan :</p>
                <input type="text" placeholder="Accent" class="input border-[#FF4655] bg-white w-full md:w-[33rem] mt-2 mb-6" />

                <p class="font-bold text-black text-xl md:text-2xl mb-4">Metode Pembayaran:</p>
                <div class="flex flex-col md:flex-row md:space-x-8 space-y-4 md:space-y-0">
                    <button class="btn btn-outline w-full md:w-auto" id="btnBank">Transfer Bank</button>
                    <button class="btn btn-outline w-full md:w-auto" id="btnEwallet">E-Wallet</button>
                </div>

                <!-- E-Wallet Option -->
                <div class="space-y-2 mt-4 hidden" id="eWallet">
                  name('payment.form');
                </div>

                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-8 mt-8">
                    <button class="btn btn-outline w-full md:w-auto">Rp.{{ $paket->price }}</button>
                    <button class="btn btn-success w-full md:w-auto" id="orderButton">Buat Pesanan</button>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    AOS.init();

    // Check if user is not logged in on page load
    @if (!Auth::check())
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Login',
                text: 'kamu butuh login jika ingin memesan paket ini', //
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Login sekarang',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('login') }}';
                }
            });
        });
    @endif

    // Handle payment method toggling
    document.getElementById("btnBank").addEventListener("click", function() {
        document.getElementById("transferBank").classList.remove("hidden");
        document.getElementById("eWallet").classList.add("hidden");
    });

    document.getElementById("btnEwallet").addEventListener("click", function() {
        document.getElementById("eWallet").classList.remove("hidden");
        document.getElementById("transferBank").classList.add("hidden");
    });

    // Handle order button click
    document.getElementById('orderButton')?.addEventListener('click', function() {
        @if (!Auth::check())
            Swal.fire({
                title: 'Please Login',
                text: 'You need to login to place an order.',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Login Now',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('login') }}';
                }
            });
        @else
            // Add your order submission logic here if logged in
            Swal.fire({
                title: 'Order Placed',
                text: 'Your order has been submitted successfully!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
</html>