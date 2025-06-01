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
                    <h3 class="text-lg font-medium mb-4">Welcome to the Admin Dashboard</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="font-medium mb-2">User Management</h4>
                            <p class="text-sm text-gray-600 mb-3">Manage users and permissions</p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:underline text-sm">Manage Users →</a>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $userCount ?? 0 }} Users</span>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="font-medium mb-2">Content Management</h4>
                            <p class="text-sm text-gray-600 mb-3">Manage blog posts and pages</p>
                            <a href="#" class="text-blue-600 hover:underline text-sm">Manage Content →</a>
                        </div>
                    </div>
                    
                    @if(isset($latestUsers) && $latestUsers->count() > 0)
                        <div class="mt-8">
                            <h4 class="font-medium mb-3">Latest Registered Users</h4>
                            <div class="bg-white rounded-lg border border-gray-200">
                                <ul class="divide-y divide-gray-200">
                                    @foreach($latestUsers as $user)
                                        <li class="px-4 py-3">
                                            <div class="flex justify-between">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $user->created_at->format('M d, Y') }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('admin.users') }}" class="text-sm text-blue-600 hover:underline">View all users →</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



