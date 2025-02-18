@extends('layout.navBar')
@section('title')
    Agent
@endsection
@section('posts')
    <div class="container mx-auto px-4 py-8">
        <!-- Flex container to display cards side by side -->
        <div class="flex flex-wrap justify-center gap-9  ">
            @foreach ($agents as $agent)
                <div class="group bg-white rounded-lg shadow-lg overflow-hidden h-full mh-80 w-80 flex flex-col justify-between transition duration-300 gap-4 mx-5 hover:shadow-2xl">
                    <img src="{{asset('../images/profiles/' . $agent->profile_picture)}}" alt="Agent"
                        class="w-full h-38 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold mb-1">
                          {{$agent->name}}
                        </h3>
                        <span class="block text-gray-500 mb-4">Real Estate Agent</span>
                        @if ($agent->reviews->avg('review'))
                        <p class="text-yellow-500 mb-2">
                            <span class="font-bold">Rating:</span> 
                            {{ rtrim(rtrim(number_format($agent->reviews->avg('review'), 2), '0'), '.') }} / 5
                        </p>
                        @else
                            <p class="text-gray-500 italic mb-2">Not Rated Yet</p>
                        @endif
                        <div class="flex items-center space-x-4 mt-4 justify-center">
                            <!-- View Agent Button -->
                            <a href="{{ route('show.agent') }}" 
                               class="inline-block px-4 py-2 rounded-full text-blue-600 border border-blue-600 hover:bg-blue-600 hover:text-white transition duration-300">
                                View Agent
                            </a>
                            <!-- Rate Agent Button -->
                            <button onclick="showRatingForm({{ $agent->id }})"
                                class="inline-block px-4 py-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-600 transition duration-300 shadow-md">
                                Rate
                            </button>
                        </div>
                        <ul class="flex justify-center space-x-4 pt-4">
                            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-twitter text-xl"></i></a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-facebook-f text-xl"></i></a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-linkedin-in text-xl"></i></a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-instagram text-xl"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Rating Form (Hidden Initially) -->
                <div id="ratingForm-{{$agent->id}}"
                    class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
                        <p class="text-lg font-semibold mb-4">Review agent</p>
                        <div class="flex justify-center mb-4" id="starContainer-{{$agent->id}}">
                            <span class="text-2xl cursor-pointer" onclick="setRating({{$agent->id}},1)">&#9733;</span>
                            <span class="text-2xl cursor-pointer" onclick="setRating({{$agent->id}},2)">&#9733;</span>
                            <span class="text-2xl cursor-pointer" onclick="setRating({{$agent->id}},3)">&#9733;</span>
                            <span class="text-2xl cursor-pointer" onclick="setRating({{$agent->id}},4)">&#9733;</span>
                            <span class="text-2xl cursor-pointer" onclick="setRating({{$agent->id}},5)">&#9733;</span>
                        </div>
                        <form method="POST" action="{{route('review.agent', $agent->id)}}">
                            @csrf
                            <input type="hidden" name="rating" id="ratingValue-{{$agent->id}}">
                            <button type="submit"
                                class="mt-4 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                Confirm
                            </button>
                        </form>
                        <button onclick="cancelProcess({{$agent->id}})"
                            class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Cancel
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function showRatingForm(agentid) {
            document.getElementById("ratingForm-"+agentid).classList.remove("hidden");
        }
    
        function setRating(agentid,rating) {
            selectedRating = rating;
            document.getElementById("ratingValue-"+agentid).value = rating;
            let stars = document.querySelectorAll("#starContainer-"+agentid+" span");
            stars.forEach((star, index) => {
                star.style.color = index < rating ? "gold" : "gray";
            });
        }
    
        function cancelProcess(agentid) {
            document.getElementById("ratingForm-"+agentid).classList.add("hidden");
        }
    </script>
@endsection