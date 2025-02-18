<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
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
        document.addEventListener("DOMContentLoaded", function () {
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
      <a href="{{ route('about') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">About</a>
      <a href="{{ route('contact') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Contact</a>
      <a href="{{ route('login.user') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Login</a>
      <a href="{{ route('signup.user') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Signup</a>
    @else
    @if (!strcmp(Auth::user()->type, 'user'))
    <button @if (!Auth::user()->posts()->exists() || Auth::user()->requests->count() != 0) disabled @endif
      onclick="showPopup()" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">
      Become an Agent
    </button>
    <a href="{{ route('about') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">About</a>
    <a href="{{ route('about') }}" class="text-white hover:text-blue-700 px-4 py-2 rounded-md">Contact</a>
  @endif
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 w-full h-full"></div>

    <!-- Popup -->
    <div id="popup" class="hidden fixed inset-0 flex items-center justify-center z-50">
      <div class="bg-gray-100 p-6 rounded-lg shadow-lg w-80 text-center">
      <p class="text-lg font-semibold">
        If you want to become an agent you should send a request (you can request only once)
      </p>
      <form method="post" action="{{ route('send.request.agent') }}">
        @csrf
        <input type="submit" value="Send a Request"
        class="mt-4 px-4 py-2 bg-gray-200 text-black rounded-lg hover:bg-gray-200 hover:cursor-pointer transition">
      </form>
      <button onclick="closePopup()"
        class="mt-4 px-4 py-2 bg-gray-200 text-black rounded-lg hover:bg-gray-200 transition">
        Cancel
      </button>
      </div>
    </div>

    <!-- Profile Dropdown -->
    <div class="relative inline-block">
      <button onclick="toggleDropdown()" class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
      <img src="{{ asset('../images/profiles/' . Auth::user()->profile_picture) }}" alt="Profile"
        class="w-full h-full object-cover">
      </button>

      <div id="profileDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-10">
      <a href="{{ route('show.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">View
        Profile</a>
      @if (!strcmp(Auth::user()->type, 'admin'))

      <a href="{{route('show.dashboard.admin')}}" target="_blank" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
    @endif
      <a href="{{route('show.addpost')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Add Property</a>
      <a href="{{ route('user.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
      </div>
    </div>
  @endif
      </div>
    </div>
  </nav>

  <!-- Video Background -->
  @yield('video')
  <!-- Posts -->
  @yield('posts')


  <!-- content -->

  @yield('content')

  @yield('our-agents')


  <!-- Footer -->


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
              <li><a href="tel:+11234567890"
                  class="text-gray-400 hover:text-blue-600 transition-colors">+1(123)-456-7890</a></li>
              <li><a href="tel:+11234567890"
                  class="text-gray-400 hover:text-blue-600 transition-colors">+1(123)-456-7890</a></li>
              <li><a href="mailto:info@mydomain.com"
                  class="text-gray-400 hover:text-blue-600 transition-colors">info@mydomain.com</a></li>
            </ul>
          </div>
        </div>

        <!-- Sources Column -->
        <div class="mb-8 md:mb-0">
          <div class="widget">
            <h3 class="text-xl font-semibold mb-4">Sources</h3>
            <div class="flex gap-8">
              <ul class="space-y-2 list-none">
                <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-blue-600 transition-colors">About us</a></li>
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
              <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-blue-600 transition-colors">About us</a></li>
              <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-blue-600 transition-colors">Contact us</a></li>
            </ul>

            <div class="social-links flex space-x-4">
              <a href="#" class="text-gray-400 hover:text-pink-500 transition-colors" aria-label="Instagram">
                <i class="fab fa-instagram text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors" aria-label="Twitter">
                <i class="fab fa-twitter text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-800 transition-colors" aria-label="Facebook">
                <i class="fab fa-facebook-f text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-red-600 transition-colors" aria-label="Pinterest">
                <i class="fab fa-pinterest text-2xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-pink-600 transition-colors" aria-label="Dribbble">
                <i class="fab fa-dribbble text-2xl"></i>
            </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Copyright Section -->
      <div class="mt-12 pt-8 border-t border-gray-800 text-center">
        <p class="text-gray-400 text-sm">
          Copyright ©
          <script>document.write(new Date().getFullYear());</script>. All Rights Reserved. —
          Designed with love by <a href="#" class="text-blue-600 hover:text-blue-400 transition-colors">------</a>
        </p>
        <div class="mt-2 text-gray-400 text-sm">
          Distributed by <a href="#" target="_blank"
            class="text-blue-600 hover:text-blue-400 transition-colors">-----</a>
        </div>
      </div>
    </div>
  </footer>

  <script>
    function toggleDropdown() {
      var dropdown = document.getElementById("profileDropdown");
      dropdown.classList.toggle("hidden");
    }

    window.onclick = function (event) {
      if (!event.target.closest('.relative')) {
        var dropdown = document.getElementById("profileDropdown");
        if (!dropdown.classList.contains("hidden")) {
          dropdown.classList.add("hidden");
        }
      }
    }
    function showPopup() {
      document.getElementById("popup").classList.remove("hidden");
      document.getElementById("overlay").classList.add("overlay-active");
      document.body.classList.add("no-scroll");
    }

    function closePopup() {
      document.getElementById("popup").classList.add("hidden");
      document.getElementById("overlay").classList.remove("overlay-active");
      document.body.classList.remove("no-scroll");
    }
  </script>

</body>

</html>