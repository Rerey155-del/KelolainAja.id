<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KelolainAja - Dashboard Pengguna</title>
    @vite('resources/css/app.css')
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #FF4655;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KelolainAja</div>
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Interface</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-home w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link collapsed" href="/contentPillar" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-columns w-5 mr-3"></i>
                    <span>Content Pillar</span>
                </a>
                <a class="nav-link collapsed" href="/contentCalendar" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Content Calendar</span>
                </a>
                <a class="nav-link collapsed" href="" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign w-5 mr-3"></i>
                    <span>Transactions</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="bg-white shadow-md py-2 px-4 flex items-center justify-between">
                <button id="sidebarToggleTop" class="md:hidden p-2 text-gray-600 hover:text-gray-900 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-800">Content Pillar Management</h2>
                    <p class="text-gray-600">Manage your content strategy pillars</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="hidden md:block w-px h-8 bg-gray-300"></div>
                    <div class="relative">
                        <div class="dropdown dropdown-end">
                            <button class="flex items-center bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400" aria-label="User menu" onclick="this.nextElementSibling.classList.toggle('hidden')">
                                <i class="fas fa-user-circle text-xl mr-2"></i>
                                {{ Auth::user()->name }}
                                <i class="fas fa-chevron-down ml-2 text-sm"></i>
                            </button>
                            <ul class="dropdown-content hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                <li>
                                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm mr-2 text-gray-500"></i> Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <br>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pillar Name</th>
                                        <th>Description</th>
                                        <th>Percentage</th>
                                        <th>Color</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($pillars->isNotEmpty())
                                        @foreach ($pillars as $pillar)
                                            <tr>
                                                <td>{{ $pillar->name }}</td>
                                                <td>{{ $pillar->description }}</td>
                                                <td>{{ $pillar->percentage }}%</td>
                                                <td><span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $pillar->color }};"></span></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <p class="text-gray-600">Tidak ada content pillar yg tersedia.</p>
                                                <button onclick="window.location.href='/'" class="mt-2 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">Beli Paket</button>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('buyServiceBtn')?.addEventListener('click', function() {
            Swal.fire({
                title: 'Buy Service',
                text: 'Would you like to purchase a service to unlock content pillars?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Buy Now',
                cancelButtonText: 'No, Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman pembelian (ganti dengan rute yang sesuai)
                    window.location.href = '/buy-service'; // Sesuaikan dengan rute pembelian
                }
            });
        });

        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
</body>

</html>