<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7D884E',
                        accent: '#F4A261',
                    },
                },
            },
        };
    </script>
    <style>
        .get-started {
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .get-started:hover {
            transform: scale(1.2);
            background-color: #2953ea;
        }
    </style>
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 py-3">
        <div class="container mx-auto flex justify-between items-center">
         

{{-- <!-- Logo and Website Name -->
<div class="flex items-center space-x-3">
    <img src="{{asset('../images/logo.webp')}}" alt="Logo" class="w-12 h-12 rounded-full">
    <h1 class="text-white text-2xl italic tracking-wide ">EstateEASE</h1>
</div> --}}

<!-- Logo and Website Name -->
<div class="flex items-center space-x-3">
    <img src="{{asset('../images/logo.webp')}}" alt="Logo" class="w-12 h-12  ml-5 rounded-full">
    <h1 id="typewriter" class="text-white text-2xl italic tracking-wide"></h1>
</div>

<!-- Typewriter Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const text = "EstateEASE";
        let index = 0;
        const speed = 150; // Typing speed in milliseconds

        function typeWriter() {
            if (index < text.length) {
                document.getElementById("typewriter").innerHTML += text.charAt(index);
                index++;
                setTimeout(typeWriter, speed);
            }
        }
        typeWriter();
    });
</script>





            <!-- Search Bar -->
            {{-- @yield('search_bar') --}}
           
            

            <!-- Nav Links -->
            <div class="hidden md:flex space-x-6">
                <a href="{{route('home')}}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Home</a>
            <!-- Dropdown for Property -->
            <div class="relative group pt-2 ">
                <a href="#" class="text-white hover:text-blue-700 px-4 py-2 rounded-md transition">Property</a>
                <div class="absolute hidden group-hover:block bg-white text-gray-800 rounded-md shadow-lg mt-2 w-40 z-50">
                    <a href="{{route('show.buy.post')}}" class="block px-4 py-2 hover:text-gray-600">Buy</a>
                    <a href="{{route('show.rent.post')}}" class="block px-4 py-2 hover:text-gray-600">Rent</a>
                </div>
            </div>

            <a href="{{route('show.agent')}}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Agent</a>
            
            @if (!Auth::check())
                    <a href="#" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">About</a>  
                    <a href="#" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Contact</a>
                    <a href="{{route('login.user')}}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Login</a>
                    <a href="{{route('signup.user')}}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Signup</a>
                @else
                @if (!strcmp(Auth::user()->type, 'user'))
                        <button @if (! Auth::user()->posts()->exists()||Auth::user()->requests->count()!=0) disabled @endif onclick="showPopup()"
                            class="text-white hover:text-blue-700 px-4 py-2 rounded-md">become an agent</button>
                            <a href="#" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">About</a>  
                            <a href="#" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Contact</a>
                        @endif
                        <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50"></div>
                        <!-- Popup -->
                        <div id="popup" class="hidden fixed inset-0 flex items-center justify-center">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                                <p class="text-lg font-semibold">If you want to become an agent you should send a request(you can request only once)</p>
                                <form method="post" action="{{route('send.request.agent')}}">
                                    @csrf
                                    <input type="submit" value="send a request" class="mt-4 px-4 py-2 bg-gray-100 text-black rounded-lg hover:bg-gray-200 transition">
                                </form>
                                <button onclick="closePopup()"
                                    class="mt-4 px-4 py-2 bg-gray-100 text-black rounded-lg hover:bg-gray-200 transition">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    

                    <a href="{{route('user.logout')}}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Logout</a>
                    <a href="{{route('show.profile')}}"
                        class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
                        <img src="{{asset('../images/profiles/' . Auth::user()->profile_picture)}}" alt="Profile"
                            class="w-full h-full object-cover">
                    </a>
                @endif
            </div>
        </div>
    </nav>

        <!-- Video Background -->
         @yield('video')
         <!-- Posts --> 
         @yield('posts')


