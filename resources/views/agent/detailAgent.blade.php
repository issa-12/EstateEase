<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans flex justify-center items-center min-h-screen">

    <!-- Back Button -->
    <div class="absolute top-4 left-4">
        <a href="{{ url()->previous() }}" class="flex items-center text-gray-700 hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l-7-7 7-7"></path>
            </svg>
            Back
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <!-- Profile Section -->
        <div class="flex items-center justify-center mb-6">
            <img src="{{ asset('images/profiles/' . $agent->profile_picture) }}" alt="Agent Profile Picture"
                class="w-32 h-32 rounded-full border-4 border-gray-300">
        </div>

        <div class="text-center">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $agent->name }}</h2>
            <p class="text-gray-600 text-sm">Agent</p>
            <p class="mt-2 text-gray-500">{{ $agent->email }}</p>
        </div>

        <!-- Button to open email client -->
        <div class="mt-6 flex justify-center">
            <a href="mailto:{{ $agent->email }}"
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-600 transition duration-200">
                Chat with Agent
            </a>
        </div>
    </div>

</body>

</html>
