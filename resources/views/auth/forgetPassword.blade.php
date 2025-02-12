<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Forgot Password Card -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <a href="{{route('show.login.user')}}">
            <=</a>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Forgot Password</h2>
                <p class="text-gray-600 text-center mb-6">Enter your email to reset your password</p>

                <!-- Forgot Password Form -->
                <form action="{{route('verifycode')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required
                            class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                    <input type="submit" value="continue to confirm your email"
                        class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">

                </form>

                <!-- Back to Home Link -->
                <div class="mt-4 text-center">
                    <a href="{{route('home')}}" class="text-sm text-blue-500 hover:underline">Back to Home</a>
                </div>
    </div>

</body>

</html>