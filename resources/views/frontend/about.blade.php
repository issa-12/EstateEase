@extends('layout.navbar')

@section('title', 'About Us')

@section('content')
<!-- Hero Section -->
<section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/about-bg.jpg') }}');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center h-full">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold drop-shadow-lg">About EstateEASE</h1>
    </div>
</section>

<!-- Our Mission Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Our Mission</h2>
        <p class="text-gray-600 text-center max-w-3xl mx-auto">
            At EstateEASE, we aim to simplify the process of buying, selling, and renting properties. Our mission is to
            connect people with their dream homes seamlessly through our innovative platform.
        </p>
    </div>
</section>

<!-- Team Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Meet Our Team</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/member1.avif') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-center text-gray-800"> Hassan Ibrahim</h3>
                <p class="text-center text-gray-600">Developer</p>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/member3.jpg') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-center text-gray-800">Issa Alayan</h3>
                <p class="text-center text-gray-600">CEO & Founder</p>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300">
                <img src="{{ asset('images/member2.jpg') }}" alt="Team Member" class="w-32 h-32 rounded-full mx-auto mb-4">
                <h3 class="text-2xl font-semibold text-center text-gray-800">Kareem Al hassanieh</h3>
                <p class="text-center text-gray-600">UI & UX Designer</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-4">Get in Touch</h2>
        <p class="text-xl mb-8">Have questions or want to learn more? Contact us today!</p>
        <a href="{{ route('contact') }}" class="inline-block bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition duration-300">
            Contact Us
        </a>
    </div>
</section>
@endsection
