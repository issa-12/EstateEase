<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            height: auto;
        }

        @media(max-width:800px) {
            .form {
                width: 80%;
                height: 700px;
            }
        }
    </style>
</head>

<body>
    <div class="flex w-[90%] m-auto mt-[10px]">
        <div class="m-[15px]">
            <a href="{{route('home')}}" class="fas fa-arrow-left"></a>
        </div>

        <div class="w-[50%] form m-auto flex flex-col">
            <form method="post" action="{{route('signup.user')}}"
                class="p-5 w-full bg-white rounded-lg shadow-lg flex flex-col gap-[5px] h-[800px]">
                @csrf
                <h1 class="text-center text-2xl font-bold">Sign up</h1>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="Username"
                        class="text-gray-700 transition-colors duration-300 ease-in-out">Username</label>
                    <input id="Username" value="{{old('name')}}" name="name" type="username"
                        placeholder="Enter Username"
                        class="p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="email" class="text-gray-700 transition-colors duration-300 ease-in-out">Email</label>
                    <input id="email" name="email" type="email" placeholder="Enter your email address"
                        class="p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out">
                </div>

                <div class="flex flex-col gap-[5px]">
                    <label for="password"
                        class="text-gray-700 transition-colors duration-300 ease-in-out">Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter password"
                        class="p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out">
                </div>

                <div class="flex flex-col gap-[5px]">
                    <label for="confirm-password"
                        class="text-gray-700 transition-colors duration-300 ease-in-out">Confirm Password</label>
                    <input id="confirm-password" name="password_confirmation" type="password"
                        placeholder="Confirm your password"
                        class="p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out">
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="submit" value="confirm email" class="bg-[#5A7794] p-[15px] rounded-lg w-[98%] m-auto text-white font-mono mt-[15px] mb-[15px]">

                <div class="flex items-center mt-[7px] mb-[7px]">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="px-4 text-gray-500">Or login with</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <button disabled
                    class="flex justify-center items-center bg-white-300 p-[20px] border rounded-lg text-black-900 gap-[10px]">
                    <img src="{{asset('../images/background/Google_Icons-09-512.webp')}}" class="w-[20px] h-[20px] ">
                    <p class="text-blue-300 font-sans">Sign up with Google</p>
                </button>

                <div class="font-sans">
                    <p class="text-center mt-[20px] mb-[20px]">Already have an account? <span><a href="{{route('show.login.user')}}"
                                class="text-blue-300">Login</a> </span></p>
                </div>

            </form>
        </div>
</body>

</html>