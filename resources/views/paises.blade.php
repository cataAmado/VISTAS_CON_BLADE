<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Sitio Web con Tailwind CSS</title>
    <!-- Agrega el enlace al archivo CSS de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-blue-500 p-4 text-white">
        <nav class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">Logo</a>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:underline">Inicio</a></li>
                <li><a href="#" class="hover:underline">Acerca de</a></li>
                <li><a href="#" class="hover:underline">Servicios</a></li>
                <li><a href="#" class="hover:underline">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto p-4">
        @isset($paises)
<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">País</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Capital</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moneda</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Población</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">

           <!-- calcular tabla -->
            @php
$ordenarPor = $ordenar_por;
$orden = $orden;
$paises = collect($paises)->sortBy($ordenarPor, SORT_REGULAR, $orden === 'asc')->take($registros_a_mostrar);
@endphp

@foreach ($paises as $nombre => $pais)
    @if ($pais['poblacion'] >= $poblacion_minima)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $nombre }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $pais['capital'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $pais['moneda'] }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                {{ number_format($pais['poblacion'] / 1000, 3, '.', "'") }} millones
            </td>
            <td class="px-6 py-4">{{ $pais['descripcion'] }}</td>
        </tr>
    @endif
@endforeach

        </tbody>
    </table>
</div>
@endisset
    </main>

    <footer class="bg-gray-200 p-4 text-center">
        <p>&copy; 2023 Tu Compañía. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
