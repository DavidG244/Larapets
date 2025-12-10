@extends('layouts.dashboard')

@section('title', 'My Profile: Larapets 🙀')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
    My Profile
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
            <span class="inline-flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120ZM68.67,208A64.36,64.36,0,0,1,87.8,182.2a64,64,0,0,1,80.4,0A64.36,64.36,0,0,1,187.33,208ZM208,208h-3.67a79.9,79.9,0,0,0-46.68-50.29,48,48,0,1,0-59.3,0A79.9,79.9,0,0,0,51.67,208H48V48H208V208Z"></path></svg>
                My Profile
            </span>
        </li>
    </ul>
</div>
<div class="w-full md:w-[720px] w-[320px] bg-[#0009] rounded-box p-6">
    <form method="POST" action="{{ url('myprofile/' . $user->id) }}" class="flex flex-col md:flex-row gap-4 mt-4" enctype="multipart/form-data">
        @csrf
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

        // Modal
        const modal_message = document.getElementById('modal_message')
        @if (session('message'))
            modal_message.showModal();
        @endif
    });
    $(document).ready(function() {
        // Modal
        const modal_error = document.getElementById('modal_error')
        @if (session('error'))
            modal_error.showModal();
        @endif
    });
</script>
@endsection

<dialog id="modal_error" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Sorry!</h3>
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
<dialog id="modal_message" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Congratulations!</h3>
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>