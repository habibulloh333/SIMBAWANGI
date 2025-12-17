<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIMBAWANGI')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="p-6 text-xl font-bold border-b border-gray-700">
            SIMBAWANGI
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 rounded-lg
               {{ request()->routeIs('dashboard') ? 'bg-gray-800 font-semibold' : 'hover:bg-gray-800' }}">
                Dashboard
            </a>

            <a href="{{ route('items.index') }}"
               class="block px-4 py-2 rounded-lg
               {{ request()->routeIs('items.*') ? 'bg-gray-800 font-semibold' : 'hover:bg-gray-800' }}">
                Barang
            </a>

            <a href="{{ route('kategori-barang.index') }}"
                class="block px-4 py-2 rounded-lg {{ request()->routeIs('kategori-barang.*') ? 'bg-gray-800 font-semibold' : 'hover:bg-gray-800' }}">
                Kategori Barang
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.index') }}"
                   class="block px-4 py-2 rounded-lg
                   {{ request()->routeIs('users.*') ? 'bg-gray-800 font-semibold' : 'hover:bg-gray-800' }}">
                    Manajemen User
                </a>
            @endif

            <a href="{{ route('reports.index') }}"
               class="block px-4 py-2 rounded-lg
               {{ request()->routeIs('reports.*') ? 'bg-gray-800 font-semibold' : 'hover:bg-gray-800' }}">
                Laporan
            </a>
        </nav>

        <div class="p-4 border-t border-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full text-left px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>
</body>
</html>
