<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Tailwind Test</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-10 text-center max-w-lg">
        
        <h1 class="text-4xl font-extrabold text-blue-600 mb-4">
            Tailwind Berhasil!
        </h1>

        <p class="text-gray-700 text-lg mb-6">
            Jika tampilan halaman ini berwarna biru, putih, dan mempunyai jarak rapi,
            berarti Tailwind CSS sudah aktif.
        </p>

        <a href="#"
           class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
            Mulai Eksplorasi
        </a>
    </div>

</body>
</html>
