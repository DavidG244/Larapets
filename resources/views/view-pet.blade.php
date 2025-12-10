<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perfil de Mascota</title>
</head>
<body class="bg-gradient-to-br from-teal-900 to-teal-600 min-h-screen flex items-center justify-center">
    <div class="max-w-xl w-full bg-white rounded-2xl shadow-2xl p-8 flex flex-col items-center">
        <figure class="w-40 h-40 rounded-full overflow-hidden border-4 border-teal-700 shadow-lg mb-6">
            <img src="{{ asset('images/'.$pet->image) }}" alt="{{ $pet->name }}" class="object-cover w-full h-full" data-placeholder="{{ asset('images/placeholder.png') }}" onerror="this.src=this.dataset.placeholder;" />
        </figure>
        <h1 class="text-3xl font-bold text-teal-800 mb-2">{{ $pet->name }}</h1>
        <div class="flex gap-3 mb-4">
            <span class="badge badge-lg {{
                $pet->kind == 'Dog' ? 'badge-accent' :
                ($pet->kind == 'Cat' ? 'badge-info' :
                ($pet->kind == 'Pig' ? 'badge-secondary' :
                ($pet->kind == 'Bird' ? 'badge-warning' :
                ($pet->kind == 'Fish' ? 'badge-error' :
                ($pet->kind == 'Parrot' ? 'badge-success' : 'badge-outline')))))
            }}">{{ $pet->kind }}</span>
            <span class="badge badge-outline badge-lg">Edad: {{ $pet->age }} años</span>
            <span class="badge badge-outline badge-lg">Peso: {{ $pet->weight }} kg</span>
        </div>
        <p class="text-gray-700 text-center mb-6">{{ $pet->description }}</p>
        <div class="w-full flex flex-col gap-2 text-sm text-gray-600">
            <div><span class="font-semibold text-teal-700">Raza:</span> {{ $pet->breed }}</div>
            <div><span class="font-semibold text-teal-700">Ubicación:</span> {{ $pet->location }}</div>
            <div><span class="font-semibold text-teal-700">Activo:</span> <span class="{{ $pet->active ? 'text-green-600' : 'text-red-600' }} font-bold">{{ $pet->active ? 'Sí' : 'No' }}</span></div>
            <div><span class="font-semibold text-teal-700">Adoptado:</span> <span class="{{ $pet->status ? 'text-green-600' : 'text-yellow-600' }} font-bold">{{ $pet->status ? 'Sí' : 'No' }}</span></div>
            <div><span class="font-semibold text-teal-700">Fecha de ingreso:</span> {{ $pet->created_at ? $pet->created_at->format('d/m/Y') : 'N/A' }}</div>
        </div>
        <a href="{{ url('view/pets') }}" class="mt-8 btn btn-outline btn-accent">&larr; Volver al listado</a>
    </div>
</body>
</html>
