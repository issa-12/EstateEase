@extends('layout.navBar')
@section('title')
Agent
@endsection
@section('posts')
@foreach ($agents as $agent)
    <!-- Agent Profile Card -->
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <div class="flex flex-col items-center">
            <!-- Agent Avatar (Placeholder) -->
            <img src="{{asset('../images/profiles/'.$agent->profile_picture)}}" alt="Agent Avatar" class="rounded-full w-32 h-32 mb-4">

            <!-- Agent Name -->
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{$agent->name}}</h2>

            <!-- Agent Email -->
            <p class="text-gray-600 text-sm mb-4">Email: <span class="text-blue-500"><a
                        href="mailto:{{$agent->email}}">{{$agent->email}}</a></span></p>

            <!-- Open Email App Link -->
            <a href="mailto:{{$agent->email}}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 focus:outline-none">Contact
                Agent</a>
        </div>  
    </div>
@endforeach
@endsection