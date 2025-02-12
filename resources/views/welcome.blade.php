@extends('layout.homeLayout')
@section('video')
<section class="relative h-screen flex items-center justify-center overflow-hidden">

    <video autoplay muted loop class="absolute w-full h-full object-cover z-0">
        <source src="{{asset('../videos/4770380-hd_1920_1080_30fps.mp4')}}" type="video/mp4">
        Your browser does not support the video tag.
    </video>



    <div class="relative z-10 text-center text-white px-6">
        <h1 class="text-7xl font-extrabold drop-shadow-lg">Find Your Dream Home</h1>
        <p class="text-2xl mt-4 drop-shadow-lg max-w-2xl mx-auto">Discover the perfect property for you with our expert
            real estate services.</p>
        <button
            class="get-started mt-6 px-8 py-4 rounded-full text-white font-semibold text-lg shadow-lg bg-[#5A7AF6] transition duration-300"><a
                href="{{route('login.user')}}">Get Started</a></button>
    </div>
</section>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Real Estate - Home</title>
    <link rel="shortcut icon" href="favicon.png" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow-md py-4">
      <div class="container mx-auto flex justify-between items-center px-4">
        <h1 class="text-2xl font-bold text-blue-600">Real Estate</h1>
        <nav>
          <ul class="flex space-x-6">
            <li><a href="#" class="text-gray-700 hover:text-blue-500">Home</a></li>
            <li><a href="#" class="text-gray-700 hover:text-blue-500">About</a></li>
            <li class="relative group">
              <a href="#" class="text-gray-700 hover:text-blue-500">Properties</a>
              <ul class="absolute left-0 mt-2 w-48 bg-white shadow-md rounded-md opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Residential</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Commercial</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Luxury</a></li>
              </ul>
            </li>
            <li><a href="#" class="text-gray-700 hover:text-blue-500">Contact</a></li>
          </ul>
        </nav>
      </div>
    </header>
    
    <main class="container mx-auto py-10 px-4">
      <section class="text-center">
        <h2 class="text-4xl font-bold text-gray-800">Find Your Dream Home</h2>
        <p class="mt-4 text-gray-600">Explore the best properties available in your area.</p>
      </section>
    </main>
  </body>
</html> --}}
