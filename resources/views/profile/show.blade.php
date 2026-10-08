<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Success Alert -->
            @if (session('status'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <!-- 1. Personal Details Card -->
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
                    <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700 transition">
                        Edit Settings
                    </a>
                </div>
            </div>

            <!-- 2. Document Upload Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-1">Upload Document</h3>
                <p class="text-sm text-gray-500 mb-4">Upload PDF files only (Maximum file size: 5 MB).</p>

                <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                        <div class="w-full sm:w-auto flex-1">
                            <input type="file" name="document"
                                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer border border-gray-300 rounded-md p-1" />
                            @error('document')
                                <p class="text-red-600 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-black text-sm font-medium rounded-md transition shadow-sm">
                            Upload File
                        </button>
                    </div>
                </form>
            </div>

            <!-- 3. Documents List Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">My Uploaded Documents</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-600 font-semibold">
                            <tr>
                                <th class="py-3 px-4">Document Name</th>
                                <th class="py-3 px-4">Uploaded Date</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($user->documents as $doc)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-3 px-4 font-medium text-gray-900">
                                        {{ $doc->filename }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-500">
                                        {{ $doc->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <a href="{{ route('document.download', $doc) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-white text-xs font-medium rounded-md transition">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-6 text-center text-gray-400 italic">
                                        No documents uploaded yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>