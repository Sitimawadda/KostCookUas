<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - KostCook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts + Tailwind CSS CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff8f0;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 bg-white rounded-2xl shadow-lg">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-orange-500">KostCook</h1>
            <p class="text-gray-500 mt-1">Login untuk masuk ke dapur kreatifmu 🍳</p>
        </div>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-sm text-red-600 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-2 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            <div class="flex items-center mb-4">
                <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-400">
                <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
            </div>


            <button type="submit"
                    class="w-full px-4 py-2 font-semibold text-white bg-orange-500 rounded-lg hover:bg-orange-600 transition">
                Masuk
            </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-orange-500 font-medium hover:underline">Daftar di sini</a>
        </p>
    </div>
</body>
</html>
