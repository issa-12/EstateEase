<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <a href="{{route('home')}}" class="m-[15px]">
        <i class="fas fa-arrow-left"></i>

    </a>

    <div class="h-[650px] flex justify-center items-center">

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: mono;
            }

            @media(max-width:950px) {

                .pic {
                    display: none;
                }

                .form {
                    width: 100%;
                }
            }
        </style>


        <div class="flex w-[90%] ">


            <div class="w-[50%] form">
                <form method="post" action="{{route('login.user')}}"
                    class="p-8 w-full bg-white rounded-lg shadow-lg flex flex-col gap-[10px] h-[600px]">
                    @csrf
                    <h1 class="text-center text-2xl font-bold">Login</h1>
                    <div class="flex flex-col gap-2">
                        <label for="email"
                            class="text-gray-700 transition-colors duration-300 ease-in-out">Email</label>
                        <input id="email" type="email" name="email" placeholder="Enter your email address"
                            class="p-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out">
                    </div>

                    <div class="flex flex-col gap-3 mt-4">
                        <label for="password"
                            class="text-gray-700 transition-colors duration-300 ease-in-out">Password</label>
                        <input id="password" type="password" name="password" placeholder="Enter password"
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
                    <div class="flex justify-end">
                        <a class="text-blue-900 cursor-pointer text-[13px] fonst-mono" href="{{route('show.forgetpassword.login.user')}}">Forget your
                            password?</a>
                    </div>

                    <input type="submit" name="login" value="Login"
                        class="bg-[#5A7794] hover:cursor-pointer p-[15px] rounded-lg w-[98%] m-auto text-white font-mono">

                
                    <div class="flex items-center mt-[7px] mb-[7px]">
                        <div class="flex-grow border-t border-gray-300"></div>
                        <span class="px-4 text-gray-500">Or login with</span>
                        <div class="flex-grow border-t border-gray-300"></div>
                    </div>


                    <button disabled
                        class="flex justify-center  items-center bg-white-300 p-[20px] border rounded-lg text-black-900 gap-[10px]">


                        <img src="{{asset('../images/background/Google_Icons-09-512.webp')}}"
                            class="w-[20px] h-[20px] ">


                        <p class="text-blue-300 font-sans">Sign in with google</p>
                    </button>



                    <div class="font-sans">
                        <p class="text-center mt-[20px]">Do not have an account? <span><a href="{{route('signup.user')}}"
                                    class="text-blue-300">Register here</a> </span></p>
                    </div>

                </form>
            </div>

            <div class="h-[600px] w-[50%] pic">
                <img src="{{asset('../images/background/door-opening-revealing-beautiful-city.jpg')}}"
                    class="w-[100%] h-[100%] object-cover">
            </div>

        </div>

    </div>

</body>

</html>