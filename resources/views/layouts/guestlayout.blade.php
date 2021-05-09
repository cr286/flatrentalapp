<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Rent Flat Nepal</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
  
<main class="dark:bg-gray-800 bg-white relative overflow-scrollable h-screen">
    <header class="h-24 sm:h-32 flex items-center z-30 w-full">
        <div class="container mx-auto px-6 flex items-center justify-between">
            <div class="uppercase text-gray-800 dark:text-white font-black text-3xl">
                Rent Flat Nepal
            </div>
            <div class="flex items-center">
                <nav class="font-sen text-gray-800 dark:text-white uppercase text-lg lg:flex items-center hidden">
                    <a href="/" class="py-2 px-6 flex">
                        Home
                    </a>
                    <a href="/apartmentlist/" class="py-2 px-6 flex">
                        Search Apartments
                    </a> 
                    <a href="#" class="py-2 px-6 flex">
                        Contact Us
                    </a>
                    <a href="/login/" class="py-2 px-6 flex">
                        Sign In
                    </a>
                </nav>
                <button class="lg:hidden flex flex-col ml-4">
                    <span class="w-6 h-1 bg-gray-800 dark:bg-white mb-1">
                    </span>
                    <span class="w-6 h-1 bg-gray-800 dark:bg-white mb-1">
                    </span>
                    <span class="w-6 h-1 bg-gray-800 dark:bg-white mb-1">
                    </span>
                </button>
            </div>
        </div>
    </header>
        @yield('content')
</main>

</body>
</html>