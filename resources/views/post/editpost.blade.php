<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 py-12">

    <!-- Main Form Container -->
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg p-8 space-y-6">

        <!-- Title -->
        <h1 class="text-3xl font-bold text-gray-800 text-center">Post Your Properties</h1>

        <!-- Product Form -->
        <form action="{{route('edit.post',$post->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <!-- Title Input -->
            <div>
                <label for="title" class="block text-gray-700 font-medium">Properties Title</label>
                <input type="text" id="title" name="title" value="{{$post->title}}" placeholder="Enter the product title"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description Input -->
            <div>
                <label for="description" class="block text-gray-700 font-medium">Properties Description</label>
                <textarea id="description" name="description"  placeholder="Enter the product description" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{$post->description}}</textarea>
            </div>

            <!-- Address Input -->
            <div>
                <label for="address" class="block text-gray-700 font-medium">Address</label>
                <input type="text" id="address" name="address" value="{{$post->address}}" placeholder="Enter the location"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Image Input -->
            <div>
                <label for="image" class="block text-gray-700 font-medium">Properties Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Bedrooms Input -->
            <div>
                <label for="bedrooms" class="block text-gray-700 font-medium">Number of Bedrooms(default 1)</label>
                <input type="number" id="bedrooms"  name="bedrooms" min="1" value="{{$post->beds}}" step="1"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Bathrooms Input -->
            <div>
                <label for="bathrooms" class="block text-gray-700 font-medium">Number of Bedrooms(default 1)</label>
                <input type="number" id="bathrooms" name="bathrooms" min="1" value="{{$post->baths}}" step="1"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Price Input -->
            <div>
                <label for="price" class="block text-gray-700 font-medium">Price</label>
                <input type="number" id="price" name="price" value="{{$post->price}}" placeholder="Enter the price"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Type (Rent or Sell) -->
            <div>
                <label for="type" class="block text-gray-700 font-medium">Type</label>
                <div class="flex space-x-4">
                    <label class="inline-flex items-center">
                        <input @if ($post->type == 'sell') 
                            checked
                        @endif type="radio" id="for_sale" name="type" value="sell"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">For Sale</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" id="for_rent" @if ($post->type == 'rent') 
                        checked
                    @endif  name="type" value="rent"
                            class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">For Rent</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Confirm Editing"
                    class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none">
            </div>

        </form>
    </div>

</body>

</html>