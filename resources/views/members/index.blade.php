<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Registered Members List') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    {{ __('View all registered members in the system.') }}
                </p>
            </div>
            <div class="flex items-center">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                    Total: {{ $members->count() }} {{ \Illuminate\Support\Str::plural('member', $members->count()) }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                            <thead class="bg-gray-50 text-gray-600 font-semibold text-xs uppercase tracking-wider">
                                <tr>
                                    <th scope="col" class="py-3 px-4">ID</th>
                                    <th scope="col" class="py-3 px-4">Name</th>
                                    <th scope="col" class="py-3 px-4">Email</th>
                                    <th scope="col" class="py-3 px-4">Phone</th>
                                    <th scope="col" class="py-3 px-4">Registered Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @forelse ($members as $member)
                                    <tr class="hover:bg-gray-50/75 transition-colors">
                                        <td class="py-3.5 px-4 font-mono text-xs text-gray-500">
                                            #{{ $member->id }}
                                        </td>
                                        <td class="py-3.5 px-4 font-medium text-gray-900">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs shrink-0">
                                                    {{ strtoupper(substr($member->name, 0, 1)) }}
                                                </div>
                                                <span>{{ $member->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-600">
                                            {{ $member->email }}
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-500">
                                            @if($member->phone)
                                                <span class="font-mono text-xs text-gray-700 bg-gray-50 px-2 py-0.5 rounded border border-gray-200">
                                                    {{ $member->phone }}
                                                </span>
                                            @else
                                                <span class="text-gray-400 italic text-xs">N/A</span>
                                            @endif
                                        </td>
                                        <td class="py-3.5 px-4 text-gray-500 text-xs">
                                            {{ $member->created_at ? $member->created_at->format('d M, Y') : 'N/A' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-12 text-center text-gray-400">
                                            <div class="flex flex-col items-center justify-center">
                                                <svg class="h-10 w-10 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                                <p class="text-sm font-medium text-gray-500">No members found in the database.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>