@extends('layout.navBar')
@section('title')
    Dream Home
@endsection
@section('search_bar')
    <div class="relative flex items-center space-x-2">
        <form method="get" action="{{route('show.search.home')}}">
            @csrf
            <input type="text" id="search" placeholder="Search..." name="search_name"
                class="px-4 py-2 rounded-full w-64 border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <input type="submit" value="Search"
                class="absolute right-1 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-2 rounded-full">
        </form>
    </div>
@endsection
@section('video')
    @yield('video')
@endsection
@section('posts')
    <!-- Grid Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Two Sections: My Posts & Other Posts -->
        <div class="grid grid-cols-1 gap-8">

            @if (Auth::user())
                <!-- My Posts Section -->
                @if (Auth::user()->posts->count())
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">My Posts</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            <!-- Card 1 -->
                            @foreach ($myPosts as $myPost)
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <img src="{{asset('../images/posts/' . $myPost->image)}}" alt="Post Image"
                                        class="w-full h-48 object-cover rounded-md mb-4">
                                    <h3 class="text-xl font-semibold">{{$myPost->title}}</h3>
                                    <p class="text-gray-600 mb-2">{{$myPost->description}}</p>
                                    <p class="text-gray-500 text-sm">{{$myPost->adress}}</p>
                                    <p class="text-blue-500 text-sm mb-2">For: {{$myPost->type}}</p>
                                    <p class="text-green-600 font-semibold">Price: ${{$myPost->price}}</p>
                                    <a href="{{route('view.post', $myPost->id)}}" class="text-blue-500 hover:underline mt-4 block">View
                                        Details</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif



                <!-- Other Posts Section -->
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Other Posts</h2>
            @endif
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Card 1 -->
                    @foreach ($posts as $post)
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <img src="{{asset('../images/posts/' . $post->image)}}" alt="Post Image"
                                class="w-full h-48 object-cover rounded-md mb-4">
                            <h3 class="text-xl font-semibold">{{$post->title}}</h3>
                            <p class="text-gray-600 mb-2">{{$post->description}}</p>
                            <p class="text-gray-500 text-sm">{{$post->adress}}</p>
                            <p class="text-blue-500 text-sm mb-2">For: {{$post->type}}</p>
                            <p class="text-green-600 font-semibold">Price: ${{$post->price}}</p>
                            <a href="{{route('view.post', $post->id)}}" class="text-blue-500 hover:underline mt-4 block">View
                                Details</a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection