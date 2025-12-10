@extends('layouts.dashboard')

@section('title', 'Show Adoptions: Larapets 🙀')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
    </svg>
    View Adoptions
</h1>

<div class="breadcrumbs text-sm text-white bg-[#0009] rounded-box px-4 py-2">
    <ul>
        <li>
            <a href="{{ url('dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M128,16a96.11,96.11,0,0,0-96,96c0,24,12.56,55.06,33.61,83,21.18,28.15,44.5,45,62.39,45s41.21-16.81,62.39-45c21.05-28,33.61-59,33.61-83A96.11,96.11,0,0,0,128,16Zm49.61,169.42C160.24,208.49,140.31,224,128,224s-32.24-15.51-49.61-38.58C59.65,160.5,48,132.37,48,112a80,80,0,0,1,160,0C208,132.37,196.35,160.5,177.61,185.42ZM120,136A40,40,0,0,0,80,96a16,16,0,0,0-16,16,40,40,0,0,0,40,40A16,16,0,0,0,120,136ZM80,112a24,24,0,0,1,24,24h0A24,24,0,0,1,80,112Zm96-16a40,40,0,0,0-40,40,16,16,0,0,0,16,16,40,40,0,0,0,40-40A16,16,0,0,0,176,96Zm-24,40a24,24,0,0,1,24-24A24,24,0,0,1,152,136Zm0,48a8,8,0,0,1-8,8H112a8,8,0,0,1,0-16h32A8,8,0,0,1,152,184Z"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('adoptions') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256"><path d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z"></path></svg>
                Adoptions Module
            </a>
        </li>
        <li>
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                </svg>
                Show Adoptions
            </span>
        </li>
    </ul>
</div>

{{-- Card --}}
@php
    $user = $adopt->user ?? null;
    $pet = $adopt->pet ?? null;
@endphp

<div class="bg-[#0009] p-8 rounded-sm">
    {{-- Two columns: user left, pet right --}}
    <div class="flex flex-col md:flex-row gap-4">
        {{-- Left column: User (all user fields) --}}
        <div class="md:w-1/2 bg-[#0008] p-4 rounded-md shadow-md text-white min-w-0">
            <div class="flex items-start gap-4">
                <div class="mask mask-squircle w-36 h-36 md:w-48 md:h-48 flex-shrink-0 overflow-hidden">
                    <img src="{{ asset('images/' . ($user->photo ?? 'no-image.png')) }}" alt="User" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="font-semibold text-lg truncate">{{ $user->fullname ?? 'Sin nombre' }}</h4>
                    <p class="text-sm text-[#fff9] truncate break-words">{{ $user->email ?? '' }}</p>
                </div>
            </div>

            <ul class="mt-4 space-y-2 text-sm text-[#fff9]">
                <li><span class="font-semibold">Document</span> <span class="float-right">{{ $user->document ?? '—' }}</span></li>
                <li><span class="font-semibold">FullName</span> <span class="float-right">{{ $user->fullname ?? '—' }}</span></li>
                <li><span class="font-semibold">Gender</span> <span class="float-right">{{ $user->gender ?? '—' }}</span></li>
                <li><span class="font-semibold">Birthdate</span> <span class="float-right">{{ $user->birthdate ?? '—' }}</span></li>
                <li><span class="font-semibold">Phone</span> <span class="float-right">{{ $user->phone ?? '—' }}</span></li>
                <li><span class="font-semibold">Email</span> <span class="float-right">{{ $user->email ?? '—' }}</span></li>
                <li>
                    <span class="font-semibold">Active</span>
                    <span class="float-right">@if($user && $user->active == 1)
                        <div class="badge badge-outline badge-success">Active</div>
                        @else
                        <div class="badge badge-outline badge-error">Inactive</div>
                        @endif
                    </span>
                </li>
                <li>
                    <span class="font-semibold">Role</span>
                    <span class="float-right">@if(isset($user->role) && $user->role == 'Administrator')
                        <div class="badge badge-outline badge-warning">Admin</div>
                        @elseif(isset($user->rol) && $user->rol == 'Administrator')
                        <div class="badge badge-outline badge-warning">Admin</div>
                        @else
                        <div class="badge badge-outline badge-default">Customer</div>
                        @endif
                    </span>
                </li>
                <li><span class="font-semibold">Create At::</span> <span class="float-right">{{ $user->created_at ?? '—' }}</span></li>
                <li><span class="font-semibold">Update At::</span> <span class="float-right">{{ $user->updated_at ?? '—' }}</span></li>
            </ul>
        </div>

        {{-- Right column: Pet (all pet fields) --}}
        <div class="md:w-1/2 bg-[#0008] p-4 rounded-md shadow-md text-white min-w-0">
            <div class="flex items-start gap-4 justify-end md:justify-start">
                <div class="mask mask-squircle w-36 h-36 md:w-48 md:h-48 flex-shrink-0 overflow-hidden">
                    <img src="{{ asset('images/' . ($pet->image ?? 'no-image.png')) }}" alt="Pet" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 text-right md:text-left min-w-0">
                    <h4 class="font-semibold text-lg truncate">{{ $pet->name ?? 'Sin nombre' }}</h4>
                    <p class="text-sm text-[#fff9] truncate break-words">{{ $pet->location ?? '' }}</p>
                </div>
            </div>

            <ul class="mt-4 space-y-2 text-sm text-[#fff9]">
                <li><span class="font-semibold">Kind</span> <span class="float-right">{{ $pet->kind ?? '—' }}</span></li>
                <li><span class="font-semibold">Breed</span> <span class="float-right">{{ $pet->breed ?? '—' }}</span></li>
                <li><span class="font-semibold">Age</span> <span class="float-right">{{ $pet->age ?? '—' }}</span></li>
                <li><span class="font-semibold">Weight</span> <span class="float-right">{{ $pet->weight ?? '—' }}</span></li>
                <li><span class="font-semibold">Location</span> <span class="float-right">{{ $pet->location ?? '—' }}</span></li>
                <li>
                    <span class="font-semibold">Active</span>
                    <span class="float-right">
                        @if($pet && $pet->active == 1)
                            <span class="badge badge-outline badge-success">Yes</span>
                        @else
                            <span class="badge badge-outline badge-error">No</span>
                        @endif
                    </span>
                </li>
                <li>
                    <span class="font-semibold">Status</span>
                    <span class="float-right">
                        @if($pet && $pet->status == 1)
                            <span class="badge badge-outline badge-error">Adopted</span>
                        @else
                            <span class="badge badge-outline badge-success">Available</span>
                        @endif
                    </span>
                </li>
                <li><span class="font-semibold">Created At</span> <span class="float-right">{{ $pet->created_at ?? '—' }}</span></li>
                <li><span class="font-semibold">Updated At</span> <span class="float-right">{{ $pet->updated_at ?? '—' }}</span></li>
                <li><span class="font-semibold">Descripcion</span> <span class="float-right">{{ $pet->description ?? '—' }}</span></li>
            </ul>
        </div>
    </div>
</div>
@endsection