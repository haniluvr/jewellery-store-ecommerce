@extends('admin.layouts.app')

@section('title', 'Customers')

@section('content')
<div class="min-h-screen">
    <!-- Header -->
    <div class="border-b border-stone-200">
        <div class="flex justify-between items-center py-6">
            <div>
                <h1 class="text-2xl font-bold text-stone-900">Customers</h1>
                <p class="mt-1 text-sm text-stone-600">Manage your customer accounts and information</p>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="openExportModal()" class="inline-flex items-center px-4 py-2 border border-stone-300 rounded-lg text-sm font-medium text-stone-700 bg-white hover:bg-stone-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export
                </button>
                <a href="{{ admin_route('users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add Customer
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="py-6">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
        </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500">Total Customers</p>
                        <p class="text-2xl font-semibold text-stone-900">{{ number_format($stats['total_users']) }}</p>
            </div>
        </div>
    </div>

            <!-- Active Users -->
            <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
        </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500">Active</p>
                        <p class="text-2xl font-semibold text-stone-900">{{ number_format($stats['active_users']) }}</p>
                    </div>
                </div>
            </div>

            <!-- Inactive Users -->
            <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500">Inactive</p>
                        <p class="text-2xl font-semibold text-stone-900">{{ number_format($stats['inactive_users']) }}</p>
            </div>
        </div>
    </div>

    <!-- Recent Registrations -->
            <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500">New (30 days)</p>
                        <p class="text-2xl font-semibold text-stone-900">{{ number_format($stats['recent_registrations']) }}</p>
                    </div>
        </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="pb-6">
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 p-6">
            <form method="GET" action="{{ admin_route('users.index') }}" class="flex flex-wrap items-end gap-4 justify-between">
                <div class="flex-1 min-w-[200px]">
                    <label for="search" class="block text-sm font-medium text-stone-700 mb-2">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" 
                           placeholder="Search customers..."
                           class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label for="status" class="block text-sm font-medium text-stone-700 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="all">All Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="suspended" {{ request('status') === 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label for="registration_method" class="block text-sm font-medium text-stone-700 mb-2">Registration Method</label>
                    <select id="registration_method" name="registration_method" class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="all">All Methods</option>
                        <option value="email" {{ request('registration_method') === 'email' ? 'selected' : '' }}>Email</option>
                        <option value="google" {{ request('registration_method') === 'google' ? 'selected' : '' }}>Google</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="rounded-lg bg-emerald-600 px-6 py-2.5 text-sm font-medium text-white hover:bg-emerald-700 whitespace-nowrap">
                        Filter
                    </button>
                    <a href="{{ admin_route('users.index') }}" class="inline-flex items-center justify-center rounded-lg border border-stone-300 px-4 py-2.5 text-sm hover:bg-stone-50">
                        <i data-lucide="x" class="h-4 w-4"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Customers List -->
    <div class="pb-8">
        <div class="bg-white rounded-xl shadow-sm border border-stone-200">
            @if($all_customers->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-stone-200">
                        <thead class="bg-stone-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Orders</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Method</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-stone-200">
                            @foreach($all_customers as $user)
                                <tr class="hover:bg-stone-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                                    <span class="text-emerald-600 font-medium text-sm">
                        {{ substr($user->first_name, 0, 1) }}{{ substr($user->last_name, 0, 1) }}
                    </span>
                </div>
                </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-stone-900">{{ $user->first_name }} {{ $user->last_name }}</div>
                                                <div class="text-sm text-stone-500">{{ $user->phone ?? 'No phone' }}</div>
            </div>
        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-stone-900">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
            @if($user->is_suspended)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                Suspended
            </span>
            @elseif($user->email_verified_at)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                Active
            </span>
            @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                Inactive
            </span>
            @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-900">
                                        {{ $user->orders_count ?? 0 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-stone-900">
                                        {{ $user->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
            @if($user->google_id)
            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                                </svg>
                                                <span class="text-xs text-stone-500">Google</span>
            </div>
            @else
            <div class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                </svg>
                                                <span class="text-xs text-stone-500">Email</span>
            </div>
            @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3" x-data="{ dropdownOpen: false }">
                                            <a href="{{ admin_route('users.show', $user) }}" class="p-2 text-stone-600 hover:text-emerald-600 transition-colors" title="View Profile">
                                                <i data-lucide="eye" class="w-4.5 h-4.5"></i>
                                            </a>
                                            
                                            <div class="relative">
                                                <button @click.stop="dropdownOpen = !dropdownOpen" 
                                                        type="button"
                                                        class="p-2 text-stone-600 hover:text-emerald-600 transition-colors rounded-lg hover:bg-stone-100 flex items-center justify-center"
                                                        :class="{ 'bg-stone-100 text-emerald-600': dropdownOpen }">
                                                    <i data-lucide="more-vertical" class="w-4.5 h-4.5"></i>
                                                </button>

                                                <!-- Dropdown Menu -->
                                                <div x-show="dropdownOpen" 
                                                     x-cloak
                                                     @click.outside="dropdownOpen = false"
                                                     x-transition:enter="transition ease-out duration-100"
                                                     x-transition:enter-start="opacity-0 scale-95"
                                                     x-transition:enter-end="opacity-100 scale-100"
                                                     style="display: none;"
                                                     class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-2xl border border-stone-200 z-[100] py-2 origin-top-right">
                                                    
                                                    <a href="{{ admin_route('users.edit', $user) }}" class="flex items-center px-4 py-2 text-sm text-stone-600 hover:bg-stone-50 hover:text-emerald-600">
                                                        <i data-lucide="edit-2" class="w-4 h-4 mr-3"></i>
                                                        Edit Customer
                                                    </a>

                                                    @if($user->is_suspended)
                                                        <button type="button" 
                                                                onclick="window.confirmAction('Are you sure you want to unsuspend this customer?', () => { document.getElementById('unsuspend-form-{{ $user->id }}').submit() }, { type: 'success', confirmText: 'Unsuspend' })"
                                                                class="w-full flex items-center px-4 py-2 text-sm text-green-600 hover:bg-green-50">
                                                            <i data-lucide="unlock" class="w-4 h-4 mr-3"></i>
                                                            Unsuspend
                                                        </button>
                                                        <form id="unsuspend-form-{{ $user->id }}" action="{{ admin_route('users.unsuspend', $user) }}" method="POST" class="hidden">@csrf</form>
                                                    @else
                                                        <button type="button" 
                                                                onclick="window.confirmAction('Are you sure you want to suspend this customer? They will not be able to log in or place orders.', () => { document.getElementById('suspend-form-{{ $user->id }}').submit() }, { type: 'warning', confirmText: 'Suspend' })"
                                                                class="w-full flex items-center px-4 py-2 text-sm text-amber-600 hover:bg-amber-50">
                                                            <i data-lucide="lock" class="w-4 h-4 mr-3"></i>
                                                            Suspend
                                                        </button>
                                                        <form id="suspend-form-{{ $user->id }}" action="{{ admin_route('users.suspend', $user) }}" method="POST" class="hidden">@csrf</form>
                                                    @endif

                                                    @if(!$user->email_verified_at)
                                                        <form action="{{ admin_route('users.verify-email', $user) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-blue-600 hover:bg-blue-50">
                                                                <i data-lucide="mail-check" class="w-4 h-4 mr-3"></i>
                                                                Verify Email
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <div class="h-px bg-stone-100 my-2"></div>

                                                    <button type="button" 
                                                            onclick="window.confirmAction('Are you sure you want to delete this customer? This action is irreversible.', () => { document.getElementById('delete-form-{{ $user->id }}').submit() }, { type: 'danger', confirmText: 'Delete Customer' })"
                                                            class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                                        <i data-lucide="trash-2" class="w-4 h-4 mr-3"></i>
                                                        Delete Customer
                                                    </button>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ admin_route('users.destroy', $user) }}" method="POST" class="hidden">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($all_customers->hasPages())
                    @include('admin.partials.pagination', ['paginator' => $all_customers])
                @endif
            @else
                <div class="p-8 text-center">
                    <div class="mx-auto h-12 w-12 rounded-full bg-stone-100 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <p class="text-stone-500">No customers found</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Export Modal -->
<div id="exportModal" class="fixed inset-0 z-[9999] hidden overflow-y-auto">
    <div class="flex min-h-screen items-center justify-center p-4">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div class="relative w-full max-w-md rounded-2xl bg-white p-6 shadow-xl">
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-stone-900">Export Customers</h3>
                <p class="text-sm text-stone-600">Choose the format and filters for your export</p>
            </div>
            
            <form action="{{ admin_route('users.export') }}" method="GET">
                <div class="mb-4">
                    <label for="format" class="block text-sm font-medium text-stone-700 mb-2">Export Format</label>
                    <select id="format" name="format" class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="csv">CSV</option>
                        <option value="xlsx">Excel (XLSX)</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="status_filter" class="block text-sm font-medium text-stone-700 mb-2">Status Filter</label>
                    <select id="status_filter" name="status" class="w-full px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="all">All Customers</option>
                        <option value="active">Active Only</option>
                        <option value="inactive">Inactive Only</option>
                        <option value="suspended">Suspended Only</option>
                    </select>
                </div>
                
                <div class="mb-6">
                    <label for="date_from" class="block text-sm font-medium text-stone-700 mb-2">Date Range (Optional)</label>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="date" id="date_from" name="date_from" class="px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                        <input type="date" id="date_to" name="date_to" class="px-3 py-2 border border-stone-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
            </div>
            
            <div class="flex gap-3">
                    <button type="button" onclick="closeExportModal()" class="flex-1 rounded-lg border border-stone-200 bg-white px-4 py-2 text-sm font-medium text-stone-700 hover:bg-stone-50">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 rounded-lg bg-emerald-600 px-4 py-2 text-sm font-medium text-white hover:bg-emerald-700">
                    Export
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openExportModal() {
        document.getElementById('exportModal').classList.remove('hidden');
    document.body.classList.add('modal-open');
    }
    
    function closeExportModal() {
        document.getElementById('exportModal').classList.add('hidden');
    document.body.classList.remove('modal-open');
}

// Close modal when clicking outside
document.getElementById('exportModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeExportModal();
    }
});
</script>
@endpush
@endsection