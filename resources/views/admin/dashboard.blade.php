<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard - Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Member Directory</h3>
                    <p class="text-sm text-gray-500">Click on any member row or action button to view and download their documents.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm divide-y divide-gray-200">
                        <thead class="bg-gray-50 text-gray-600 font-semibold">
                            <tr>
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Phone</th>
                                <th class="py-3 px-4 text-center">Files Uploaded</th>
                                <th class="py-3 px-4 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($members as $m)
                                <tr class="hover:bg-indigo-50/50 cursor-pointer transition" onclick="window.location='{{ route('admin.members.show', $m) }}'">
                                    <td class="py-3.5 px-4 font-semibold text-gray-900">
                                        {{ $m->name }}
                                    </td>
                                    <td class="py-3.5 px-4 text-gray-600">
                                        {{ $m->email }}
                                    </td>
                                    <td class="py-3.5 px-4 text-gray-500">
                                        {{ $m->phone ?? 'N/A' }}
                                    </td>
                                    <td class="py-3.5 px-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                                            {{ $m->documents->count() }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 px-4 text-right">
                                        <a href="{{ route('admin.members.show', $m) }}" class="inline-flex items-center px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-black text-xs font-medium rounded transition">
                                            View Documents
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 text-center text-gray-400">
                                        No members registered yet.
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