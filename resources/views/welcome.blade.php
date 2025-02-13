@extends('layout.homeLayout')

 @section('video')
  <section class="relative h-screen flex items-center justify-center overflow-hidden">
      <!-- Video Background -->
      <video autoplay muted loop class="absolute w-full h-full object-cover z-0">
          <source src="{{asset('../videos/4770380-hd_1920_1080_30fps.mp4')}}" type="video/mp4">
          Your browser does not support the video tag.
      </video>
  
      <!-- Overlay Content -->
      <div class="relative z-10 text-center text-white px-6">
          <!-- Heading and Subheading Above Search Bar -->
          <h1 class="text-6xl md:text-7xl font-extrabold drop-shadow-lg">Find Your Dream Home</h1>
          <p class="text-xl md:text-2xl mt-4 drop-shadow-lg max-w-2xl mx-auto">
              Discover the perfect property for you with our expert real estate services.
          </p>
  
          <!-- Search Bar Positioned Below the Text -->
          <div class="mt-8 flex justify-center items-center space-x-2">
              <form method="get" action="{{route('show.search.home')}}" class="flex items-center space-x-2">
                  @csrf
                  <input type="text" id="search" name="search_name" placeholder="Your ZIP code or City. e.g. New York"
                      class="w-72 md:w-96 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary text-gray-800">
                  <button type="submit" class="bg-gray-800 text-white rounded-full px-6 py-2 hover:bg-blue-700 transition duration-300 ">
                      Search
                  </button>
              </form>
          </div>
          <!-- Get Started Button Below Search Bar with Shake Animation -->
          <button
              class="get-started mt-6 px-8 py-4 rounded-full text-white font-semibold text-lg shadow-lg bg-[#3052dc] transition duration-300 relative hover:animate-shake">
              <a href="{{route('login.user')}}">Get Started</a>
          </button>
      </div>
  </section>
  @endsection
  