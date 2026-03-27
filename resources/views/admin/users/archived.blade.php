@extends('admin.layouts.app')

@section('title', 'Archived Users')

@section('content')
<div class="min-h-screen">
    <!-- Header -->
    <div class="border-b border-stone-200 dark:border-strokedark">
        <div class="flex justify-between items-center py-6 px-4">
            <div>
                <h1 class="text-2xl font-bold text-stone-900 dark:text-white">Archived Users</h1>
                <p class="mt-1 text-sm text-stone-600 dark:text-gray-400">View information about users who have requested account deletion or were archived</p>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="py-6 px-4">
        <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
            <form method="GET" action="{{ admin_route('users.archived') }}" class="flex items-end gap-4 max-w-md">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-2">Search User</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" 
                           placeholder="Search by name or email..."
                           class="w-full px-3 py-2 border border-stone-300 dark:border-strokedark rounded-lg bg-white dark:bg-boxdark text-stone-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <button type="submit" class="rounded-lg bg-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-primary/90 whitespace-nowrap">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ admin_route('users.archived') }}" class="inline-flex items-center justify-center rounded-lg border border-stone-300 dark:border-strokedark px-4 py-2.5 text-sm text-stone-700 dark:text-stone-300 hover:bg-stone-50 dark:hover:bg-graydark">
                        Clear
                    </a>
                @endif
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="pb-8 px-4">
        <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-stone-50 dark:bg-graydark">
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Original User ID</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Name</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Email</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Archived At</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Reason</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-200 dark:divide-strokedark">
                        @forelse($archivedUsers as $user)
                        <tr class="hover:bg-stone-50 dark:hover:bg-graydark/50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-stone-900 dark:text-white">#{{ $user->original_user_id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-900 dark:text-white">{{ $user->first_name }} {{ $user->last_name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-500 dark:text-gray-400">{{ $user->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-500 dark:text-gray-400">{{ $user->archived_at->format('M d, Y h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-stone-900 dark:text-white">{{ $user->archive_reason ?? 'No reason provided' }}</div>
                                @if($user->archive_notes)
                                    <div class="text-xs text-stone-500 dark:text-gray-400 italic mt-1">{{ Str::limit($user->archive_notes, 50) }}</div>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-stone-500 dark:text-gray-400">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="user-minus" class="w-12 h-12 mb-4 text-stone-300"></i>
                                    <p>No archived users found.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-stone-200 dark:border-strokedark bg-stone-50 dark:bg-graydark">
                {{ $archivedUsers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
