@extends('components/layout')

@section('main')

    @auth

        <h1 class="mt-10 mb-4 ml-16 text-3xl">{{ auth()->user()->username }}'s mixtape</h1>

        @if($empty)

            <p class="ml-16 mr-16 py-4">You have no tracks on your mixtape. <span><a class="text-green-600 hover:text-gray-900" href="{{ route('dashboard') }}">Click here</a> to discover new tracks.</span></p>

        @else

            <div class="flex flex-wrap ml-16 mr-16 mb-8 justify-center">
                @foreach ($mixtapes as $mixtape)
                    <div class="w-72 m-2 mb-8 bg-black rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="object-center mt-4">
                            <img class="rounded-lg w-40 mx-auto" src="{{ $mixtape->image_url }}" alt="Mixtape image">
                        </div>    
                        <strong><p class="ml-4 pt-2 text-white"> {{ $mixtape->track }}</p></strong>
                        <p class="ml-4 pb-2 text-sm text-white">{{ $mixtape->artist }} </p>
                        <div class="flex justify-center">
                            <iframe src="<?php echo 'https://embed.spotify.com/?uri=' . $mixtape->track_uri; ?>" width="250" height="80" frameborder="0" allowtransparency="true"></iframe>
                        </div>
                        <div class="flex flex-col items-center justify-center py-4">
                            <form method="POST" action="{{ route('delete', $mixtape->id) }}">
                                @csrf
                                <a class="rounded-lg text-sm font-semibold bg-white mx-2 px-2 py-2 text-black hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('show', $mixtape->id) }}">Show</a>
                                <a class="rounded-lg text-sm font-semibold bg-white mx-2 px-2 py-2 text-black hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('edit', $mixtape->id) }}">Add notes</a>
                                <a class="rounded-lg text-sm font-semibold bg-white mx-2 px-2 py-2 text-black hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('delete', $mixtape->id) }}">Delete</a>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif

    @else

        <h1 class="mt-10 mb-4 ml-16 text-3xl">Welcome</h1>

        <p class="ml-16 mr-16 py-4">You have to login to access your mixtape. <span><a class="underline text-green-600 hover:text-gray-900" href="{{ route('login') }}">Click here</a> to login.</span></p>

    @endauth

@endsection