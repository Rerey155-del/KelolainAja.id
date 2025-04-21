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
</head>

<body class="bg-white">
    <section class="grid justify-center p-24">
        <x-navbar></x-navbar>
        <div class="grid grid-cols-2" data-aos="fade-up">
            <div class="flex flex-col">
                <div>
                    <div class="container mx-auto p-10">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">

                            <div class="card w-96 bg-[#FF4655] shadow-2xl">
                                <div class="card-body p-12">
                                    <h2 class="text-3xl font-bold text-white">{{ $paket->name }}</h2>
                                    <ul class="mt-6 flex flex-col gap-4 text-lg text-white list-disc list-inside mb-10">
                                        @foreach (explode(',', $paket->description) as $desc)
                                            <li class="text-xl marker:text-xl marker:text-white">{{ trim($desc) }}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="flex justify-center gap-x-4">
                                        <h2 class="text-black font-bold text-2xl line-through decoration-white">
                                            {{ $paket->price }}</h2>
                                        <h2 class="text-white text-4xl font-bold">{{ $paket->price }}</h2>
                                    </div>
                                    <br>
                                    <p class="text-white text-md text-center font-bold">1x Revisi/item | Add-on
                                        (Revisi) 10k</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <h2 class="font-bold text-black text-2xl mb-4">Produk Dipesan :</h2>
                <p class="text-black mb-4">{{ $paket->name }}</p>
                <p class="text-[#FF4655]">Harga : Rp.{{ $paket->price }}</p>
                <br>
                <p class="text-black">pesan :</p>
                <input type="text" placeholder="Accent"
                    class="input border-[#FF4655] focus:border-[#FF4655] bg-white w-[33rem] mb-8 mt-2" />

                <p class="font-bold text-black text-2xl mb-6">Metode Pembayaran : </p>
                <div class="flex space-x-8">
                    <button class="btn btn-outline" id="btnBank">Transfer Bank</button>
                    <button class="btn btn-outline" id="btnEwallet">E-Wallet</button>
                </div>
                {{-- Transfer Bank --}}
                <div class="space-y-2 mt-4 hidden" id="transferBank">
                    <p class="font-semibold">Pilih Bank :</p>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bca" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/BCA.png" alt="BCA" class="w-12">
                        <span>Bank BCA</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="mandiri" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/mandiri.png" alt="Mandiri" class="w-12">
                        <span>Bank Mandiri</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bni" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/BNI.png" alt="BNI" class="w-12">
                        <span>Bank BNI</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bri" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/BRI.png" alt="BRI" class="w-12">
                        <span>Bank BRI</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bsi" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/BSI.png" alt="BSI" class="w-12">
                        <span>Bank Syariah Indonesia</span>
                    </label>
                </div>

                {{-- E-WALLET --}}

                <div class="space-y-2 mt-4 hidden " id="eWallet">
                    <p class="font-semibold">Pilih E-wallet :</p>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bca" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/gopay.png" alt="Gopay" class="w-12">
                        <span>Gopay</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="mandiri" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/dana.png" alt="Dana" class="w-12">

                        <span>Dana</span>
                    </label>

                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="bank" value="bni" class="hidden peer">
                        <div
                            class="w-5 h-5 rounded-full border-2 border-gray-400 peer-checked:border-red-500 peer-checked:bg-red-500">
                        </div>
                        <img src="/img/ovo.png" alt="OVO" class="w-12">
                        <span>OVO</span>
                    </label>
                </div>

                <div class="flex space-x-8 mt-[3rem]">
                    <button class="btn btn-outline">Rp.{{ $paket->price }}</button>
                    <button class="btn btn-success">Buat Pesanan</button>
                </div>
            </div>
        </div>

    </section>
</body>
<script>
    AOS.init();
</script>

<script>
    document.getElementById("btnBank").addEventListener("click", function() {
        document.getElementById("transferBank").classList.remove("hidden");
        document.getElementById("eWallet").classList.add("hidden");

    })
    document.getElementById("btnEwallet").addEventListener("click", function() {
        document.getElementById("eWallet").classList.remove("hidden");
        document.getElementById("transferBank").classList.add("hidden");
    })
</script>

</html>
