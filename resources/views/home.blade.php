@extends('components/layout')

@section('main')

    <h1 class="mt-20 ml-16 text-3xl">Create your online MIXTAPE with notes</h1>

    <div class="flex flex-col sm:flex-row mt-6 ml-16 mr-16">
        <div class="flex-none sm:w-1/2">
            <p class="mt-6 text-sm">Back in the day, mixtapes were a tool to share music that's special to you, convey your feelings to others or create a memento for special events in your life.</p>
            <p class="mt-4 text-sm">Nowadays, we have streaming services that provide overall more functionalities and ease accessibility to music.</p>
            <p class="mt-4 text-sm">When creating your mixtape you had a particular sequence in mind, which would be ruined by a shuffle feature.</p>
            <p class="mt-4 text-sm">MIXTAPEnotes allows you to create playlists with a fixed order and add personal notes to individual songs.</p>
        </div>
        <div class="flex-none m-auto sm:w-1/2">
            <img class="flex mx-auto my-4 w-3/4" src="/images/MixtapeNotesImg.png" alt="Image of MIXTAPE with note">
        </div>
    </div>
    <div class="flex items-center justify-center mt-2 sm:mt-16 py-4">
        @auth
            <a class="rounded-md bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('logout') }}">Logout</a>
        @else
            <div class="flex flex-col items-center justify-center">
                <a class="rounded-lg bg-black px-4 py-2 text-sm font-semibold text-white hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700" href="{{ route('login') }}">CREATE MIXTAPE</a>
                <p class="mt-4 content-center text-xs"><strong>Not registered?<span><a class="content-center text-xs text-green-600 hover:text-gray-900 focus:outline-none focus:text-gray-900 focus:bg-white" href="{{ route('register') }}"> Create your account here.</a></span></strong></p>
            </div>
        @endauth
    </div>

@endsection