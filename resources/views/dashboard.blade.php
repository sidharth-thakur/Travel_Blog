<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            
            @if (Auth::user()->email === 'sidharththakur@gmail.com')
                <div class="mt-4 bg-green-50 p-4 rounded-lg border border-green-200">
                    <p class="text-green-700">You have admin access.</p>
                    <div class="mt-2">
                        <p>Try these links:</p>
                        <ul class="list-disc ml-5 mt-1">
                            <li><a href="{{ route('admin.dashboard') }}" class="text-green-800 underline">Admin Dashboard (using route)</a></li>
                            <li><a href="/admin" class="text-green-800 underline">Admin Dashboard (direct URL)</a></li>
                            <li><a href="{{ route('admin.test') }}" class="text-green-800 underline">Admin Test (no middleware)</a></li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<div class="mt-4">
    <p>If the admin link isn't working, try these direct links:</p>
    <ul class="list-disc ml-5 mt-2">
        <li><a href="/admin" class="text-blue-600 hover:underline">Admin Dashboard</a></li>
        <li><a href="/admin/users" class="text-blue-600 hover:underline">Admin Users</a></li>
    </ul>
</div>




