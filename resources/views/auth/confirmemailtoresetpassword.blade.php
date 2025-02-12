<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Verification Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Verification Code Card -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Enter Verification Code</h2>
        <p class="text-gray-600 text-center mb-6">Please enter the verification code sent to your email</p>

        <!-- Verification Code Form -->
        <form action="{{route('confirm.email.reset.password')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="verification-code" class="block text-sm font-medium text-gray-700">Verification Code</label>
                <input type="text" id="verification-code" name="code" placeholder="Enter code"
                    maxlength="6"
                    class="mt-2 p-3 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <input type="submit" value="Verify Code" name="verify_code"
                class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <!-- Action Buttons -->
            <div class="mt-4 text-center space-y-2">
                <a href="{{route('show.forgetpassword.login.user')}}"
                    class="block text-sm text-blue-500 hover:underline">Change Email</a>
                <input type="submit" value="Resend Code" name="resend_code"
                    class="w-full bg-gray-200 text-blue-500 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>


    </div>

</body>

</html>