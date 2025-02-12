<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
  <!-- Top Bar -->
  <form action="" method="post" enctype="multipart/form-data" id="update_profile" style="display: none">
    @csrf
    <input type="file" name="file" id="file" onchange="document.getElementById('update_profile').submit();">
  </form>
  <form action="{{route('delete.profile')}}" id="delete_prof" method="post">
    @csrf
  </form>
  
  <div class="bg-blue-600 text-white p-4 flex items-center justify-between">
    <!-- Profile info section -->
    <div class="flex items-center space-x-4">
      <img id="profile-photo" src="{{asset('../images/profiles/' . Auth::user()->profile_picture)}}" alt="Profile Photo"
        class="rounded-full w-24 h-24 cursor-pointer object-cover">
      <div>
        <h1 class="text-xl font-semibold">{{Auth::user()->name}}</h1>
        <p class="text-sm">{{Auth::user()->email}}</p>
        <p class="text-sm">Posts: {{Auth::user()->posts->count()}}</p>
      </div>
    </div>
    <!-- Links -->
    <div class="space-x-4">
      <a href="{{route('home')}}" class="text-white">Home</a>
      <a href="{{route('show.addpost')}}" class="text-white">Add Post</a>
      @if (!strcmp(Auth::user()->type,'admin'))
      <a target="_blank" href="{{route('show.dashboard.admin')}}" class="text-white">Dashboard</a>
      @endif
      
    </div>
  </div>

  <!-- Profile Photo Options Popup -->
  <div id="profile-options" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
    <div class="bg-white p-4 rounded-lg space-y-2">
      <button id="update-profile" onclick="document.getElementById('file').click()"
        class="w-full bg-blue-600 text-white py-2 rounded">Update Profile</button>
      <button id="delete-profile" onclick="document.getElementById('delete_prof').submit()"
        class="w-full bg-red-600 text-white py-2 rounded">Delete Profile</button>
      <button id="close-options" class="w-full bg-gray-300 text-black py-2 rounded">Cancel</button>
    </div>
  </div>

  <!-- Grid View with Cards -->
  <div class="p-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <!-- Card 1 -->
      @foreach ($posts as $post)
      <form style="display: none" action="{{route('delete.post',$post->id)}}" id="delete_post{{$post->id}}" method="post">
        @csrf
        @method('delete')
      </form>
      <div class="bg-white p-4 rounded-lg shadow-lg">
      <div class="relative">
        <!-- Three dots for options -->
        <button class="absolute top-2 right-2 text-gray-500 text-2xl" onclick="showCardOptions(0)">...</button>
      </div>
      <a href="">
        <img src="{{asset('../images/posts/' . $post->image)}}" alt="Item Photo"
        class="w-full h-48 object-cover rounded-lg">
        <h2 class="mt-4 text-lg font-semibold">{{$post->title}}</h2>
        <p class="text-sm text-gray-600">{{$post->description}}</p>
        <p class="text-sm mt-2">Address: {{$post->address}}</p>
        <p class="text-sm mt-1 font-semibold text-green-600">Price: ${{$post->price}}</p>
        <p class="text-sm mt-1 text-blue-600">For {{$post->type}}</p>
      </a>
      </div>
      <!-- Card Options Popup -->
      <div id="card-options" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
      <div class="bg-white p-4 rounded-lg space-y-2">
        <form method="get" action="{{route('show.edit.post',$post->id)}}">
          @csrf
          <input type="submit" value="Update" id="update-card" class="w-full bg-blue-600 text-white py-2 rounded">
        </form>
        <button id="delete-card" class="w-full bg-red-600 text-white py-2 rounded">Delete</button>
        <button id="close-card-options" class="w-full bg-gray-300 text-black py-2 rounded">Cancel</button>
      </div>
      </div>

      <!-- Delete Confirmation Popup -->
      <div id="delete-popup" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50">
      <div class="bg-white p-6 rounded-lg space-y-4 w-96">
        <h3 class="text-lg font-semibold">Are you sure you want to delete?</h3>
        <div class="flex space-x-4">
        <button onclick="document.getElementById('delete_post{{$post->id}}').submit()" id="confirm-delete" class="bg-red-600 text-white py-2 px-4 rounded">Yes, Delete</button>
        <button id="cancel-delete" class="bg-gray-300 text-black py-2 px-4 rounded">Cancel</button>
        </div>
      </div>
      </div>
    @endforeach
    </div>
  </div>



  <script>
    // Toggle profile photo options
    document.getElementById("profile-photo").addEventListener("click", function () {
      document.getElementById("profile-options").classList.remove("hidden");
    });

    document.getElementById("close-options").addEventListener("click", function () {
      document.getElementById("profile-options").classList.add("hidden");
    });

    // Handle card options
    let selectedCard = null;
    function showCardOptions(cardIndex) {
      selectedCard = cardIndex;
      document.getElementById("card-options").classList.remove("hidden");
    }

    document.getElementById("close-card-options").addEventListener("click", function () {
      document.getElementById("card-options").classList.add("hidden");
    });

    document.getElementById("delete-card").addEventListener("click", function () {
      document.getElementById("card-options").classList.add("hidden");
      document.getElementById("delete-popup").classList.remove("hidden");
    });

    document.getElementById("cancel-delete").addEventListener("click", function () {
      document.getElementById("delete-popup").classList.add("hidden");
    });

    document.getElementById("confirm-delete").addEventListener("click", function () {
      // Handle the deletion of the card (remove from the UI or API)
      console.log(`Deleted card: ${selectedCard}`);
      document.getElementById("delete-popup").classList.add("hidden");
    });
  </script>
</body>

</html>