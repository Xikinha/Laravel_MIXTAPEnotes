@extends('components/layout')

@section('main')
    <div class="flex justify-center">
        <h1 class="mt-12 text-3xl">CREATE ACCOUNT</h1>
    </div>

    <div class="mx-auto my-10 w-full max-w-lg">
        <div class="flex min-h-full items-center justify-start bg-white">

            <form class="mt-0" method="POST" action="{{ route('registerSubmit') }}">
                @csrf
                @if (Session::has('success'))
                    <div class="text-green-500 py-4">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                @if (Session::has('error'))
                    <p class="text-red-500 py-4">{{ Session::get('error') }}</p>
                @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="relative z-0 col-span-2">
                        <input type="text" value="{{ old('username') }}" name="username" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-green-600 focus:outline-none focus:ring-0" placeholder=" " required/>
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-green-600 peer-focus:dark:text-green-500">Your username</label>
                        @if ($errors->has('username'))
                            <span class="text-red-500 text-xs">{{$errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input type="text" value="{{ old('email') }}" name="email" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-green-600 focus:outline-none focus:ring-0" placeholder=" " required/>
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-green-600 peer-focus:dark:text-green-600">Your email</label>
                        @if ($errors->has('email'))
                            <span class="text-red-500 text-xs">{{$errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input type="password" name="password" class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-green-600 focus:outline-none focus:ring-0" placeholder=" " required/>
                        <label class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-green-600 peer-focus:dark:text-green-600">Your password</label>
                        @if ($errors->has('password'))
                            <span class="text-red-500 text-xs">{{$errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="relative z-0 col-span-2">
                        <input id="privacy-checkbox" name="policy" type="checkbox" value="1" class="w-4 h-4 text-green-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                        <label for="privacy-checkbox" class="ml-2 text-xs text-gray-900 dark:text-gray-300">I accept the privacy policy and consent to the processing of my personal information.</label>
                        @if ($errors->has('policy'))
                            <p class="text-red-500 text-xs">{{$errors->first('policy') }}</p>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col items-center justify-center py-4">
                    <button type="submit" class="mt-5 rounded-md bg-black px-4 py-2 text-white hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700">Sign up</button>
                    <p class="mt-4 content-center text-xs"><strong>Already registered?<span><a class="content-center text-xs text-green-600 hover:text-gray-900 focus:outline-none" href="{{ route('login') }}"> Login here.</a></span></strong></p>
    	        </div>
            </form>
        </div>
    </div>

@endsection