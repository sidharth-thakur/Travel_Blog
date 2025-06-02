<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search..." class="w-64 px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-sky-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute right-3 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div class="relative">
                    <button class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </x-slot>

    <!-- Main Content -->
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-gray-50">
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-sky-400 to-blue-500 rounded-xl shadow-lg p-6 mb-6 text-white">
            <h2 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()?->name ?? 'Guest' }}!</h2>
            <p class="mb-4">Ready to share your next adventure with the world?</p>
            <a href="#" class="inline-block px-4 py-2 bg-white text-blue-600 rounded-lg font-medium hover:bg-blue-50 transition-colors">
                Write New Post
            </a>
        </div>
        
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-sky-100 text-sky-500 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Published Posts</p>
                        <p class="text-2xl font-bold">12</p>
                    </div>
                </div>
            </div>
            <!-- Other stat boxes remain the same -->
        </div>
        
        <!-- Recent Posts and To-Do Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Recent Posts -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Recent Posts</h3>
                        <a href="#" class="text-sky-600 hover:text-sky-800 text-sm">View All</a>
                    </div>
                    <!-- Post content remains the same -->
                </div>
            </div>
            
            <!-- To-Do List -->
            <div>
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold mb-4">To-Do List</h3>
                    <div class="space-y-3">
                        <!-- To-do items remain the same -->
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Travel History Cards -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4">Your Travel History</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Bali Card -->
                <div class="destination-card group rounded-xl overflow-hidden shadow-lg bg-white transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl cursor-pointer" x-data="{}" x-on:click="$dispatch('open-modal', 'destination-bali')" data-destination="destination-bali">
                    <div class="h-48 w-full relative overflow-hidden">
                        <img class="h-full w-full object-cover transition duration-700 ease-in-out group-hover:scale-110" src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1738&q=80" alt="Bali">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 text-white">
                            <h3 class="text-xl font-bold">Bali, Indonesia</h3>
                            <p class="text-sm">Visited April 2023</p>
                        </div>
                    </div>
                </div>
                
                <!-- Santorini Card -->
                <div class="destination-card group rounded-xl overflow-hidden shadow-lg bg-white transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl cursor-pointer" x-data="{}" x-on:click="$dispatch('open-modal', 'destination-santorini')" data-destination="destination-santorini">
                    <div class="h-48 w-full relative overflow-hidden">
                        <img class="h-full w-full object-cover transition duration-700 ease-in-out group-hover:scale-110" src="https://images.unsplash.com/photo-1570077188670-e3a8d69ac5ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80" alt="Santorini">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 text-white">
                            <h3 class="text-xl font-bold">Santorini, Greece</h3>
                            <p class="text-sm">Visited June 2022</p>
                        </div>
                    </div>
                </div>
                
                <!-- Kyoto Card -->
                <div class="destination-card group rounded-xl overflow-hidden shadow-lg bg-white transform transition duration-500 hover:-translate-y-2 hover:shadow-2xl cursor-pointer" x-data="{}" x-on:click="$dispatch('open-modal', 'destination-kyoto')" data-destination="destination-kyoto">
                    <div class="h-48 w-full relative overflow-hidden">
                        <img class="h-full w-full object-cover transition duration-700 ease-in-out group-hover:scale-110" src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1770&q=80" alt="Kyoto">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 text-white">
                            <h3 class="text-xl font-bold">Kyoto, Japan</h3>
                            <p class="text-sm">Visited October 2022</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add modals at the bottom of the page -->
    <x-modal name="destination-bali" :show="false" maxWidth="2xl">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-bold text-gray-900">Bali, Indonesia</h2>
                <button x-on:click="$dispatch('close-modal', 'destination-bali')" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="bali-weather" class="mb-4 p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-gray-600">Loading weather data...</p>
            </div>
            <p class="text-gray-600 mb-4">Your trip to Bali in April 2023 was amazing! You visited beautiful beaches, rice terraces, and spiritual temples.</p>
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Highlights</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Ubud Sacred Monkey Forest</li>
                    <li>Tegallalang Rice Terraces</li>
                    <li>Uluwatu Temple</li>
                    <li>Seminyak Beach</li>
                </ul>
            </div>
        </div>
    </x-modal>

    <x-modal name="destination-santorini" :show="false" maxWidth="2xl">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-bold text-gray-900">Santorini, Greece</h2>
                <button x-on:click="$dispatch('close-modal', 'destination-santorini')" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="santorini-weather" class="mb-4 p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-gray-600">Loading weather data...</p>
            </div>
            <p class="text-gray-600 mb-4">Your trip to Santorini in June 2022 was unforgettable! You explored white-washed villages and stunning caldera views.</p>
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Highlights</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Oia Sunset</li>
                    <li>Fira Town</li>
                    <li>Red Beach</li>
                    <li>Akrotiri Archaeological Site</li>
                </ul>
            </div>
        </div>
    </x-modal>

    <x-modal name="destination-kyoto" :show="false" maxWidth="2xl">
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-3xl font-bold text-gray-900">Kyoto, Japan</h2>
                <button x-on:click="$dispatch('close-modal', 'destination-kyoto')" class="text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="kyoto-weather" class="mb-4 p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-gray-600">Loading weather data...</p>
            </div>
            <p class="text-gray-600 mb-4">Your trip to Kyoto in October 2022 was a cultural journey! You visited ancient temples, traditional gardens, and experienced Japanese hospitality.</p>
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3">Highlights</h3>
                <ul class="list-disc pl-5 space-y-2 text-gray-700">
                    <li>Fushimi Inari Shrine</li>
                    <li>Arashiyama Bamboo Grove</li>
                    <li>Kinkaku-ji (Golden Pavilion)</li>
                    <li>Gion District</li>
                </ul>
            </div>
        </div>
    </x-modal>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to fetch weather data
        function fetchWeather(location, elementId) {
            const apiKey = '{{ env('OPENWEATHER_API_KEY', '5f3f2a6d2f8f4a7e9b8c7d6e5f4e3d2c') }}';
            const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${location}&appid=${apiKey}&units=metric`;
            
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const weather = data.weather[0].description;
                    const temp = Math.round(data.main.temp);
                    const feelsLike = Math.round(data.main.feels_like);
                    const humidity = data.main.humidity;
                    
                    document.getElementById(elementId).innerHTML = `
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-800">Current Weather</p>
                                <p class="text-sm text-gray-600 capitalize">${weather}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gray-800">${temp}°C</p>
                                <p class="text-xs text-gray-600">Feels like: ${feelsLike}°C</p>
                                <p class="text-xs text-gray-600">Humidity: ${humidity}%</p>
                            </div>
                        </div>
                    `;
                })
                .catch(error => {
                    console.error('Error fetching weather:', error);
                    document.getElementById(elementId).innerHTML = '<p>Failed to load weather data</p>';
                });
        }
        
        // Load weather data when modals are opened
        window.addEventListener('open-modal', function(event) {
            const modalName = event.detail;
            
            if (modalName === 'destination-bali') {
                fetchWeather('Denpasar,ID', 'bali-weather');
            } else if (modalName === 'destination-santorini') {
                fetchWeather('Santorini,GR', 'santorini-weather');
            } else if (modalName === 'destination-kyoto') {
                fetchWeather('Kyoto,JP', 'kyoto-weather');
            }
        });
    });
</script>

