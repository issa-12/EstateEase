<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <img src="{{asset('../images/background/original-2f49323bf138838304e92ea9dd9aa51d.webp')}}" alt="Logo"
                    class="w-12 h-12">
            </div>

            <!-- Search Bar -->
            @yield('search_bar')

            <!-- Nav Links -->
            <div class="hidden md:flex space-x-6">
                <a href="{{route('home')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Home</a>
                <a href="{{route('show.buy.post')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Buy</a>
                <a href="{{route('show.rent.post')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Rent</a>
                <a href="{{route('show.agent')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Agent</a>
                @if (!Auth::check())
                    <a href="{{route('login.user')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Login</a>
                    <a href="{{route('signup.user')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Signup</a>
                @else
                @if (!strcmp(Auth::user()->type, 'user'))
                        <button @if (! Auth::user()->posts()->exists()||Auth::user()->requests->count()!=0) disabled @endif onclick="showPopup()"
                            class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">become an agent</button>
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
                    

                    <a href="{{route('user.logout')}}" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md">Logout</a>
                    <a href="{{route('show.profile')}}"
                        class="w-10 h-10 rounded-full overflow-hidden border-2 border-white">
                        <img src="{{asset('../images/profiles/' . Auth::user()->profile_picture)}}" alt="Profile"
                            class="w-full h-full object-cover">
                    </a>
                @endif
            </div>
        </div>
    </nav>

    @yield('video')
    @yield('posts')
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
</body>

</html>