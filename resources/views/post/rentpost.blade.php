@extends('layout.navBar')
@section('title')
  Rent
@endsection

@section('search_bar')
  <div class="relative flex items-center space-x-2">
    <form method="get" action="{{route('show.search.rent')}}">
    @csrf
    <input type="text" id="search" placeholder="Search..." name="search_name"
      class="px-4 py-2 rounded-full w-64 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
    <input type="submit" value="Search"
      class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded-full">
    </form>
  </div>
@endsection

@section('posts')
  <!-- Main Container -->
  <div class="container mx-auto px-4 py-8">

    <!-- Page Title -->

    <!-- Two Sections: My Posts & Other Posts -->
    <div class="grid grid-cols-1 gap-8">

    @if (Auth::user())
    <!-- My Posts Section -->
    <div>
      <h2 class="text-2xl font-semibold mb-4">My Properties</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card 1 -->
    @foreach ($myPosts as $myPost)
    <div class="flex-shrink-0 w-[calc(100vw-4rem)] md:w-80 lg:w-[22rem] xl:w-[26rem] ml-4 bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl hover:scale-105 transform">
        <!-- Card Content -->
        <a href="{{ route('view.post', $myPost->id) }}" class="block">
            <img src="{{ asset('../images/posts/' . $myPost->image) }}" alt="Post Image"
                class="w-full h-64 object-cover rounded-t-lg">
        </a>
        <div class="p-6">
            <!-- Price -->
            <div class="text-2xl font-bold text-gray-900 mb-2">
                ${{ $myPost->price }}
            </div>

            <!-- Description and Title -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $myPost->title }}</h3>
                <p class="text-gray-600 text-sm mt-2">
                    {{ $myPost->address }}
                </p>
            </div>

            <!-- Property Details -->
            <div class="flex items-center space-x-4 mb-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span>{{$myPost->beds}} beds</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span>{{$myPost->baths}} baths</span>
                </div>
            </div>

            <!-- View Details Button -->
            <a href="{{ route('view.post', $myPost->id) }}"
                class="inline-block mt-4 px-4 py-2 bg-blue-600 w-full text-white rounded-full hover:bg-blue-700 transition duration-300 text-center">
                View Details
            </a>
        </div>
    </div>
@endforeach
      </div>
    </div>


    <!-- Other Posts Section -->
    <div>
      <h2 class="text-2xl font-semibold mb-4">Other Properties</h2>
    @endif
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card 1 -->
    @foreach ($posts as $post)
    <div class="flex-shrink-0 w-[calc(100vw-4rem)] md:w-80 lg:w-[22rem] xl:w-[26rem] ml-4 bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-xl hover:scale-105 transform">
        <!-- Card Content -->
        <a href="{{ route('view.post', $post->id) }}" class="block">
            <img src="{{ asset('../images/posts/' . $post->image) }}" alt="Post Image"
                class="w-full h-64 object-cover rounded-t-lg">
        </a>
        <div class="p-6">
            <!-- Price -->
            <div class="text-2xl font-bold text-gray-900 mb-2">
                ${{ $post->price }}
            </div>

            <!-- Description and Title -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $post->title }}</h3>
                <p class="text-gray-600 text-sm mt-2">
                    {{ $post->address }}
                </p>
            </div>

            <!-- Property Details -->
            <div class="flex items-center space-x-4 mb-4 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span>{{$post->beds}} beds</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span>{{$post->baths}} baths</span>
                </div>
            </div>

            <!-- View Details Button -->
            <a href="{{ route('view.post', $post->id) }}"
                class="inline-block mt-4 px-4 py-2 bg-blue-600 w-full text-white rounded-full hover:bg-blue-700 transition duration-300 text-center">
                View Details
            </a>
        </div>
    </div>
@endforeach
      </div>
    </div>

    </div>
  </div>

@endsection