@extends('layouts.dashboard')

@section('title', 'Confirm Adoption: Larapets 🐶')

@section('content')

<div class="mb-6">
    <a href="{{ url('makeadoption') }}" class="text-white hover:text-blue-400">
        ← Back to available pets
    </a>
</div>

<h1 class="text-4xl text-white mb-6 flex gap-2 items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
        <path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path>
    </svg>
    Confirm Adoption
</h1>

@if(!$pet)
<div class="alert alert-error text-white">
    <span>Pet not found.</span>
</div>
@else
<div class="bg-[#0009] p-8 rounded-lg">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Pet Image -->
        <div class="md:w-1/2 flex flex-col items-center">
            <div class="w-64 h-64 rounded-lg overflow-hidden bg-[#000]">
                <img src="{{ asset('images/' . ($pet->image ?? 'no-image.png')) }}" 
                     alt="{{ $pet->name }}" 
                     class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Pet Info -->
        <div class="md:w-1/2 text-white min-w-0">
            <h2 class="text-3xl font-bold mb-4 break-words">{{ $pet->name }}</h2>
            
            <div class="bg-[#0008] p-4 rounded-md mb-6 space-y-3 text-sm">
                <p><span class="font-semibold">Kind:</span> <span class="break-words">{{ $pet->kind ?? '—' }}</span></p>
                <p><span class="font-semibold">Breed:</span> <span class="break-words">{{ $pet->breed ?? '—' }}</span></p>
                <p><span class="font-semibold">Age:</span> <span class="break-words">{{ $pet->age ?? '—' }} years</span></p>
                <p><span class="font-semibold">Weight:</span> <span class="break-words">{{ $pet->weight ?? '—' }} kg</span></p>
                <p><span class="font-semibold">Location:</span> <span class="break-words">{{ $pet->location ?? '—' }}</span></p>
                <p><span class="font-semibold">Status:</span> 
                    @if($pet->status == 1)
                        <span class="badge badge-error">Adopted</span>
                    @else
                        <span class="badge badge-success">Available</span>
                    @endif
                </p>
            </div>

            @if($pet->description)
            <div class="bg-[#0008] p-4 rounded-md mb-6 min-w-0">
                <p class="font-semibold mb-2">Description:</p>
                <p class="text-sm break-words whitespace-normal">{{ $pet->description }}</p>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="flex gap-3">
                @if($pet->status == 1)
                    <div class="alert alert-warning w-full">
                        <span>This pet has already been adopted.</span>
                    </div>
                @else
                    <form method="POST" action="{{ url('makeadoption/' . $pet->id) }}" class="flex gap-3 w-full">
                        @csrf
                        <button type="submit" class="btn btn-success flex-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor" viewBox="0 0 256 256">
                                <path d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z"></path>
                            </svg>
                            Confirm Adoption
                        </button>
                        <a href="{{ url('makeadoption') }}" class="btn btn-ghost">Cancel</a>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@endsection
