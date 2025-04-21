<div class="navbar bg-white shadow-sm fixed top-0 left-0 w-full z-50 text-black">
  <div class="navbar-start pl-10">
      <img src="/img/Kelolain.png" alt="Logo" class="w-30 h-8">
  </div>

  <div class="navbar-end hidden lg:flex px-4">
      <ul class="menu menu-horizontal px-1">
          <li><a href="#layanan">Layanan</a></li>
          <li><a href="#keunggulan">Keunggulan</a></li>
          <li><a href="#alurPemesanan">Alur Pemesanan</a></li>
      </ul>

      @auth
          <!-- Jika pengguna sudah login -->
          <div class="dropdown dropdown-end">
              <label tabindex="0" class="btn bg-[#FF4654] text-white border-[#FF4654]">
                  {{ Auth::user()->name }}
              </label>
              <ul tabindex="0"
                  class="dropdown-content menu p-2 shadow bg-white text-black rounded-box w-52 mt-2">
               
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                  </a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                      @csrf
                  </form>
              </ul>
          </div>
      @else
          <!-- Jika pengguna belum login -->
          <a href="{{ route('login') }}" class="btn bg-[#FF4654] text-white border-[#FF4654]">
              Login
          </a>
      @endauth
  </div>
</div>
