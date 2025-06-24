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
                <a class="nav-link collapsed" href="/contentPillar" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-columns w-5 mr-3"></i>
                    <span>Content Pillar</span>
                </a>

                <a class="nav-link collapsed" href="/contentCalender" data-target="#collapseTwo" aria-expanded="true"
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
                    <h2 class="text-2xl font-bold text-gray-800">Content Calendar</h2>
                    <p class="text-gray-600">Schedule and manage your content</p>
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
                <button type="button"
                    class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">+
                    Add New Pillar</button>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Pillar Name</th>
                                        <th>Desciption</th>
                                        <th>Percentage</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>

                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>

                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>

                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>

                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script src=" {{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>