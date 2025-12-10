<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <!-- Tailwind CDN for quick styling improvements (keeps functionality intact) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>List All Pets 🐶</title>
</head>

<body class="bg-teal-900 min-h-[100dvh]">
    <div class="container mx-auto p-8">
        <header class="text-center mb-6">
            <h1 class="text-white text-4xl font-semibold">List All Pets 🐶</h1>
            <p class="text-teal-100 mt-2">Encuentra tu nuevo amigo — filtrado por especie y detalles rápidos.</p>
        </header>

    <section class="p-4 grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 items-stretch">
            @forelse ($pets as $pet)
            <article class="w-full bg-base-100 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow duration-200 h-full">
                <div class="flex h-full flex-col sm:flex-row">
                    <figure class="w-full sm:w-40 h-52 sm:h-auto bg-gray-100 flex-shrink-0">
                        <img
                            class="object-cover w-full h-full"
                            src="{{ asset('images/'.$pet->image) }}"
                            alt="{{ $pet->name }}"
                            data-placeholder="{{ asset('images/placeholder.png') }}"
                            onerror="this.src=this.dataset.placeholder;" />
                    </figure>

                    <div class="card-body p-4 flex-1 flex flex-col justify-between">
                        <h2 class="card-title text-lg">{{ $pet->name }}</h2>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if ($pet->kind == 'Dog')
                            <div class="badge badge-soft badge-accent">Dog</div>
                            @elseif ($pet->kind == 'Cat')
                            <div class="badge badge-soft badge-info">Cat</div>
                            @elseif ($pet->kind == 'Pig')
                            <div class="badge badge-soft badge-secondary">Pig</div>
                            @elseif ($pet->kind == 'Bird')
                            <div class="badge badge-soft badge-warning">Bird</div>
                            @elseif ($pet->kind == 'Fish')
                            <div class="badge badge-soft badge-error">Fish</div>
                            @elseif ($pet->kind == 'Parrot')
                            <div class="badge badge-soft badge-success">Parrot</div>
                            @endif
                        </div>

                        <p class="text-gray-700 text-sm mt-3 max-h-14 overflow-hidden">{{ $pet->description }}</p>

                        <div class="card-actions justify-end mt-4">
                            <a title="Ver {{ $pet->name }}" aria-label="Ver {{ $pet->name }}" class="inline-flex items-center gap-2 btn bg-teal-700 rounded-full hover:scale-105 transform transition-all px-3 py-2" href="{{ url('view/pet/'.$pet->id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" viewBox="0 0 256 256" aria-hidden="true">
                                    <path d="M152,112a8,8,0,0,1-8,8H120v24a8,8,0,0,1-16,0V120H80a8,8,0,0,1,0-16h24V80a8,8,0,0,1,16,0v24h24A8,8,0,0,1,152,112Zm77.66,117.66a8,8,0,0,1-11.32,0l-50.06-50.07a88.11,88.11,0,1,1,11.31-11.31l50.07,50.06A8,8,0,0,1,229.66,229.66ZM112,184a72,72,0,1,0-72-72A72.08,72.08,0,0,0,112,184Z"></path>
                                </svg>
                                <span class="text-white text-sm">Ver</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center text-white py-10">
                <p>No hay mascotas para mostrar.</p>
            </div>
            @endforelse
        </section>
    </div>
</body>

</html>