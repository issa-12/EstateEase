@extends('layout.navbar')

@section('title', 'Contact Us')
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/contact-bg.jpg') }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold drop-shadow-lg">Contact Us</h1>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Get in Touch</h2>
        <p class="text-gray-600 text-center max-w-2xl mx-auto mb-12">
            Have questions or inquiries? Feel free to reach out to us by filling out the form below. Our team will get back to you promptly!
        </p>

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" required
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 ">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Your Email</label>
                    <input type="email" id="email" name="email" placeholder="john@example.com" required
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 ">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Type your message here..." required
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2"></textarea>
                </div>
                <div class="text-center">
                <button type="submit" class="text-white font-semibold text-lg shadow-lg bg-[#3052dc] rounded-full px-6 py-3 hover:bg-blue-700 transition duration-300">
                    Send Message
                </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-8">Our Contact Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Address -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <span class="block text-4xl text-blue-600 mb-4">
                    📍
                </span>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Our Address</h3>
                <p class="text-gray-600">123 Main Street, City, Country</p>
            </div>
            <!-- Phone -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <span class="block text-4xl text-blue-600 mb-4">
                    📞
                </span>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Phone Number</h3>
                <p class="text-gray-600">+123 456 7890</p>
            </div>
            <!-- Email -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <span class="block text-4xl text-blue-600 mb-4">
                    ✉️
                </span>
                <h3 class="text-2xl font-semibold text-gray-800 mb-2">Email Address</h3>
                <p class="text-gray-600">contact@example.com</p>
            </div>
        </div>
    </div>
</section>
@endsection
