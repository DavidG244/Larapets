@extends('layouts.home')

@section('title', 'Welcome: Larapets 🐶')

@section('content')
<section class="bg-[#0006] w-96 p-8 flex flex-col gap-4 items-center justify-center rounded-lg shadow-lg outline-2">
    <img src="{{ asset('images/ñema.png') }}" width="260px" alt="logo">
    <p class="text-black">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis id veniam officia facere soluta eum! Eaque, quae? Magni perferendis, consectetur libero ea sequi minima dolor soluta asperiores similique odio laboriosam
    </p>
    <div class="flex gap-2 mt-8 text-white">
        @guest()
        <a class="btn btn-outline w-[160] border " href="{{ url('login') }}"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" viewBox="0 0 256 256"><path d="M141.66,133.66l-40,40a8,8,0,0,1-11.32-11.32L116.69,136H24a8,8,0,0,1,0-16h92.69L90.34,93.66a8,8,0,0,1,11.32-11.32l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z"></path></svg>
            Login
        </a>
        <a class="btn btn-outline w-[160] border " href="{{ url('register') }}"> 
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256"><path d="M168,56a8,8,0,0,1,8-8h16V32a8,8,0,0,1,16,0V48h16a8,8,0,0,1,0,16H208V80a8,8,0,0,1-16,0V64H176A8,8,0,0,1,168,56Zm62.56,54.68a103.92,103.92,0,1,1-85.24-85.24,8,8,0,0,1-2.64,15.78A88.07,88.07,0,0,0,40,128a87.62,87.62,0,0,0,22.24,58.41A79.66,79.66,0,0,1,98.3,157.66a48,48,0,1,1,59.4,0,79.66,79.66,0,0,1,36.06,28.75A87.62,87.62,0,0,0,216,128a88.85,88.85,0,0,0-1.22-14.68,8,8,0,1,1,15.78-2.64ZM128,152a32,32,0,1,0-32-32A32,32,0,0,0,128,152Zm0,64a87.57,87.57,0,0,0,53.92-18.5,64,64,0,0,0-107.84,0A87.57,87.57,0,0,0,128,216Z"></path></svg>
            Register
        </a>
        @endguest
        @auth()
        <a class="btn btn-outline" href="{{ url('dashboard') }}">
            Dashboard
        </a>
        @endauth
    </div>
</section>
@endsection