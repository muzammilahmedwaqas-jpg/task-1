<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Details</h3>
                
                <div class="border-t border-gray-200 divide-y divide-gray-200">
                    <div class="py-3 flex justify-between">
                        <span class="font-medium text-gray-600">Full Name:</span>
                        <span class="text-gray-900">{{ $user->name }}</span>
                    </div>
                    <div class="py-3 flex justify-between">
                        <span class="font-medium text-gray-600">Email Address:</span>
                        <span class="text-gray-900">{{ $user->email }}</span>
                    </div>
                    <div class="py-3 flex justify-between">
                        <span class="font-medium text-gray-600">Phone Number:</span>
                        <span class="text-gray-900">{{ $user->phone ?? 'Not provided' }}</span>
                    </div>
                </div>

                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                        Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>