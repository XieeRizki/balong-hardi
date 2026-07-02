<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Balong Hardi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-secondary to-dark text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md">
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-8 border border-white border-opacity-20 shadow-2xl">
                <div class="text-center mb-8">
                    <h1 class="text-4xl font-bold mb-2">Balong Hardi</h1>
                    <p class="text-gray-300">Admin Panel Login</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-500 bg-opacity-20 border border-red-500 rounded-lg">
                        <p class="text-red-200">{{ $errors->first() }}</p>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-bold mb-2">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-30 rounded-lg focus:outline-none focus:border-white focus:border-opacity-100 text-white placeholder-gray-400" 
                            placeholder="admin@balong-hardi.com"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-bold mb-2">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="w-full px-4 py-3 bg-white bg-opacity-10 border border-white border-opacity-30 rounded-lg focus:outline-none focus:border-white focus:border-opacity-100 text-white placeholder-gray-400" 
                            placeholder="••••••••"
                            required
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg transition-all duration-300 shadow-lg"
                    >
                        Login
                    </button>
                </form>

                <div class="mt-8 p-4 bg-blue-500 bg-opacity-10 border border-blue-500 rounded-lg">
                    <p class="text-sm text-blue-200">
                        <strong>Demo Account:</strong><br>
                        Email: admin@balong-hardi.com<br>
                        Password: password
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>