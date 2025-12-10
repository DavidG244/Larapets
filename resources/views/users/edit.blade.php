@extends('layouts.dashboard')

@section('title', 'Edit Users: Larapets 🙀')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
    </svg>
    Edit User
</h1>
{{-- Breadcrumbs --}}
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
                    <path d="M227.31,73.37,182.63,28.68a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31L227.31,96a16,16,0,0,0,0-22.63ZM92.69,208H48V163.31l88-88L180.69,120ZM192,108.68,147.31,64l24-24L216,84.68Z"></path>
                </svg>
                Edit User
            </span>
        </li>
    </ul>
</div>
<div class="w-full md:w-[720px] w-[320px] bg-[#0009] rounded-box p-6">
    <form method="POST" action="{{ url('users/' . $user->id) }}" class="flex flex-col md:flex-row gap-4 mt-4" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full md:w-[320px]">
            <div class="avatar flex flex-col cursor-pointer hover:scale-110 transition ease-in justify-center items-center">
                <div id="upload" class="mask mask-squircle w-48">
                    <img id="preview" src="{{ asset('images/'.$user->photo) }}" />
                </div>
                <small class="pb-0 border-white border-b flex items-center justify-center text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M208,40H48A24,24,0,0,0,24,64V176a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V64A24,24,0,0,0,208,40Zm8,136a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V64a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8Zm-48,48a8,8,0,0,1-8,8H96a8,8,0,0,1,0-16h64A8,8,0,0,1,168,224ZM157.66,106.34a8,8,0,0,1-11.32,11.32L136,107.31V152a8,8,0,0,1-16,0V107.31l-10.34,10.35a8,8,0,0,1-11.32-11.32l24-24a8,8,0,0,1,11.32,0Z"></path>
                    </svg>
                    Upload Photo
                </small>
                @error('photo')
                <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>
            <input type="file" id="photo" name="photo" class="hidden" accept="image/*">
            <input type="hidden" name="originphoto" value="{{ $user->photo }}">
        </div>
        <div class="w-full md:w-[320px]">
            {{-- Document --}}
            <label class="label text-white">Document</label>
            <input type="number" class="input bg-[#fff]" name="document" placeholder="123456789"
                value="{{ old('document', $user->document) }}" />
            @error('document')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror

            {{-- Fullname --}}
            <label class="label text-white">Full Name</label>
            <input type="text" class="input bg-[#fff]" name="fullname" placeholder="Jeremias Springfield"
                value="{{ old('fullname', $user->fullname) }}" />
            @error('fullname')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror

            {{-- Gender --}}
            <label class="label text-white">Gender</label>
            <select name="gender" class="select bg-[#fff] outline-0">
                <option value="">Select...</option>
                <option value="Female" @if (old('gender', $user->gender)=='Female' ) selected @endif>Female</option>
                <option value="Male" @if (old('gender', $user->gender)=='Male' ) selected @endif>Male</option>
            </select>
            @error('gender')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror

            
        </div>

        <div class="w-full md:w-[320px]">
            {{-- Birthdate --}}
            <label class="label text-white">Birthdate</label>
            <input type="date" class="input bg-[#fff]" name="birthdate" placeholder="1983-06-16"
                value="{{ old('birthdate', $user->birthdate) }}" />
            @error('birthdate')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror
            {{-- phone --}}
            <label class="label text-white">Phone</label>
            <input type="number" class="input bg-[#fff]" name="phone" placeholder="3204456321"
                value="{{ old('phone', $user->phone) }}" />
            @error('phone')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror

            <label class="label text-white">Email</label>
            <input type="text" class="input bg-[#fff]" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" />
            @error('email')
            <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
            @enderror

            <button class="btn btn-outline text-white hover:text-black mt-4 w-full">Edit</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#upload').click(function(e) {
            e.preventDefault();
            $('#photo').click();
        });

        $('#photo').change(function(e) {
            e.preventDefault();
            $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]));
        });
    });
</script>
@endsection