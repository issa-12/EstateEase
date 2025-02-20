
@extends('layout.navbar')

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
      <button type="submit"
        class="bg-gray-800 text-white rounded-full px-6 py-2 hover:bg-blue-700 transition duration-300 ">
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

@section('content')
  <div class="pt-16">
    <div class="container mx-auto px-4">
    <!-- Heading Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4 md:mb-0">
      Popular Properties
      </h2>
      <a href="#"
      class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
      View all properties
      </a>
    </div>

    <!-- Carousel Container -->
    <div class="relative group">
      <!-- Carousel Items -->
      <div class="overflow-x-auto pb-4 scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none"
      id="carousel">
      <div class="flex gap-4">
        <!-- Property Items -->
        @foreach ($posts as $post)
      <div class="flex-shrink-0 w-[calc(100vw-4rem)] md:w-72 lg:w-80 ml-4">
      <div
        class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-200 hover:shadow-lg h-full">
        <!-- Card Content -->
        <div
        class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300">
        <a href="property-single.html" class="block">
        <img src="{{asset('../images/posts/' . $post->image)}}" alt="Post Image"
        class="w-full h-48 object-cover">
        </a>
        <div class="p-4 md:p-6">
        <div class="text-xl font-bold text-gray-900 mb-2"> ${{$post->price}}</div>
        <div class="mb-4">
        <p class="text-gray-600 text-sm mb-2">{{ $post->address }}</p>
        <p class="text-gray-800 font-medium">{{$post->title}}</p>
        {{-- <p class="text-blue-500 text-sm mb-2">For: {{$post->type}}</p> --}}

        </div>
        <div class="flex items-center space-x-4 mb-4">
        <div class="flex items-center text-gray-600">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
          </path>
          </svg>
          <span>{{$post->beds}} beds</span>
        </div>
        <div class="flex items-center text-gray-600">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
          </path>
          </svg>
          <span>{{$post->baths}} baths</span>
        </div>
        </div>
        <a href="{{route('view.post', $post->id)}}"
        class="inline-block mt-4 px-4 py-2 bg-[#010404]  w-full text-white rounded-full hover:bg-blue-700 transition duration-300 text-center">
        View Details
        </a>
        </div>
        </div>
      </div>
      </div>
    @endforeach

      </div>
      </div>
      <style>
      .scrollbar-hide::-webkit-scrollbar {
        display: none;
      }
      </style>
      <!-- Carousel Controls -->
      <div class="mt-6 flex justify-center gap-4">
      <button onclick="scrollPrev()"
        class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-colors duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button onclick="scrollNext()"
        class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-colors duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </button>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center space-x-2 mt-6" id="pagination">
      <button class="pagination-dot w-3 h-3 rounded-full bg-blue-600" data-index="0"></button>
      <button class="pagination-dot w-3 h-3 rounded-full bg-gray-300" data-index="1"></button>
      <button class="pagination-dot w-3 h-3 rounded-full bg-gray-300" data-index="2"></button>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
      const carousel = document.querySelector('#carousel');
      const cards = carousel.querySelectorAll('.flex-shrink-0');
      const dots = document.querySelectorAll('.pagination-dot');
      let currentIndex = 0;
      let isScrolling = false;

      // Initialize first dot
      updatePagination();

      function updatePagination() {
        dots.forEach((dot, index) => {
        dot.classList.toggle('bg-blue-600', index === currentIndex);
        dot.classList.toggle('bg-gray-300', index !== currentIndex);
        });
      }

      function scrollToIndex(index) {
        if (index < 0 || index >= cards.length) return;
        currentIndex = index;
        isScrolling = true;

        const card = cards[index];
        const targetPosition = card.offsetLeft - carousel.offsetLeft;

        carousel.scrollTo({
        left: targetPosition,
        behavior: 'smooth'
        });

        setTimeout(() => {
        isScrolling = false;
        updatePagination();
        }, 500);
      }

      window.scrollNext = function () {
        const newIndex = (currentIndex + 1) % cards.length;
        scrollToIndex(newIndex);
      }

      window.scrollPrev = function () {
        const newIndex = (currentIndex - 1 + cards.length) % cards.length;
        scrollToIndex(newIndex);
      }

      // Dot click handlers
      dots.forEach((dot, index) => {
        dot.addEventListener('click', () => scrollToIndex(index));
      });

      // Scroll event listener
      carousel.addEventListener('scroll', () => {
        if (isScrolling) return;

        const scrollPos = carousel.scrollLeft;
        let closestIndex = 0;
        let closestDistance = Infinity;

        // Find closest card
        Array.from(cards).forEach((card, index) => {
        const cardStart = card.offsetLeft - carousel.offsetLeft;
        const distance = Math.abs(scrollPos - cardStart);

        if (distance < closestDistance) {
          closestDistance = distance;
          closestIndex = index;
        }
        });

        if (closestIndex !== currentIndex) {
        currentIndex = closestIndex;
        updatePagination();
        }
      });

      // Resize handler
      let resizeTimer;
      window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
        scrollToIndex(currentIndex);
        }, 250);
      });
      });
    </script>











    <script>
      function showPopup() {
      document.getElementById("popup").classList.remove("hidden");
      document.getElementById("overlay").classList.remove("hidden");
      }

      function closePopup() {
      document.getElementById("popup").classList.add("hidden");
      document.getElementById("overlay").classList.add("hidden");
      }
    </script>




    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Feature 1 -->
        <div class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow" data-aos="fade-up"
        data-aos-delay="300">
        <div class="text-center">
          <img src="{{ asset('images/new.png') }}" alt="Owner Icon" class="text-4xl text-blue-600 mb-4 w-20 h-20 inline-block"></img>
          <h3 class="text-xl font-semibold mb-4">Our Properties</h3>
          <p class="text-gray-600 mb-4">
            Discover a wide range of properties tailored to your needs. From modern apartments to luxurious villas, find your dream home today.
          </p>
          <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
          Learn More
          </a>
        </div>
        </div>

        <!-- Feature 2 -->
        <div class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow" data-aos="fade-up"
        data-aos-delay="500">
        <div class="text-center">
          <img src="{{ asset('images/villa.png') }}" alt="Owner Icon" class="text-4xl text-blue-600 mb-4 w-20 h-20 inline-block"></img>
          <h3 class="text-xl font-semibold mb-4">Property for Sale</h3>
          <p class="text-gray-600 mb-4">
            Looking to buy a new home? Explore our extensive listings of properties for sale with competitive prices and flexible payment options.
          </p>
          <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
          Learn More
          </a>
        </div>
        </div>

        <!-- Feature 3 -->
        <div class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow" data-aos="fade-up"
        data-aos-delay="400">
        <div class="text-center">
          <img src="{{ asset('images/real-estate-agent.png') }}" alt="Owner Icon" class="text-4xl text-blue-600 mb-4 w-20 h-20 inline-block"></img>
          <h3 class="text-xl font-semibold mb-4">Real Estate Agent</h3>
          <p class="text-gray-600 mb-4">
            Connect with our trusted real estate agents who will guide you through every step of the buying, selling, or renting process.
          </p>
          <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
          Learn More
          </a>
        </div>
        </div>

        <!-- Feature 4 -->
        <div class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow" data-aos="fade-up"
        data-aos-delay="600">
        <div class="text-center">
          <img src="{{ asset('images/real-estate.png') }}" alt="Owner Icon" class="text-4xl text-blue-600 mb-4 w-20 h-20 inline-block"></img>
          <h3 class="text-xl font-semibold mb-4">House for Sale</h3>
          <p class="text-gray-600 mb-4">
            Find the perfect house for you and your family. Our listings include beautiful homes in prime locations, ready for you to move in.
          </p>
          <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
          Learn More
          </a>
        </div>
        </div>
      </div>
      </div>
    </section>



    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
      <!-- Header with Navigation -->
      <div class="flex flex-wrap items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-blue-600 mb-4 md:mb-0">Customer Says</h2>
        <div class="flex gap-4">
        <button
          class="testimonial-prev px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
          ← Prev
        </button>
        <button
          class="testimonial-next px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
          Next →
        </button>
        </div>
      </div>
      <!-- Testimonials Carousel -->
      <div class="swiper testimonial-carousel">
        <div class="swiper-wrapper">

        @foreach ($rates as $rate)
      <!-- Testimonial 1 -->
      <div class="swiper-slide">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto text-center">
        <img src="{{asset('../images/profiles/' . $rate->user->profile_picture)}}"
        class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
        <div class="flex justify-center gap-1 mb-4 text-yellow-400">
        @for ($i = 0; $i < $rate->rate; $i++)
      ★
    @endfor
        </div>
        <h3 class="text-xl font-semibold text-blue-600 mb-4">{{$rate->user->name}}</h3>
        <blockquote class="text-gray-600 mb-6 italic">
        {{$rate->Comment}}
        </blockquote>
        </div>
      </div>
    @endforeach
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination mt-8 flex justify-center gap-2"></div>
      </div>
      </div>
    </section>

    <!-- Required Styles -->
    <style>
      .swiper-pagination-bullet {
      @apply w-3 h-3 rounded-full bg-gray-300 opacity-100 transition-all;
      }

      .swiper-pagination-bullet-active {
      @apply bg-blue-600 w-6 rounded-lg;
      }
    </style>

    <!-- Initialize Swiper -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
      const swiper = new Swiper('.testimonial-carousel', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
        nextEl: '.testimonial-next',
        prevEl: '.testimonial-prev',
        },
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
        }
      });
      });
    </script>



