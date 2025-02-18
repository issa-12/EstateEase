<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6">
  <form method="post" id="updateProfile" action="{{route('update.profile')}}" enctype="multipart/form-data" class="hidden">
    @csrf
      <input type="file" name="file" id="chooseFile" onchange="document.getElementById('updateProfile').submit();">
  </form>
  <form method="post" id="deleteProfile" action="{{route('delete.profile')}}" class="hidden">
    @csrf
  </form>
    <!-- Back Arrow -->
    <a href="javascript:history.back()" class="absolute top-4 left-4 text-gray-700 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </a>
    
    <!-- Profile Picture -->
    <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-blue-500 mb-6">
        <img src="{{asset('../images/profiles/'.Auth::user()->profile_picture)}}" alt="Admin User" class="w-full h-full object-cover">
    </div>
    
    <!-- Profile Details -->
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg text-center">
        <h2 class="text-2xl font-semibold text-gray-800">{{Auth::user()->name}}</h2>
        <p class="text-gray-600 mt-2">{{Auth::user()->email}}</p>
        <div class="mt-6 space-y-3">
            <button onclick="showManageOptions()" class="block w-full px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                <i class="fa fa-cog" aria-hidden="true"></i> Manage Profile
            </button>
            <a href="http://localhost/Real_Estate_Site-main/public/user/chng-password" 
               class="block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                <i class="fas fa-key"></i> Change Password
            </a>
        </div>
    </div>

    <!-- Manage Profile Options -->
    <div id="manageOptions" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-80 text-center">
            <h3 class="text-lg font-semibold">Manage Profile</h3>
            <div class="mt-4 space-y-3">
                <a onclick="document.getElementById('chooseFile').click()" class="block px-4 py-2 bg-green-500 cursor-pointer text-white rounded-md hover:bg-green-600 transition">Update Profile</a>
                <a onclick="document.getElementById('deleteProfile').submit();" class="block px-4 py-2 bg-red-500 cursor-pointer text-white rounded-md hover:bg-red-600 transition">Delete Profile</a>
                <button onclick="closeManageOptions()" class="block w-full px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400 transition">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        function showManageOptions() {
            document.getElementById('manageOptions').classList.remove('hidden');
        }
        function closeManageOptions() {
            document.getElementById('manageOptions').classList.add('hidden');
        }
    </script>
</body>
</html>