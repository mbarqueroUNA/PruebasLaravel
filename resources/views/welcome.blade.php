<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'UniGest') }}</title>

    <!-- Tailwind CSS vía CDN (simple y estable) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-md text-center">
        <h1 class="text-3xl font-bold mb-4">UniGest</h1>
        <p class="text-gray-600 mb-6">
            Sistema de Gestión Universitaria 4/5 12:47
        </p>

        @if (Route::has('login'))
            <div class="space-y-3">
                <a href="{{ route('login') }}"
                   class="block w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="block w-full bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                        Registrarse
                    </a>
                @endif
            </div>
        @endif
    </div>

</body>
</html>