@extends('layouts.dashboard')

@section('title', 'Add Pet: Larapets 🐶')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm48-88a8,8,0,0,1-8,8H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32A8,8,0,0,1,176,128Z"></path>
    </svg>
    Add Pet
</h1>

<div class="breadcrumbs text-sm text-white bg-[#0009] rounded-box px-4 py-2">
    <ul>
        <li>
            <a href="{{ url('dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ url('pets') }}">Pets Module</a>
        </li>
        <li>
            <span class="inline-flex items-center gap-2">Add Pet</span>
        </li>
    </ul>
</div>

<div class="w-full md:w-[720px] w-[320px] bg-[#0009] rounded-box p-6">
    <form method="POST" action="{{ url('pets') }}" class="flex flex-col md:flex-row gap-4 mt-4" enctype="multipart/form-data">
        @csrf
        <div class="w-full md:w-[320px]">
            <div class="avatar flex flex-col cursor-pointer hover:scale-110 transition ease-in justify-center items-center">
                <div id="upload" class="mask mask-squircle w-48">
                    <img id="preview" src="{{ asset('images/no-image.png') }}" />
                </div>
                <small class="pb-0 border-white border-b flex items-center justify-center text-white">Upload Image</small>
                @error('image')
                <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small>
                @enderror
            </div>
            <input type="file" id="image" name="image" class="hidden" accept="image/*">
        </div>

        <div class="w-full md:w-[320px]">
            <label class="label text-white">Name</label>
            <input type="text" class="input bg-[#fff]" name="name" placeholder="Buddy" value="{{ old('name') }}" />
            @error('name') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

            <label class="label text-white">Kind</label>
            @if(isset($kinds) && $kinds->isNotEmpty())
                <select id="kind_select" name="kind" class="select select-bordered w-full bg-[#fff]">
                    <option value="">-- Select kind --</option>
                    @foreach($kinds as $k)
                    <option value="{{ $k }}" {{ old('kind') == $k ? 'selected' : '' }}>{{ $k }}</option>
                    @endforeach
                    <option value="Other" {{ old('kind') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                <input type="text" id="kind_other" name="kind_other" class="input bg-[#fff] mt-2" placeholder="Enter kind" value="{{ old('kind_other') }}" style="display: {{ old('kind') == 'Other' ? 'block' : 'none' }}" />
                @error('kind_other') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror
            @else
                <input type="text" class="input bg-[#fff]" name="kind" placeholder="Dog" value="{{ old('kind') }}" />
            @endif
            @error('kind') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

            <label class="label text-white">Breed</label>
            <input type="text" class="input bg-[#fff]" name="breed" placeholder="Labrador" value="{{ old('breed') }}" />
            @error('breed') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

            <label class="label text-white">Age</label>
            <input type="number" class="input bg-[#fff]" name="age" placeholder="3" value="{{ old('age') }}" />
            @error('age') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror
        </div>

        <div class="w-full md:w-[320px]">
            <label class="label text-white">Weight (kg)</label>
            <input type="number" step="0.1" class="input bg-[#fff]" name="weight" placeholder="12.5" value="{{ old('weight') }}" />
            @error('weight') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

            <label class="label text-white">Location</label>
            <input type="text" class="input bg-[#fff]" name="location" placeholder="City, Country" value="{{ old('location') }}" />
            @error('location') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

            <label class="label text-white">Description</label>
            <textarea name="description" class="textarea bg-[#fff]" rows="3">{{ old('description') }}</textarea>
            @error('description') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror
            

            <button class="btn btn-outline btn-success hover:text-white mt-4 w-full">Register Pet</button>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#upload').click(function(e) {
            e.preventDefault();
            $('#image').click();
        });

        $('#image').change(function(e) {
            e.preventDefault();
            $('#preview').attr('src', window.URL.createObjectURL($(this).prop('files')[0]));
        });
        // Toggle Other inputs
        $('#kind_select').on('change', function(){
            if ($(this).val() === 'Other') {
                $('#kind_other').show();
            } else {
                $('#kind_other').hide();
            }
        });
        // breed is a free text input now
    });
</script>
@endsection