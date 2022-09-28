<script src="//unpkg.com/alpinejs" defer></script>

<nav class="z-0 relative"
x-data="{open:false,menu:false, lokasi:false}">
  <div class="relative z-10 bg-black">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="flex items-center px-2 lg:px-0">
          <a class="flex-shrink-0 focus:outline-none" href="{{route('home')}}">
            <img class="block lg:hidden h-8" src="/images/MixtapeNotesLogo.png" alt="Logo of MIXTAPEnotes">
            <img class="hidden lg:block h-10" src="/images/MixtapeNotesLogo.png" alt="Logo of MIXTAPEnotes">
          </a>
          <div class="hidden sm:flex sm:ml-2">
            <div class="flex">
              @auth
                <a href="{{route('home')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">HOME</a>
                <a href="{{route('dashboard')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">DISCOVER</a>
                <a href="{{route('mixtape')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">MY MIXTAPE</a>
              @endauth
            </div>
          </div>
        </div>

        <div class="flex-1 sm:flex justify-center px-2 sm:ml-6 sm:justify-end hidden">
          @auth
            <a href="{{route('logout')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">LOGOUT</a>
          @else
            <a href="{{route('login')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">LOGIN</a>
            <a href="{{route('register')}}" class="ml-4 px-3 py-2 rounded-lg text-sm leading-5 font-medium text-white font-semibold hover:bg-green-600 hover:text-black transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:text-white focus:bg-gray-700">CREATE ACCOUNT</a>
          @endauth
        </div>

        <div class="flex sm:hidden">
          <button @click="menu=!menu" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out" aria-label="Main menu" aria-expanded="false">
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div x-show="menu" class="flex sm:hidden justify-center">
      <div class="px-2 pt-2 pb-3">
        @auth
          <a href="{{route('home')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">HOME</a>
          <a href="{{route('dashboard')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">DISCOVER</a>
          <a href="{{route('mixtape')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">MY MIXTAPE</a>
          <a href="{{route('logout')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">LOGOUT</a>
        @else
          <a href="{{route('register')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">CREATE ACCOUNT</a>
          <a href="{{route('login')}}" class="mt-1 block px-3 py-2 rounded-lg text-sm text-center font-medium text-white font-semibold hover:bg-green-600 hover:text-black focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">LOGIN</a>
        @endauth
      </div>
    </div>
  </div>
</nav>