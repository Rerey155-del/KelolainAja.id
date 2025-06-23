<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 50%, #b91c1c 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
        }
        .sidebar-item.active {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
        }
        .sidebar {
            transition: transform 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="md:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-700"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 bg-white shadow-xl z-40">
        <!-- Logo Section -->
        <div class="gradient-bg p-6">
            <div class="flex items-center space-x-3">
                <i class="fas fa-chart-line text-white text-2xl"></i>
                <h1 class="text-white text-xl font-bold">Kelolainaja</h1>
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="p-4 border-b">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 gradient-bg rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white text-lg"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800"> {{ Auth::user()->name }}</h3>
                    <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mt-1">
                        <i class="fas fa-circle text-xs mr-1"></i>Online
                    </span>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-4">
            <ul class="space-y-1">
                <li>
                    <button onclick="showSection('dashboard')" class="sidebar-item w-full flex items-center px-6 py-3 text-left text-gray-700 hover:text-red-600">
                        <i class="fas fa-home w-5 mr-3"></i>
                        <span>Dashboard</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('pillar')" class="sidebar-item w-full flex items-center px-6 py-3 text-left text-gray-700 hover:text-red-600">
                        <i class="fas fa-columns w-5 mr-3"></i>
                        <span>Content Pillar</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('calendar')" class="sidebar-item w-full flex items-center px-6 py-3 text-left text-gray-700 hover:text-red-600">
                        <i class="fas fa-calendar w-5 mr-3"></i>
                        <span>Content Calendar</span>
                    </button>
                </li>
                <li>
                    <button onclick="showSection('transactions')" class="sidebar-item w-full flex items-center px-6 py-3 text-left text-gray-700 hover:text-red-600">
                        <i class="fas fa-dollar-sign w-5 mr-3"></i>
                        <span>Transactions</span>
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Bottom Section -->
        <div class="absolute bottom-0 w-full p-4 border-t">
            <button class="w-full flex items-center px-4 py-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                <i class="fas fa-cog w-5 mr-3"></i>
                <span>Settings</span>
            </button>
            <button class="w-full flex items-center px-4 py-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors mt-2">
                <i class="fas fa-sign-out-alt w-5 mr-3"></i>
                <span>Logout</span>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="md:ml-64 min-h-screen">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b px-6 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h2 id="pageTitle" class="text-2xl font-bold text-gray-800">Dashboard</h2>
                    <p id="pageSubtitle" class="text-gray-600">Welcome back! Here's what's happening with your content.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="relative p-2 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <div class="w-8 h-8 gradient-bg rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Overview -->
        <div id="dashboard" class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                    <div class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-columns text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800" id="totalPillars">5</h3>
                    <p class="text-gray-600">Content Pillars</p>
                </div>
                <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                    <div class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800" id="totalContent">10</h3>
                    <p class="text-gray-600">Scheduled Content</p>
                </div>
                <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                    <div class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800" id="totalClients">0</h3>
                    <p class="text-gray-600">Active Clients</p>
                </div>
                <div class="glass-card hover-scale rounded-xl p-6 text-center bg-white shadow-lg">
                    <div class="gradient-bg w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-dollar-sign text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800" id="totalRevenue">$0</h3>
                    <p class="text-gray-600">Total Revenue</p>
                </div>
            </div>

            <!-- Content Pillar Chart -->
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

        <!-- Content Pillar Section -->
        <div id="pillar" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <button onclick="openPillarModal()" class="gradient-bg text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all">
                    <i class="fas fa-plus mr-2"></i>Add New Pillar
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="gradient-bg text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">Pillar Name</th>
                                <th class="px-6 py-4 text-left">Description</th>
                                <th class="px-6 py-4 text-left">Percentage</th>
                                <th class="px-6 py-4 text-left">Color</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="pillarTableBody">
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Content Calendar Section -->
        <div id="calendar" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <button onclick="openCalendarModal()" class="gradient-bg text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all">
                    <i class="fas fa-plus mr-2"></i>Add New Content
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="gradient-bg text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">Name</th>
                                <th class="px-6 py-4 text-left">Status</th>
                                <th class="px-6 py-4 text-left">Category</th>
                                <th class="px-6 py-4 text-left">Attachments</th>
                                <th class="px-6 py-4 text-left">Upload For</th>
                                <th class="px-6 py-4 text-left">Reference</th>
                                <th class="px-6 py-4 text-left">Format</th>
                                <th class="px-6 py-4 text-left">Assignee</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="calendarTableBody">
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Transactions Section -->
        <div id="transactions" class="p-6 hidden">
            <div class="flex justify-between items-center mb-6">
                <button onclick="openTransactionModal()" class="gradient-bg text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all">
                    <i class="fas fa-plus mr-2"></i>Add New Transaction
                </button>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="gradient-bg text-white">
                            <tr>
                                <th class="px-6 py-4 text-left">Client Name</th>
                                <th class="px-6 py-4 text-left">Service</th>
                                <th class="px-6 py-4 text-left">Amount</th>
                                <th class="px-6 py-4 text-left">Status</th>
                                <th class="px-6 py-4 text-left">Date</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="transactionTableBody">
                            <!-- Data will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <!-- Pillar Modal -->
    <div id="pillarModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Add/Edit Content Pillar</h3>
            <form id="pillarForm">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pillar Name</label>
                    <input type="text" id="pillarName" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea id="pillarDescription" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" rows="3"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Percentage</label>
                    <input type="number" id="pillarPercentage" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" min="0" max="100" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Color</label>
                    <input type="color" id="pillarColor" class="w-full h-10 border rounded-lg focus:outline-none focus:border-red-500">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closePillarModal()" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg hover:shadow-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Calendar Modal -->
    <div id="calendarModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-8 max-w-2xl w-full mx-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Add/Edit Content</h3>
            <form id="calendarForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Content Name</label>
                        <input type="text" id="contentName" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select id="contentStatus" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                            <option value="Not started">Not started</option>
                            <option value="Done">Done</option>
                            <option value="In Progress">In Progress</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                        <select id="contentCategory" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                            <option value="Product Highlight">Product Highlight</option>
                            <option value="Product Knowledge">Product Knowledge</option>
                            <option value="Customer Testimonial">Customer Testimonial</option>
                            <option value="Lifestyle & Moment">Lifestyle & Moment</option>
                            <option value="Promo & Campaign">Promo & Campaign</option>
                            <option value="Behind the Scene & Story">Behind the Scene & Story</option>
                            <option value="Engagement Content">Engagement Content</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Format</label>
                        <select id="contentFormat" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                            <option value="Foto">Foto</option>
                            <option value="Video">Video</option>
                            <option value="Carousel">Carousel</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Upload For</label>
                        <input type="text" id="contentUploadFor" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Assignee</label>
                        <input type="text" id="contentAssignee" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Reference URL</label>
                    <input type="url" id="contentReference" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeCalendarModal()" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg hover:shadow-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Transaction Modal -->
    <div id="transactionModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white rounded-xl p-8 max-w-md w-full mx-4">
            <h3 class="text-2xl font-bold text-gray-800 mb-6">Add/Edit Transaction</h3>
            <form id="transactionForm">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Client Name</label>
                    <input type="text" id="clientName" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Service</label>
                    <input type="text" id="service" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                    <input type="number" id="amount" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                    <select id="transactionStatus" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500">
                        <option value="Pending">Pending</option>
                        <option value="Paid">Paid</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                    <input type="date" id="transactionDate" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-red-500" required>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeTransactionModal()" class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-50">Cancel</button>
                    <button type="submit" class="gradient-bg text-white px-6 py-2 rounded-lg hover:shadow-lg">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Data Storage
        let contentPillars = [
            { id: 1, name: 'Inspirasi', description: 'Cerita personal, Keahlian, Good Inspirational', percentage: 10, color: '#fef2f2' },
            { id: 2, name: 'Informasi', description: 'Berbagai hal Baru, berita perubahan', percentage: 10, color: '#fecaca' },
            { id: 3, name: 'Interaksi', description: 'Kuis, tanggapan, diskusi, survei, respon games', percentage: 20, color: '#fca5a5' },
            { id: 4, name: 'Edukasi', description: 'How-to tips, demo tool, informasi berimbah.', percentage: 30, color: '#ef4444' },
            { id: 5, name: 'Promosi', description: 'produk, harga, benefit, produk, testimonial promo', percentage: 30, color: '#dc2626' }
        ];

        let contentCalendar = [
            { id: 1, name: 'Close-up shot roti Ringhini - Roti Ringhini terbak...', status: 'Done', category: 'Product Highlight', attachments: '', uploadFor: '', reference: 'https://www.instagram.co', format: 'Foto', assignee: 'Ryan' },
            { id: 2, name: 'Cara menyimpan roti agar tetap segar selama 3 ha...', status: 'Not started', category: 'Product Knowledge', attachments: '', uploadFor: '', reference: 'https://www.instagram.co', format: 'Foto', assignee: 'Kelolalinga' },
            { id: 3, name: 'Review pelanggan seri tentang rasa dan tekstur...', status: 'Not started', category: 'Customer Testimonial', attachments: '', uploadFor: '', reference: 'https://id.pinterest.com/p', format: 'Foto', assignee: 'Kelolalinga' },
            { id: 4, name: 'POV: Sarapan pagi - kopi di balkon dengan Ring...', status: 'Not started', category: 'Lifestyle & Moment', attachments: '', uploadFor: '', reference: 'https://www.tiktok.com/@', format: 'Video', assignee: 'Kelolalinga' },
            { id: 5, name: 'Flash Sale Beli 5 dapat 1 gratis - Promo Terbaru!...', status: 'Done', category: 'Promo & Campaign', attachments: '', uploadFor: '', reference: 'https://id.pinterest.com/p', format: 'Foto', assignee: 'Rayhani' }
        ];

        let transactions = [];

        let currentEditingPillar = null;
        let currentEditingContent = null;
        let currentEditingTransaction = null;

        // Mobile menu functionality
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        });

        // Page titles and subtitles
        const pageTitles = {
            dashboard: { title: 'Dashboard', subtitle: 'Welcome back! Here\'s what\'s happening with your content.' },
            pillar: { title: 'Content Pillar Management', subtitle: 'Manage your content strategy pillars' },
            calendar: { title: 'Content Calendar', subtitle: 'Schedule and manage your content' },
            transactions: { title: 'Client Transactions', subtitle: 'Track your client payments and services' }
        };

        // Navigation
        function showSection(section) {
            const sections = ['dashboard', 'pillar', 'calendar', 'transactions'];
            sections.forEach(s => {
                document.getElementById(s).classList.add('hidden');
            });
            document.getElementById(section).classList.remove('hidden');
            
            // Update page title
            document.getElementById('pageTitle').textContent = pageTitles[section].title;
            document.getElementById('pageSubtitle').textContent = pageTitles[section].subtitle;
            
            // Update active menu item
            const menuItems = document.querySelectorAll('.sidebar-item');
            menuItems.forEach(item => item.classList.remove('active'));
            event.target.classList.add('active');
            
            // Close mobile menu
            document.getElementById('sidebar').classList.remove('open');
        }
        // Pillar Modal
        function openPillarModal() {
            document.getElementById('pillarModal').classList.remove('hidden');
            document.getElementById('pillarForm').reset();
            currentEditingPillar = null;
        }
        function closePillarModal() {
            document.getElementById('pillarModal').classList.add('hidden');
        }
        document.getElementById('pillarForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('pillarName').value;
            const description = document.getElementById('pillarDescription').value;
            const percentage = parseInt(document.getElementById('pillarPercentage').value);
            const color = document.getElementById('pillarColor').value;

            if (currentEditingPillar) {
                // Update existing pillar
                currentEditingPillar.name = name;
                currentEditingPillar.description = description;
                currentEditingPillar.percentage = percentage;
                currentEditingPillar.color = color;
            } else {
                // Add new pillar
                const newPillar = {
                    id: contentPillars.length + 1,
                    name: name,
                    description: description,
                    percentage: percentage,
                    color: color
                };
                contentPillars.push(newPillar);
            }
            renderPillars();
            closePillarModal();
        });
        function renderPillars() {
            const tableBody = document.getElementById('pillarTableBody');
            tableBody.innerHTML = '';
            contentPillars.forEach(pillar => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4">${pillar.name}</td>
                    <td class="px-6 py-4">${pillar.description}</td>
                    <td class="px-6 py-4">${pillar.percentage}%</td>
                    <td class="px-6 py-4"><span class="inline-block w-4 h-4 rounded-full" style="background-color: ${pillar.color};"></span></td>
                    <td class="px-6 py-4">
                        <button onclick="editPillar(${pillar.id})" class="text-blue-600 hover:underline">Edit</button>
                        <button onclick="deletePillar(${pillar.id})" class="text-red-600 hover:underline ml-2">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }   
        function editPillar(id) {
            currentEditingPillar = contentPillars.find(p => p.id === id);
            document.getElementById('pillarName').value = currentEditingPillar.name;
            document.getElementById('pillarDescription').value = currentEditingPillar.description;
            document.getElementById('pillarPercentage').value = currentEditingPillar.percentage;
            document.getElementById('pillarColor').value = currentEditingPillar.color;
            openPillarModal();
        }
        function deletePillar(id) {
            contentPillars = contentPillars.filter(p => p.id !== id);
            renderPillars();
        }
        // Calendar Modal
        function openCalendarModal() {
            document.getElementById('calendarModal').classList.remove('hidden');
            document.getElementById('calendarForm').reset();
            currentEditingContent = null;
        }
        function closeCalendarModal() {
            document.getElementById('calendarModal').classList.add('hidden');
        }
        document.getElementById('calendarForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('contentName').value;
            const status = document.getElementById('contentStatus').value;
            const category = document.getElementById('contentCategory').value;
            const attachments = document.getElementById('contentAttachments').value;
            const uploadFor = document.getElementById('contentUploadFor').value;
            const reference = document.getElementById('contentReference').value;
            const format = document.getElementById('contentFormat').value;
            const assignee = document.getElementById('contentAssignee').value;

            if (currentEditingContent) {
                // Update existing content
                currentEditingContent.name = name;
                currentEditingContent.status = status;
                currentEditingContent.category = category;
                currentEditingContent.attachments = attachments;
                currentEditingContent.uploadFor = uploadFor;
                currentEditingContent.reference = reference;
                currentEditingContent.format = format;
                currentEditingContent.assignee = assignee;
            } else {
                // Add new content
                const newContent = {
                    id: contentCalendar.length + 1,
                    name: name,
                    status: status,
                    category: category,
                    attachments: attachments,
                    uploadFor: uploadFor,
                    reference: reference,
                    format: format,
                    assignee: assignee
                };
                contentCalendar.push(newContent);
            }
            renderCalendar();
            closeCalendarModal();
        });
        function renderCalendar() {
            const tableBody = document.getElementById('calendarTableBody');
            tableBody.innerHTML = '';
            contentCalendar.forEach(content => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4">${content.name}</td>
                    <td class="px-6 py-4">${content.status}</td>
                    <td class="px-6 py-4">${content.category}</td>
                    <td class="px-6 py-4">${content.attachments || '-'}</td>
                    <td class="px-6 py-4">${content.uploadFor || '-'}</td>
                    <td class="px-6 py-4"><a href="${content.reference}" target="_blank" class="text-blue-600 hover:underline">View</a></td>
                    <td class="px-6 py-4">${content.format}</td>
                    <td class="px-6 py-4">${content.assignee}</td>
                    <td class="px-6 py-4">
                        <button onclick="editContent(${content.id})" class="text-blue-600 hover:underline">Edit</button>
                        <button onclick="deleteContent(${content.id})" class="text-red-600 hover:underline ml-2">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        function editContent(id) {
            currentEditingContent = contentCalendar.find(c => c.id === id);
            document.getElementById('contentName').value = currentEditingContent.name;
            document.getElementById('contentStatus').value = currentEditingContent.status;
            document.getElementById('contentCategory').value = currentEditingContent.category;
            document.getElementById('contentAttachments').value = currentEditingContent.attachments || '';
            document.getElementById('contentUploadFor').value = currentEditingContent.uploadFor || '';
            document.getElementById('contentReference').value = currentEditingContent.reference || '';
            document.getElementById('contentFormat').value = currentEditingContent.format;
            document.getElementById('contentAssignee').value = currentEditingContent.assignee;
            openCalendarModal();
        }   
        function deleteContent(id) {
            contentCalendar = contentCalendar.filter(c => c.id !== id);
            renderCalendar();
        }
        // Transaction Modal
        function openTransactionModal() {
            document.getElementById('transactionModal').classList.remove('hidden');
            document.getElementById('transactionForm').reset();
            currentEditingTransaction = null;
        }
        function closeTransactionModal() {
            document.getElementById('transactionModal').classList.add('hidden');
        }   
        document.getElementById('transactionForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const clientName = document.getElementById('clientName').value;
            const service = document.getElementById('service').value;
            const amount = parseFloat(document.getElementById('amount').value);
            const status = document.getElementById('transactionStatus').value;
            const date = document.getElementById('transactionDate').value;

            if (currentEditingTransaction) {
                // Update existing transaction
                currentEditingTransaction.clientName = clientName;
                currentEditingTransaction.service = service;
                currentEditingTransaction.amount = amount;
                currentEditingTransaction.status = status;
                currentEditingTransaction.date = date;
            } else {
                // Add new transaction
                const newTransaction = {
                    id: transactions.length + 1,
                    clientName: clientName,
                    service: service,
                    amount: amount,
                    status: status,
                    date: date
                };
                transactions.push(newTransaction);
            }
            renderTransactions();
            closeTransactionModal();
        });
        function renderTransactions() {
            const tableBody = document.getElementById('transactionTableBody');
            tableBody.innerHTML = '';
            transactions.forEach(transaction => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4">${transaction.clientName}</td>
                    <td class="px-6 py-4">${transaction.service}</td>
                    <td class="px-6 py-4">$${transaction.amount.toFixed(2)}</td>
                    <td class="px-6 py-4">${transaction.status}</td>
                    <td class="px-6 py-4">${new Date(transaction.date).toLocaleDateString()}</td>
                    <td class="px-6 py-4">
                        <button onclick="editTransaction(${transaction.id})" class="text-blue-600 hover:underline">Edit</button>
                        <button onclick="deleteTransaction(${transaction.id})" class="text-red-600 hover:underline ml-2">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });
        }
        function editTransaction(id) {
            currentEditingTransaction = transactions.find(t => t.id === id);
            document.getElementById('clientName').value = currentEditingTransaction.clientName;
            document.getElementById('service').value = currentEditingTransaction.service;
            document.getElementById('amount').value = currentEditingTransaction.amount;
            document.getElementById('transactionStatus').value = currentEditingTransaction.status;
            document.getElementById('transactionDate').value = currentEditingTransaction.date;
            openTransactionModal();
        }   
        function deleteTransaction(id) {
            transactions = transactions.filter(t => t.id !== id);
            renderTransactions();
        }
        // Initial render
        renderPillars();
        renderCalendar();
        renderTransactions();
        // Show default section
        showSection('dashboard');
    </script>
</body>
</html>