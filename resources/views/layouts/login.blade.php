<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - Sistem Inventaris')</title>
    <!-- Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">

    <!-- Header tetap di atas -->
    <header class="bg-blue-800 text-white py-3">
        <div class="container mx-auto px-4">
            <h1 class="text-lg font-bold text-center">Sistem Informasi Inventaris Barang</h1>
        </div>
    </header>

    <!-- Konten utama (form login) → ditempatkan di tengah secara vertikal & horizontal -->
    <main class="flex-grow flex items-center justify-center p-4">
        @yield('content')
    </main>

    <!-- Footer tetap di bawah -->
    <footer class="bg-gray-800 text-white py-3 text-center text-xs">
        <div class="container mx-auto px-4">
            <p>© 2025 Sistem Informasi Inventaris Barang.</p>
            <p>Instansi / Perusahaan Anda.</p>
        </div>
    </footer>

</body>
</html>