<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<style>
    .auth-bg {
        height: 100%;
        width: 100%;
        background-image: url('{{ asset('assets/invest.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>

<body class="auth-bg">
    <div class="min-h-screen flex items-center justify-center bg-primary/50 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion</h2>

            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700">Email ou Téléphone</label>
                    <input type="text" name="login" id="login" value="{{ old('login') }}" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('login')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" name="password" id="password" required
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-300">
                    Connexion
                </button>
            </form>
        </div>
    </div>




</body>

</html>
