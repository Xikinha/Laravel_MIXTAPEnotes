@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-8 ml-16 text-3xl">Welcome, {{ auth()->user()->username }}!</h1>

        <div class="mx-auto mt-8 mb-10 w-full max-w-lg">
            <div class="flex min-h-full items-center justify-start bg-white">
                <form class="mt-0 w-full" method="POST" action="{{ route('search') }}">
                    @csrf
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="relative col-span-2">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="search" id="default-search" name="query" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-600 focus:border-green-600" placeholder="Search for track..." required>
                            <button type="submit" class="text-white text-sm font-semibold absolute right-3.5 bottom-1 bg-black hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="flex justify-center">
            <p class="font-semibold">Tracks you might like to add</p>
        </div>

        <div class="flex flex-wrap mt-0 ml-16 mr-16 mb-8 justify-center">
            <div class="w-72 m-2 bg-black rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <form method="POST" action="{{ route('storeTrack') }}">
                    @csrf
                    <div class="object-center mt-4">
                        <img class="rounded-lg w-40 mx-auto" src="{{ $image_url }}" alt="Podcast image">
                        <input type="hidden" id="imageUrl" name="image_url" value="{{ $image_url }}">
                    </div>    
                    <strong><p class="ml-4 pt-2 text-white">{{ $track_title }}</p></strong>
                    <input type="hidden" id="trackTitle" name="track_title" value="{{ $track_title }}">
                    <p class="ml-4 pb-2 text-sm text-white">{{ $artist }} </p>
                    <input type="hidden" id="artist" name="artist" value="{{ $artist }}">
                    <div class="flex justify-center">
                        <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $track_uri; ?>" width="200" height="80" frameborder="0" allowtransparency="true"></iframe>
                        <input type="hidden" id="trackUri" name="track_uri" value="{{ $track_uri }}">
                    </div>
                    <div class="flex flex-col items-center justify-center py-4">
                        <button type="submit" class="text-sm font-semibold mx-2 rounded-lg bg-white text-black px-2 py-2 hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700">Add</button>
                    </div>
                </form>
            </div>
        </div>
    
    @endauth

@endsection