{{-- 
         <div class="py-16">
          <div class="container mx-auto px-4">
            <!-- Heading Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
              <h2 class="text-3xl md:text-4xl font-bold text-blue-600 mb-4 md:mb-0">
                Popular Properties
              </h2>
              <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200">
                View all properties
              </a>
            </div>
        
            <!-- Carousel Container -->
            <div class="relative group">
              <!-- Carousel Items -->
              <div class="overflow-x-auto pb-4 scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none" id="carousel">
                <div class="flex gap-4">
                  <!-- Property Items -->
                  {{-- <div class="flex-shrink-0 w-[calc(100vw-4rem)] md:w-72 lg:w-80 ml-4">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-shadow duration-200 hover:shadow-lg h-full">
                      <!-- Card Content -->
                      <a href="property-single.html" class="block">
                        <img src="images/img_1.jpg" alt="Property" class="w-full h-48 object-cover">
                      </a>
                      <div class="p-4 md:p-6">
                        <div class="text-xl font-bold text-gray-900 mb-2">$1,291,000</div>
                        <div class="mb-4">
                          <p class="text-gray-600 text-sm mb-2">5232 California Fake, Ave. 21BC</p>
                          <p class="text-gray-800 font-medium">California, USA</p>
                        </div>
                        <div class="flex items-center space-x-4 mb-4">
                          <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>2 beds</span>
                          </div>
                          <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span>2 baths</span>
                          </div>
                        </div>
                        <a href="property-single.html" class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md transition-colors">
                          See details
                        </a>
                      </div>
                    </div>
                  </div> -------------------------------

                  @foreach ($posts as $post)
                  <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300">
                      <img src="{{asset('../images/posts/' . $post->image)}}" alt="Post Image"
                          class="w-full h-48 object-cover rounded-md mb-4">
                      <h3 class="text-2xl font-semibold text-gray-800 mb-2">{{$post->title}}</h3>
                      <p class="text-gray-600 mb-2">{{ Str::limit($post->description, 100) }}</p>
                      <p class="text-gray-500 text-sm">{{$post->adress}}</p>
                      <p class="text-blue-500 text-sm mb-2">For: {{$post->type}}</p>
                      <p class="text-green-600 font-semibold text-lg">Price: ${{$post->price}}</p>
                      <a href="{{route('view.post', $post->id)}}" 
                         class="inline-block mt-4 px-4 py-2 bg-[#010404] text-white rounded-full hover:bg-blue-700 transition duration-300">
                         View Details
                      </a>
                  </div>
              @endforeach
              
                  <!-- Repeat other property items here -->
                  <!-- Make sure to use the same class structure -->
                  
                </div>
              </div>
              <style>
                .scrollbar-hide::-webkit-scrollbar {
                  display: none;
                }
                </style>
              <!-- Carousel Controls -->
              <div class="mt-6 flex justify-center gap-4">
                <button onclick="scrollPrev()" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-colors duration-200">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                  </svg>
                </button>
                <button onclick="scrollNext()" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-full shadow-lg transition-colors duration-200">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
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
  document.addEventListener('DOMContentLoaded', function() {
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
      if(index < 0 || index >= cards.length) return;
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
  
    window.scrollNext = function() {
      const newIndex = (currentIndex + 1) % cards.length;
      scrollToIndex(newIndex);
    }
  
    window.scrollPrev = function() {
      const newIndex = (currentIndex - 1 + cards.length) % cards.length;
      scrollToIndex(newIndex);
    }
  
    // Dot click handlers
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => scrollToIndex(index));
    });
  
    // Scroll event listener
    carousel.addEventListener('scroll', () => {
      if(isScrolling) return;
      
      const scrollPos = carousel.scrollLeft;
      let closestIndex = 0;
      let closestDistance = Infinity;
  
      // Find closest card
      Array.from(cards).forEach((card, index) => {
        const cardStart = card.offsetLeft - carousel.offsetLeft;
        const distance = Math.abs(scrollPos - cardStart);
        
        if(distance < closestDistance) {
          closestDistance = distance;
          closestIndex = index;
        }
      });
  
      if(closestIndex !== currentIndex) {
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
        <div 
          class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow"
          data-aos="fade-up" 
          data-aos-delay="300"
        >
          <div class="text-center">
            <span class="flaticon-house text-4xl text-blue-600 mb-4 inline-block"></span>
            <h3 class="text-xl font-semibold mb-4">Our Properties</h3>
            <p class="text-gray-600 mb-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.
            </p>
            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
              Learn More
            </a>
          </div>
        </div>
  
        <!-- Feature 2 -->
        <div 
          class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow"
          data-aos="fade-up" 
          data-aos-delay="500"
        >
          <div class="text-center">
            <span class="flaticon-building text-4xl text-blue-600 mb-4 inline-block"></span>
            <h3 class="text-xl font-semibold mb-4">Property for Sale</h3>
            <p class="text-gray-600 mb-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.
            </p>
            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
              Learn More
            </a>
          </div>
        </div>
  
        <!-- Feature 3 -->
        <div 
          class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow"
          data-aos="fade-up" 
          data-aos-delay="400"
        >
          <div class="text-center">
            <span class="flaticon-house-3 text-4xl text-blue-600 mb-4 inline-block"></span>
            <h3 class="text-xl font-semibold mb-4">Real Estate Agent</h3>
            <p class="text-gray-600 mb-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.
            </p>
            <a href="#" class="text-blue-600 hover:text-blue-800 transition-colors font-medium">
              Learn More
            </a>
          </div>
        </div>
  
        <!-- Feature 4 -->
        <div 
          class="p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow"
          data-aos="fade-up" 
          data-aos-delay="600"
        >
          <div class="text-center">
            <span class="flaticon-house-1 text-4xl text-blue-600 mb-4 inline-block"></span>
            <h3 class="text-xl font-semibold mb-4">House for Sale</h3>
            <p class="text-gray-600 mb-4">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, accusamus.
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
          <button class="testimonial-prev px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
            ← Prev
          </button>
          <button class="testimonial-next px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
            Next →
          </button>
        </div>
      </div>
  
      <!-- Testimonials Carousel -->
      <div class="swiper testimonial-carousel">
        <div class="swiper-wrapper">
          <!-- Testimonial 1 -->
          <div class="swiper-slide">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto text-center">
              <img src="/images/person_1-min.jpg" alt="James Smith" 
                   class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
              <div class="flex justify-center gap-1 mb-4 text-yellow-400">
                ★ ★ ★ ★ ★
              </div>
              <h3 class="text-xl font-semibold text-blue-600 mb-4">James Smith</h3>
              <blockquote class="text-gray-600 mb-6 italic">
                “Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...”
              </blockquote>
              <p class="text-gray-500">Designer, Co-founder</p>
            </div>
          </div>
  
          <!-- Testimonial 2 -->
          <div class="swiper-slide">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto text-center">
              <img src="/images/person_2-min.jpg" alt="Mike Houston" 
                   class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
              <div class="flex justify-center gap-1 mb-4 text-yellow-400">
                ★ ★ ★ ★ ★
              </div>
              <h3 class="text-xl font-semibold text-blue-600 mb-4">Mike Houston</h3>
              <blockquote class="text-gray-600 mb-6 italic">
                “Far far away, behind the word mountains, far from the countries Vokalia and Consonantia...”
              </blockquote>
              <p class="text-gray-500">Designer, Co-founder</p>
            </div>
          </div>
  
          <!-- Add more testimonials following the same pattern -->
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
  document.addEventListener('DOMContentLoaded', function() {
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
        Let's find home that's perfect for you
      </h2>
      <p class="text-gray-600">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam enim pariatur similique debitis vel nisi qui reprehenderit.
      </p>
    </div>

    <!-- Image & Features Section -->
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-12 mb-16">
      <!-- Image Column -->
      <div class="lg:w-7/12 lg:order-2">
        <img src="images/hero_bg_3.jpg" alt="Real Estate" 
             class="w-full h-96 object-cover rounded-lg shadow-lg">
      </div>

      <!-- Features Column -->
      <div class="lg:w-5/12 space-y-8">
        <div class="flex items-start gap-4">
          <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">2M Properties</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iste.</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Top Rated Agents</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iste.</p>
          </div>
        </div>

        <div class="flex items-start gap-4">
          <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Legit Properties</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iste.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Counter Section -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
      <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">3,298</div>
        <div class="text-gray-600"># of Buy Properties</div>
      </div>
      <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">2,181</div>
        <div class="text-gray-600"># of Sell Properties</div>
      </div>
      <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">9,316</div>
        <div class="text-gray-600"># of All Properties</div>
      </div>
      <div class="text-center p-4">
        <div class="text-3xl font-bold text-blue-600 mb-2">7,191</div>
        <div class="text-gray-600"># of Agents</div>
      </div>
    </div>
  </div>
</section>


<div class="py-12">
  <div 
    class="flex justify-center w-full" 
    data-aos="fade-up"
  >
    <div class="w-full lg:w-7/12 mx-auto text-center">
      <h2 class="mb-4 text-2xl md:text-3xl font-semibold">
        Be a part of our growing real state agents
      </h2>
      <p>
        <a 
          href="#" 
          target="_blank" 
          class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors"
        >
          Apply for Real Estate agent
        </a>
      </p>
    </div>
  </div>
</div>

<div class="py-16 bg-gray-100">
  <div class="container mx-auto px-4">
    <!-- Heading Section -->
    <div class="flex justify-center text-center mb-12">
      <div class="max-w-3xl mb-8">
        <h2 class="font-bold text-3xl text-blue-600 mb-4">
          Our Agents
        </h2>
        <p class="text-gray-600">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
          enim pariatur similique debitis vel nisi qui reprehenderit totam?
          Quod maiores.
        </p>
      </div>
    </div>

    <!-- Agents Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Agent Card 1 -->
      <div class="group bg-white rounded-lg shadow-lg overflow-hidden h-full">
        <img src="images/person_1-min.jpg" alt="Agent" class="w-full h-48 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold mb-1">
            <a href="#" class="hover:text-blue-600 transition">James Doe</a>
          </h3>
          <span class="block text-gray-500 mb-4">Real Estate Agent</span>
          <p class="text-gray-600 mb-6">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Facere officiis inventore cumque tenetur laboriosam.
          </p>
          <ul class="flex space-x-4">
            <li>
              <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                Twitter
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                Facebook
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                LinkedIn
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-400 hover:text-blue-600 transition">
                Instagram
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Repeat for other agents (Agent Card 2 and 3) -->
      <!-- ... -->
    </div>
  </div>
</div>



<footer class="bg-gray-900 text-white py-12">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Contact Column -->
      <div class="mb-8 md:mb-0">
        <div class="widget">
          <h3 class="text-xl font-semibold mb-4">Contact</h3>
          <address class="text-gray-400 not-italic mt-4">
            43 Raymouth Rd. Baltemoer, London 3910
          </address>
          <ul class="mt-4 space-y-2 list-none">
            <li><a href="tel:+11234567890" class="text-gray-400 hover:text-blue-600 transition-colors">+1(123)-456-7890</a></li>
            <li><a href="tel:+11234567890" class="text-gray-400 hover:text-blue-600 transition-colors">+1(123)-456-7890</a></li>
            <li><a href="mailto:info@mydomain.com" class="text-gray-400 hover:text-blue-600 transition-colors">info@mydomain.com</a></li>
          </ul>
        </div>
      </div>

      <!-- Sources Column -->
      <div class="mb-8 md:mb-0">
        <div class="widget">
          <h3 class="text-xl font-semibold mb-4">Sources</h3>
          <div class="flex gap-8">
            <ul class="space-y-2 list-none">
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">About us</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Services</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Vision</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Mission</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Terms</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Privacy</a></li>
            </ul>
            <ul class="space-y-2 list-none">
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Partners</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Business</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Careers</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Blog</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">FAQ</a></li>
              <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Creative</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Links Column -->
      <div class="mb-8 md:mb-0">
        <div class="widget">
          <h3 class="text-xl font-semibold mb-4">Links</h3>
          <ul class="space-y-2 list-none mb-8">
            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Our Vision</a></li>
            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">About us</a></li>
            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">Contact us</a></li>
          </ul>
          
          <div class="social-links flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Instagram">
              <!-- Replace with actual SVG icon -->
              <span class="icon-instagram">IG</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Twitter">
              <span class="icon-twitter">TW</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Facebook">
              <span class="icon-facebook">FB</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="LinkedIn">
              <span class="icon-linkedin">IN</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Pinterest">
              <span class="icon-pinterest">PN</span>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="Dribbble">
              <span class="icon-dribbble">DR</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Copyright Section -->
    <div class="mt-12 pt-8 border-t border-gray-800 text-center">
      <p class="text-gray-400 text-sm">
        Copyright © 
        <script>document.write(new Date().getFullYear());</script>2025. All Rights Reserved. — 
        Designed with love by <a href="https://untree.co" class="text-blue-600 hover:text-blue-400 transition-colors">Untree.co</a>
      </p>
      <div class="mt-2 text-gray-400 text-sm">
        Distributed by <a href="https://themewagon.com/" target="_blank" class="text-blue-600 hover:text-blue-400 transition-colors">themewagon</a>
      </div>
    </div>
  </div>
</footer> --}}




</body>

</html>