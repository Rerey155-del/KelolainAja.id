@php
    use App\Models\Video;
    use App\Models\User;
    use App\Models\Admin;

    $totalVideos = Video::count(); // Hitung jumlah video
    $totalUsers = User::count(); // Hitung jumlah user
    $totalAdmins = Admin::count(); // Hitung jumlah admin
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>KelolainAja - Dashboard Pengguna</title>

    <!-- Custom fonts for this template-->
    @vite('resources/css/app.css')
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #FF4655;">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KelolainAja</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/dashboard" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-home w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link collapsed" href="" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-columns w-5 mr-3"></i>
                    <span>Content Pillar</span>
                </a>
               
                <a class="nav-link collapsed" href="" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Content Calendar</span>
                </a>
                <a class="nav-link collapsed" href="" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign w-5 mr-3"></i>
                    <span>Transactions</span>
                </a>

            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
                <!-- Topbar -->
                <nav class="bg-white shadow-md py-2 px-4 flex items-center justify-between">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop"
                        class="md:hidden p-2 text-gray-600 hover:text-gray-900 rounded-full focus:outline-none focus:ring-2 focus:ring-red-500">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Left Section (Dashboard Text) -->
                    <div class="flex flex-col">
                        <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-gray-600">Welcome back! Here's what's happening with your content.</p>
                    </div>

                    <!-- Right Section (User Information) -->
                    <div class="flex items-center space-x-4">
                        <div class="hidden md:block w-px h-8 bg-gray-300"></div>
                        <div class="relative">
                            <div class="dropdown dropdown-end">
                                <button
                                    class="flex items-center bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400"
                                    aria-label="User menu" onclick="this.nextElementSibling.classList.toggle('hidden')">
                                    <i class="fas fa-user-circle text-xl mr-2"></i>
                                    {{ Auth::user()->name }}
                                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                                </button>

                                <!-- Dropdown Menu -->
                                <ul
                                    class="dropdown-content hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition-colors"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <!-- End of Topbar -->
                <br>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                            <div
                                class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-columns text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800" id="totalPillars">5</h3>
                            <p class="text-gray-600">Content Pillars</p>
                        </div>
                        <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                            <div
                                class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-calendar text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800" id="totalContent">10</h3>
                            <p class="text-gray-600">Scheduled Content</p>
                        </div>
                        <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                            <div
                                class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800" id="totalClients">0</h3>
                            <p class="text-gray-600">Active Clients</p>
                        </div>
                        <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                            <div
                                class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-dollar-sign text-white text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800" id="totalRevenue">$0</h3>
                            <p class="text-gray-600">Total Revenue</p>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Content Pillar Distribution</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-100 rounded-full mr-4"></div>
                                <span class="flex-1">Inspirasi</span>
                                <span class="font-semibold">10%</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-200 rounded-full mr-4"></div>
                                <span class="flex-1">Informasi</span>
                                <span class="font-semibold">10%</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-300 rounded-full mr-4"></div>
                                <span class="flex-1">Interaksi</span>
                                <span class="font-semibold">20%</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-500 rounded-full mr-4"></div>
                                <span class="flex-1">Edukasi</span>
                                <span class="font-semibold">30%</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-red-600 rounded-full mr-4"></div>
                                <span class="flex-1">Promosi</span>
                                <span class="font-semibold">30%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>