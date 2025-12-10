@extends('layouts.dashboard')

@section('title', 'Show User: Larapets 🙀')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
    </svg>
    Show User
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
            <a href="{{ url('users') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z">
                    </path>
                </svg>
                Users Module
            </a>
        </li>
        <li>
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                </svg>
                Show User
            </span>
        </li>
    </ul>
</div>

{{-- Card --}}
<div class="bg-[#0009] p-10 rounded-sm">
    {{-- Photo --}}
    <div class="avatar flex flex-col cursor-pointer hover:scale-110 transition ease-in justify-center items-center">
        <div class="mask mask-squircle w-60">
            <img src="{{ asset('images/' . $user->photo) }}" alt="">
        </div>
    </div>
    {{-- Data --}}
    <div class="flex gap-2 flex-col md:flex-row">
        <ul class="list bg-[#0009] mt-4 text-white  rounded-box shadow-md">
            <li class="list-row">
                <span class="font-semibold">Document</span><span class="text-[#fff9]">{{ $user->document }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">FullName</span><span class="text-[#fff9]">{{ $user->fullname }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Gender</span><span class="text-[#fff9]">{{ $user->gender }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Birthdate</span><span class="text-[#fff9]">{{ $user->birthdate }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Phone</span><span class="text-[#fff9]">{{ $user->phone }}</span>
            </li>
        </ul>
        <ul class="list bg-[#0009] mt-4 text-white rounded-box shadow-md">
            <li class="list-row">
                <span class="font-semibold">Email</span><span class="text-[#fff9]">{{ $user->email }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Active</span>
                <span class="text-[#fff9]"> @if ($user->active == 1)
                    <div class="badge badge-outline badge-success">Active</div>
                    @else
                    <div class="badge badge-outline badge-error">Inactive</div>
                    @endif
                </span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Role</span><span class="text-[#fff9]"> @if ($user->role == 'Administrator')
                    <div class="badge badge-outline badge-warning">Admin</div>
                    @else
                    <div class="badge badge-outline badge-default">Customer</div>
                    @endif
                </span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Create At::</span><span class="text-[#fff9]">{{ $user->created_at }}</span>
            </li>
            <li class="list-row">
                <span class="font-semibold">Update At::</span><span class="text-[#fff9]">{{ $user->updated_at }}</span>
            </li>
        </ul>
    </div>
</div>
@endsection