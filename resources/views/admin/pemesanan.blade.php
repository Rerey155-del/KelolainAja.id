@php
    use App\Models\Video;
    use App\Models\User;
    use App\Models\Admin;
    use App\Models\ContentPillar;
    use App\Models\ContentCalendar;
    use App\Models\Order;

    $totalVideos = Video::count(); // Hitung jumlah video
    $totalUsers = User::count(); // Hitung jumlah user
    $totalAdmins = Admin::count(); // Hitung jumlah admin
    $users = User::all(); // Ambil semua pengguna untuk dropdown
    $allPillars = ContentPillar::all(); // Ambil semua data Content Pillar
    $allCalendars = ContentCalendar::all(); // Ambil semua data Content Calendar

    $allOrders = Order::all();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>KelolainAja - Dashboard</title>

    <!-- Custom fonts for this template-->
    @vite('resources/css/app.css')
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Tambahkan CSS untuk styling tambahan -->
    <style>
        .table-container {
            display: none;
            margin-top: 20px;
        }

        .table-container.active {
            display: block;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #FF4655;">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KelolainAja</div>
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Interface</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/dashboard" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link collapsed" href="/admin/tables" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pemesanan</span>
                </a>
                <a class="nav-link collapsed" href="/admin/users" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Users</span>
                </a>
                <a class="nav-link collapsed" href="/admin/videos" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Videos</span>
                </a>
                <a class="nav-link collapsed" href="/admin/contentUsers" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Content Mitra</span>
                </a>

            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="relative">
                            <div class="dropdown dropdown-end">
                                <button
                                    class="flex items-center bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400">
                                    {{-- <i class="fas fa-user-circle text-xl mr-2"></i> {{ Auth::user()->name }} --}}
                                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                                </button>
                                <ul
                                    class="dropdown-content absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                    <div class="border-t border-gray-200"></div>
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 transition"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm mr-2 text-gray-500"></i> Logout
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                        class="hidden">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Dropdown Select Akun -->
                    <div class="mb-4">
                        <label for="userSelect" class="block text-sm font-medium text-white">Pilih Akun:</label>
                        <select id="userSelect"
                            class="mt-1 block pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-[#FF4655] text-white">
                            <option value="">Pilih Akun</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->user_id }}" class="bg-[#FF4655] text-white">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tabel Orders -->
                    <div id="orderTable" class="table-container">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h3 class="text-xl font-bold mb-2">Order History</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="orderTableElement" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>User ID</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Payment Type</th>
                                                <th>Created At</th>
                                            </tr>
                                        </thead>
                                        <tbody id="orderTableBody">
                                            @foreach ($allOrders as $order)
                                                @if ($order->user_id == (isset($selectedUserId) ? $selectedUserId : ''))
                                                    <tr>
                                                        <td>{{ $order->id }}</td>
                                                        <td>{{ $order->user_id }}</td>
                                                        <td>{{ $order->gross_amount }}</td>
                                                        <td>{{ $order->transaction_status }}</td>
                                                        <td>{{ $order->payment_type }}</td>
                                                        <td>{{ $order->created_at }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © KelolainAja 2025</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
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

    <!-- Tambahkan JavaScript untuk memperbarui tabel -->
    <script>
        document.getElementById('userSelect').addEventListener('change', function() {
            const userId = this.value;
            const pillarTable = document.getElementById('pillarTable');
            const calendarTable = document.getElementById('calendarTable');
            const pillarTableBody = document.getElementById('pillarTableBody');
            const calendarTableBody = document.getElementById('calendarTableBody');

            // Kosongkan kedua tabel
            pillarTableBody.innerHTML = '';
            calendarTableBody.innerHTML = '';

            // Filter dan isi tabel Content Pillar
            @foreach ($allPillars as $pillar)
                if (userId == {{ $pillar->user_id }}) {
                    const row = `<tr>
                            <td>{{ $pillar->name }}</td>
                            <td>{{ $pillar->description }}</td>
                            <td>{{ $pillar->percentage }}%</td>
                            <td><span class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $pillar->color }};"></span></td>
                            <td><a href="#" class="text-blue-600 hover:underline">Edit</a> <a href="#" class="text-red-600 hover:underline ml-2">Delete</a></td>
                        </tr>`;
                    pillarTableBody.innerHTML += row;
                }
            @endforeach

            // Filter dan isi tabel Content Calendar
            @foreach ($allCalendars as $calendar)
                if (userId == {{ $calendar->user_id }}) {
                    const row = `<tr>
                            <td>{{ $calendar->name }}</td>
                            <td>{{ $calendar->status }}</td>
                            <td>{{ $calendar->category }}</td>

                            <td><a href="#" class="text-blue-600 hover:underline">Edit</a> <a href="#" class="text-red-600 hover:underline ml-2">Delete</a></td>
                        </tr>`;
                    calendarTableBody.innerHTML += row;
                }
            @endforeach

            // Tampilkan tabel yang sesuai
            if (userId) {
                pillarTable.classList.add('active');
                if (calendarTableBody.innerHTML.trim() !== '') {
                    calendarTable.classList.add('active');
                } else {
                    calendarTable.classList.remove('active');
                }
            } else {
                pillarTable.classList.remove('active');
                calendarTable.classList.remove('active');
            }
        });
    </script>
</body>

</html>
