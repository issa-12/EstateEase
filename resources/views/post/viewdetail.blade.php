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
        <a href="{{ url()->previous() }}"><- </a>
                <!-- Image of the item -->
                <img src="{{asset('../images/posts/' . $post->image)}}" alt="Item Image"
                    class="w-full h-72 object-cover rounded-t-xl">

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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 5.121a4 4 0 015.657 5.657l7.078 7.078a4 4 0 015.657 5.657M11.212 7.778l-7.078 7.078a4 4 0 01-5.657-5.657l7.078-7.078a4 4 0 015.657 5.657L7.778 11.212" />
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
                            <span class="px-4 py-2 rounded-full bg-blue-500 text-white text-sm font-medium">For
                                {{$post->type}}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-center">
                        @if (Auth::check())          
                        <button onclick="showPaymentOptions()"
                            class="py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none">
                            Enroll Now
                        </button>
                        @else
                        <a href="{{route('show.login.user')}}"
                            class="py-3 px-6 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none">
                            Login to Enroll
                        </a>
                        @endif
                    </div>

                    <!-- Overlay Background -->
                    <div id="overlay"
                        class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                        <!-- Payment Options -->
                        <div id="paymentOptions" class="hidden bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                            <p class="text-lg font-semibold mb-4">Choose Payment Method</p>
                            <button onclick="showFinalOptions()"
                                class="w-full py-2 bg-gray-200 text-black rounded-lg hover:bg-gray-300 transition mb-2">
                                Pay with Credit Card
                            </button>
                            <button onclick="showFinalOptions()"
                                class="w-full py-2 bg-gray-200 text-black rounded-lg hover:bg-gray-300 transition">
                                Pay with Cash
                            </button>
                        </div>

                        <!-- Final Options -->
                        <div id="finalOptions" class="hidden bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                            <p class="text-lg font-semibold mb-4">What would you like to do?</p>
                            <button onclick="showRatingForm()"
                                class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition mb-2">
                                Rate Us
                            </button>
                            <button onclick="cancelProcess()"
                                class="w-full py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                Cancel
                            </button>
                        </div>
                    </div>
                    <!-- Rating Form -->
                    <div id="ratingForm"
                        class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                            <p class="text-lg font-semibold mb-4">Rate Us</p>
                            <div class="flex justify-center mb-4" id="starContainer">
                                <span class="text-2xl cursor-pointer" onclick="setRating(1)">&#9733;</span>
                                <span class="text-2xl cursor-pointer" onclick="setRating(2)">&#9733;</span>
                                <span class="text-2xl cursor-pointer" onclick="setRating(3)">&#9733;</span>
                                <span class="text-2xl cursor-pointer" onclick="setRating(4)">&#9733;</span>
                                <span class="text-2xl cursor-pointer" onclick="setRating(5)">&#9733;</span>
                            </div>
                            <progress id="ratingProgress" class="w-full mb-4" max="5" value="0"></progress>
                            <textarea id="comment" class="w-full p-2 border rounded-md"
                                placeholder="Leave a comment..."></textarea>
                            <form method="POST" action="{{route('rate.website')}}" onsubmit="return submitRating()">
                                @csrf
                                <input type="hidden" name="rating" id="ratingValue">
                                <input type="hidden" name="comment" id="commentValue">
                                <button type="submit"
                                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                    Confirm
                                </button>
                            </form>
                            <button onclick="cancelProcess()"
                                class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>


                <script>
                    let selectedRating = 0;

                    function showPaymentOptions() {
                        document.getElementById("overlay").classList.remove("hidden");
                        document.getElementById("paymentOptions").classList.remove("hidden");
                    }

                    function showFinalOptions() {
                        document.getElementById("paymentOptions").classList.add("hidden");
                        document.getElementById("finalOptions").classList.remove("hidden");
                    }

                    function showRatingForm() {
                        document.getElementById("finalOptions").classList.add("hidden");
                        document.getElementById("ratingForm").classList.remove("hidden");
                    }

                    function setRating(rating) {
                        selectedRating = rating;
                        document.getElementById("ratingProgress").value = rating;
                        document.getElementById("ratingValue").value = rating;
                        let stars = document.querySelectorAll("#starContainer span");
                        stars.forEach((star, index) => {
                            star.style.color = index < rating ? "gold" : "gray";
                        });
                    }

                    function submitRating() {
                        document.getElementById("commentValue").value = document.getElementById("comment").value;
                        return true;
                    }

                    function cancelProcess() {
                        document.getElementById("overlay").classList.add("hidden");
                        document.getElementById("paymentOptions").classList.add("hidden");
                        document.getElementById("finalOptions").classList.add("hidden");
                        document.getElementById("ratingForm").classList.add("hidden");
                    }
                </script>
</body>

</html>