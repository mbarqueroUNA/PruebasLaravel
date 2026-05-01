<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UniGest</title>

    {{-- Tailwind vía CDN (SIMPLE y seguro) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    {{-- Barra de navegación --}}
    <nav class="bg-blue-800 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <span class="font-bold">UniGest</span>

            <div class="space-x-4">
                <a href="/" class="hover:underline">Inicio</a>
                <a href="/courses" class="hover:underline">Cursos</a>
            </div>
        </div>
    </nav>

    {{-- Contenido --}}
    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

</body>
</html>
