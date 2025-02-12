<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 py-12">

    <!-- Main Content Container -->
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
        <a href="{{ url()->previous() }}"><-</a>
        <!-- Image of the item -->
        <img src="{{asset('../images/posts/'.$post->image)}}" alt="Item Image" class="w-full h-72 object-cover rounded-t-xl">

        <!-- Content Container -->
        <div class="p-8 space-y-6">

            <!-- Title -->
            <h1 class="text-4xl font-semibold text-gray-900">{{$post->title}}</h1>

            <!-- Description -->
            <p class="text-lg text-gray-700">{{$post->description}}</p>

            <!-- Details Section: Address, Price, and Type -->
            <div class="space-y-4">
                <!-- Address -->
                <div class="flex items-center text-gray-600 text-sm space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 5.121a4 4 0 015.657 5.657l7.078 7.078a4 4 0 015.657 5.657M11.212 7.778l-7.078 7.078a4 4 0 01-5.657-5.657l7.078-7.078a4 4 0 015.657 5.657L7.778 11.212" />
                    </svg>
                    <span>{{$post->address}}</span>
                </div>

                <!-- Price -->
                <p class="text-2xl font-bold text-green-700">
                    ${{$post->price}}
                </p>

                <!-- Type (For Rent or For Sale) -->
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-600">Property Type:</span>
                    <span class="px-4 py-2 rounded-full bg-blue-500 text-white text-sm font-medium">For {{$post->type}}</span>
                </div>
            </div>

            <!-- Enroll Button -->
            <div class="mt-6">
                <button class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none">
                    Enroll Now
                </button>
            </div>
        </div>
    </div>

</body>
</html>
