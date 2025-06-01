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

    <div class="flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-col w-64 bg-white border-r border-gray-200 min-h-screen">
            <div class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-sky-600 bg-sky-50 rounded-lg">
                            <span class="mr-3">🏠</span>
                            <span>Dashboard Overview</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">✍️</span>
                            <span>Write New Blog</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">📂</span>
                            <span>My Blog Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">🌄</span>
                            <span>Media Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">💬</span>
                            <span>Comments & Feedback</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">📊</span>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">🧳</span>
                            <span>My Trips / Itinerary</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-sky-50 hover:text-sky-600 rounded-lg">
                            <span class="mr-3">⚙️</span>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-50">
            <div class="py-6 px-4 sm:px-6 lg:px-8">
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
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-amber-100 text-amber-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Total Views</p>
                                <p class="text-2xl font-bold">3.4K</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Comments</p>
                                <p class="text-2xl font-bold">24</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 text-purple-500 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Destinations</p>
                                <p class="text-2xl font-bold">8</p>
                            </div>
                        </div>
                    </div>
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
                            
                            <div class="space-y-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4" alt="Bali" class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            10 Hidden Gems in Bali You Must Visit
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Published on May 15, 2023 • 1.2K views
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-sm font-medium text-sky-600 hover:text-sky-800">
                                        <a href="#">Edit</a>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1507501336603-6e31db2be093" alt="Santorini" class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            A Week in Santorini: The Ultimate Itinerary
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Published on April 28, 2023 • 876 views
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-sm font-medium text-sky-600 hover:text-sky-800">
                                        <a href="#">Edit</a>
                                    </div>
                                </div>
                                
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden">
                                        <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e" alt="Kyoto" class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            Cherry Blossom Season in Kyoto: A Photographer's Guide
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Published on March 12, 2023 • 1.5K views
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-sm font-medium text-sky-600 hover:text-sky-800">
                                        <a href="#">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- To-Do List -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-lg font-semibold mb-4">To-Do List</h3>
                            
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="todo-1" name="todo-1" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
                                    <label for="todo-1" class="ml-3 block text-sm font-medium text-gray-700">Write post about Iceland trip</label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="todo-2" name="todo-2" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
                                    <label for="todo-2" class="ml-3 block text-sm font-medium text-gray-700">Upload photos from Morocco</label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="todo-3" name="todo-3" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded" checked>
                                    <label for="todo-3" class="ml-3 block text-sm font-medium text-gray-500 line-through">Reply to comments</label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="todo-4" name="todo-4" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
                                    <label for="todo-4" class="ml-3 block text-sm font-medium text-gray-700">Plan next trip to Japan</label>
                                </div>
                                
                                <div class="flex items-center">
                                    <input id="todo-5" name="todo-5" type="checkbox" class="h-4 w-4 text-sky-600 focus:ring-sky-500 border-gray-300 rounded">
                                    <label for="todo-5" class="ml-3 block text-sm font-medium text-gray-700">Research Southeast Asia destinations</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Travel Map Section -->
                <div class="bg-white rounded-xl shadow p-6 mb-6">
                    <h3 class="text-lg font-semibold mb-4">Your Travel Map</h3>
                    <div class="bg-gray-100 rounded-lg h-64 flex items-center justify-center">
                        <p class="text-gray-500">Interactive travel map will be displayed here</p>
                        <!-- This would be replaced with an actual map component -->
                    </div>
                </div>
                
                <!-- Top Categories Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2" alt="Beach" class="h-32 w-full object-cover">
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900">Beaches</h4>
                            <p class="text-sm text-gray-500">4 posts</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4" alt="Mountains" class="h-32 w-full object-cover">
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900">Mountains</h4>
                            <p class="text-sm text-gray-500">3 posts</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c" alt="Cities" class="h-32 w-full object-cover">
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900">Cities</h4>
                            <p class="text-sm text-gray-500">5 posts</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1" alt="Food" class="h-32 w-full object-cover">
                        <div class="p-4">
                            <h4 class="font-medium text-gray-900">Food & Cuisine</h4>
                            <p class="text-sm text-gray-500">2 posts</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


