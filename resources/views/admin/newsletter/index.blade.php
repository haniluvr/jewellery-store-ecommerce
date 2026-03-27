@extends('admin.layouts.app')

@section('title', 'Newsletter Subscriptions')

@section('content')
<div class="min-h-screen bg-white dark:bg-boxdark">
    <!-- Header -->
    <div class="bg-white dark:bg-boxdark shadow-sm border-b border-stone-200 dark:border-strokedark">
        <div class="flex justify-between items-center py-6 px-4">
            <div>
                <h1 class="text-2xl font-bold text-stone-900 dark:text-white">Newsletter Subscriptions</h1>
                <p class="mt-1 text-sm text-stone-600 dark:text-gray-400">Manage your newsletter subscriber list</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ admin_route('newsletter.export') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                    Export CSV
                </a>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="py-6 px-4">
        <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6 max-w-xs">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <i data-lucide="users" class="w-5 h-5 text-primary"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Total Subscribers</p>
                    <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($totalSubscriptions) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="pb-6 px-4">
        <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
            <form method="GET" action="{{ admin_route('newsletter.index') }}" class="flex items-end gap-4 max-w-md">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-2">Search Email</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" 
                           placeholder="Search email address..."
                           class="w-full px-3 py-2 border border-stone-300 dark:border-strokedark rounded-lg bg-white dark:bg-boxdark text-stone-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <button type="submit" class="rounded-lg bg-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-primary/90 whitespace-nowrap">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ admin_route('newsletter.index') }}" class="inline-flex items-center justify-center rounded-lg border border-stone-300 dark:border-strokedark px-4 py-2.5 text-sm text-stone-700 dark:text-stone-300 hover:bg-stone-50 dark:hover:bg-graydark">
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
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Email Address</th>
                             <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Subscription Date</th>
                             <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4 text-right">Actions</th>
                         </tr>
                     </thead>
                     <tbody class="divide-y divide-stone-200 dark:divide-strokedark">
                         @forelse($subscriptions as $subscription)
                         <tr class="hover:bg-stone-50 dark:hover:bg-graydark/50 transition-colors duration-200">
                             <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="text-sm font-medium text-stone-900 dark:text-white">{{ $subscription->email }}</div>
                             </td>
                             <td class="px-6 py-4 whitespace-nowrap">
                                 <div class="text-sm text-stone-500 dark:text-gray-400">{{ $subscription->created_at->format('M d, Y h:i A') }}</div>
                             </td>
                             <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                 <button type="button" 
                                         onclick="window.confirmAction('Are you sure you want to remove this newsletter subscription? The user will no longer receive updates.', () => { document.getElementById('delete-form-{{ $subscription->id }}').submit() }, { type: 'danger', confirmText: 'Remove Subscriber' })"
                                         class="p-2 text-red-600 hover:text-red-900 transition-colors duration-150 inline-flex items-center">
                                     <i data-lucide="trash-2" class="w-5 h-5"></i>
                                 </button>
                                 <form id="delete-form-{{ $subscription->id }}" action="{{ admin_route('newsletter.destroy', $subscription) }}" method="POST" class="hidden">
                                     @csrf
                                     @method('DELETE')
                                 </form>
                             </td>
                         </tr>
                        @empty
                        <tr>
                             <td colspan="3" class="px-6 py-12 text-center text-stone-500 dark:text-gray-400">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="mail-x" class="w-12 h-12 mb-4 text-stone-300"></i>
                                    <p>No subscribers found.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-stone-200 dark:border-strokedark bg-stone-50 dark:bg-graydark">
                {{ $subscriptions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
