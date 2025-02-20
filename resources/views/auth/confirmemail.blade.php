<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Email Verification</h2>
        <p class="text-gray-600 mb-6">Enter the verification code sent to your email.</p>
        <form method="post" action="{{ route('store.user') }}">
            @csrf
            <input type="text" name="code" placeholder="Enter verification code"
                class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none mb-4">
            <button type="submit" name="verify_email"
                class="w-full py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                Verify Email
            </button>
            <button type="submit" name="get_code"
                class="w-full mt-2 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                Resend Code
            </button>
        </form>
    </div>
</body>

</html>
