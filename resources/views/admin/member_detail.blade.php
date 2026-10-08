<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Documents: ') }} {{ $member->name }}
            </h2>
            <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-indigo-600 hover:underline">
                &larr; Back to Member List
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Member Info Card -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-3">Member Overview</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500 block text-xs">Name</span>
                        <span class="font-semibold text-gray-900">{{ $member->name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block text-xs">Email</span>
                        <span class="font-semibold text-gray-900">{{ $member->email }}</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block text-xs">Phone</span>
                        <span class="font-semibold text-gray-900">{{ $member->phone ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- Documents Table Card -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4">Uploaded PDF Files</h3>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-600 font-semibold">
                            <tr>
                                <th class="py-3 px-4">Filename</th>
                                <th class="py-3 px-4">Uploaded At</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($member->documents as $doc)
                                <tr>
                                    <td class="py-3 px-4 font-medium text-gray-900">
                                        {{ $doc->filename }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-500">
                                        {{ $doc->created_at->format('M d, Y - h:i A') }}
                                    </td>
                                    <td class="py-3 px-4 text-right">
                                        <a href="{{ route('document.download', $doc) }}"
                                           class="inline-flex items-center px-3 py-1.5 bg-gray-900 hover:bg-gray-700 text-white text-xs font-medium rounded transition">
                                            Download File
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-6 text-center text-gray-400 italic">
                                        This member has not uploaded any documents yet.
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