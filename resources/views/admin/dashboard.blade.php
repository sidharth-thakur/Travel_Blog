<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome to the Travel Blog Admin Panel</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                            <h4 class="text-sm font-medium text-blue-800 mb-1">Total Users</h4>
                            <p class="text-2xl font-bold">{{ $userCount ?? 0 }}</p>
                        </div>
                        <!-- Add more stat cards here as needed -->
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('admin.users') }}" class="block p-6 bg-purple-50 rounded-lg border border-purple-200 hover:bg-purple-100 transition">
                            <h4 class="text-xl font-semibold mb-2">Users</h4>
                            <p class="text-gray-600">Manage registered users</p>
                        </a>
                        
                        <a href="{{ route('admin.destinations') }}" class="block p-6 bg-amber-50 rounded-lg border border-amber-200 hover:bg-amber-100 transition">
                            <h4 class="text-xl font-semibold mb-2">Destinations</h4>
                            <p class="text-gray-600">Manage travel destinations</p>
                        </a>
                        
                        <a href="{{ route('admin.posts') }}" class="block p-6 bg-blue-50 rounded-lg border border-blue-200 hover:bg-blue-100 transition">
                            <h4 class="text-xl font-semibold mb-2">Blog Posts</h4>
                            <p class="text-gray-600">Manage travel guides and blog posts</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>