<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
      <!-- Heading Section -->
      <div class="text-center max-w-2xl mx-auto mb-12">
          <h2 class="text-3xl font-bold text-blue-600 mb-4">
              Let's Find a Home That's Perfect for You
          </h2>
          <p class="text-gray-600">
              Whether you're buying, selling, or renting, we are here to help you find the property of your dreams. Explore our extensive listings and let our top-rated agents guide you through every step.
          </p>
      </div>

      <!-- Image & Features Section -->
      <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 mb-16">
          <!-- Image Column -->
          <div class="lg:w-7/12 lg:order-2">
              <img src="{{ asset('images/hero_bg_3.jpg') }}" alt="Real Estate" class="w-full h-96 object-cover rounded-lg shadow-lg">
          </div>

          <!-- Features Column -->
          <div class="lg:w-5/12 space-y-8">
              <!-- Feature 1: 2M Properties -->
              <div class="flex items-start gap-4">
                  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                      <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                          </path>
                      </svg>
                  </div>
                  <div>
                      <h3 class="text-xl font-semibold mb-2">2M+ Properties</h3>
                      <p class="text-gray-600">Browse through over 2 million properties listed worldwide. From urban apartments to luxurious villas, we have something for everyone.</p>
                  </div>
              </div>

              <!-- Feature 2: Top Rated Agents -->
              <div class="flex items-start gap-4">
                  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                      <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                          </path>
                      </svg>
                  </div>
                  <div>
                      <h3 class="text-xl font-semibold mb-2">Top Rated Agents</h3>
                      <p class="text-gray-600">Our experienced and trusted agents are ready to assist you. They are dedicated to finding you the best property at the best price.</p>
                  </div>
              </div>

              <!-- Feature 3: Verified Listings -->
              <div class="flex items-start gap-4">
                  <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                      <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                          </path>
                      </svg>
                  </div>
                  <div>
                      <h3 class="text-xl font-semibold mb-2">Verified Listings</h3>
                      <p class="text-gray-600">All properties listed are verified to ensure transparency and authenticity. We prioritize trust and security for our users.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>


      <!-- Counter Section -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">{{$rentCount}}</div>
        <div class="text-gray-600"># of Rent Properties</div>
        </div>
        <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">{{$buyCount}}</div>
        <div class="text-gray-600"># of Sell Properties</div>
        </div>
        <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2 ">{{$propertiesCount}}</div>
        <div class="text-gray-600"># of All Properties</div>
        </div>
        <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">{{$agentCount}}</div>
        <div class="text-gray-600"># of Agents</div>
        </div>
      </div>
      </div>
    </section>


    <div class="py-12">
      <div class="flex justify-center w-full" data-aos="fade-up">
      <div class="w-full lg:w-7/12 mx-auto text-center">
        <h2 class="mb-4 text-2xl md:text-3xl font-semibold">
        Be a part of our growing real state agents
        </h2>
        <p>
        <a href="{{route('show.signup.user')}}"
          class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors">
          Apply for Real Estate agent
        </a>
        </p>
      </div>
      </div>
    </div>

    @section('our-agents')
    <div class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <!-- Heading Section -->
            <div class="flex justify-center text-center mb-12">
                <div class="max-w-3xl mb-8">
                    <h2 class="font-bold text-3xl text-blue-600 mb-4">
                        Our Agents
                    </h2>
                    <p class="text-gray-600">
                        Meet our top-rated real estate agents who are ready to help you find your dream home. They are professional, experienced, and dedicated to providing you with the best service.
                    </p>
                </div>
            </div>

            <!-- Agents Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($agents as $agent)
                    <div class="group bg-white rounded-lg shadow-lg overflow-hidden h-full transition-transform transform hover:scale-105 ">
                        {{-- <img src="{{ asset('images/profiles/' . $agent->profile_picture) }}" alt="Agent"
                            class="w-56 h-56 "> --}}
                            <div class="flex justify-center">
                              <img src="{{ asset('images/profiles/' . $agent->profile_picture) }}" alt="Agent"
                                  class="w-56 h-56 rounded-full border-4 border-blue-600 shadow-lg object-cover">
                          </div>
                          
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold mb-1">
                              {{ $agent->name }}
                            </h3>
                            <span class="block text-gray-500 mb-4">Real Estate Agent</span>
                             <!-- Conditional Rating Display -->
                              @if ($agent->reviews->avg('review'))
                              <p class="text-yellow-500 mb-2">
                                  <span class="font-bold">Rating:</span> 
                                  {{ rtrim(rtrim(number_format($agent->reviews->avg('review'), 2), '0'), '.') }} / 5
                              </p>
                              @else
                                  <p class="text-gray-500 italic mb-2">Not Rated Yet</p>
                              @endif
                              <!-- Enhanced View Profile Button --> 
                              <a href="{{ route('show.agent') }}" 
                              class="inline-block mt-2 px-4 py-2 rounded-full bg-blue-600 text-white font-semibold hover:bg-blue-700 transition duration-300 shadow-lg">
                              View Profile
                              </a>
                            @if (Auth::check())
                                <button onclick="showRatingForm({{ $agent->id }})"
                                    class="mt-4 text-white bg-blue-600 px-3 py-1 rounded hover:bg-blue-700 transition">
                                    Rate Agent
                                </button>
                            @endif

                            <!-- Social Media Icons -->
                            <ul class="flex justify-center space-x-4 mt-4">
                                <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-twitter text-xl"></i></a></li>
                                <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-facebook-f text-xl"></i></a></li>
                                <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-linkedin-in text-xl"></i></a></li>
                                <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-instagram text-xl"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Rating Form (Hidden Initially) -->
                    <div id="ratingForm-{{$agent->id}}"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                            <p class="text-lg font-semibold mb-4">Rate Agent</p>
                            <div class="flex justify-center mb-4" id="starContainer-{{$agent->id}}">
                                <span class="text-2xl cursor-pointer text-yellow-400" onclick="setRating({{$agent->id}},1)">&#9733;</span>
                                <span class="text-2xl cursor-pointer text-yellow-400" onclick="setRating({{$agent->id}},2)">&#9733;</span>
                                <span class="text-2xl cursor-pointer text-yellow-400" onclick="setRating({{$agent->id}},3)">&#9733;</span>
                                <span class="text-2xl cursor-pointer text-yellow-400" onclick="setRating({{$agent->id}},4)">&#9733;</span>
                                <span class="text-2xl cursor-pointer text-yellow-400" onclick="setRating({{$agent->id}},5)">&#9733;</span>
                            </div>
                            <form method="POST" action="{{ route('review.agent', $agent->id) }}">
                                @csrf
                                <input type="hidden" name="rating" id="ratingValue-{{$agent->id}}">
                                <button type="submit"
                                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                    Confirm
                                </button>
                            </form>
                            <button onclick="cancelProcess({{$agent->id}})"
                                class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                Cancel
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endsection

