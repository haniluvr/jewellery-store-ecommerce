@extends('admin.layouts.app')

@section('title', 'Appointments')

@section('content')
<div class="min-h-screen bg-white dark:bg-boxdark">
    <!-- Header -->
    <div class="bg-white dark:bg-boxdark shadow-sm border-b border-stone-200 dark:border-strokedark">
        <div class="flex justify-between items-center py-6 px-4">
            <div>
                <h1 class="text-2xl font-bold text-stone-900 dark:text-white">Appointments</h1>
                <p class="mt-1 text-sm text-stone-600 dark:text-gray-400">View and manage boutique appointment bookings</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="py-6 px-4">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-5">
            <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                            <i data-lucide="calendar" class="w-5 h-5 text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Total</p>
                        <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($stats['total']) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-100 dark:bg-yellow-900/20 rounded-lg flex items-center justify-center">
                            <i data-lucide="clock" class="w-5 h-5 text-yellow-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Pending</p>
                        <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($stats['pending']) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-emerald-100 dark:bg-emerald-900/20 rounded-lg flex items-center justify-center">
                            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Confirmed</p>
                        <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($stats['confirmed']) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center">
                            <i data-lucide="award" class="w-5 h-5 text-purple-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Completed</p>
                        <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($stats['completed']) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-100 dark:bg-red-900/20 rounded-lg flex items-center justify-center">
                            <i data-lucide="x-circle" class="w-5 h-5 text-red-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-stone-500 dark:text-gray-400">Cancelled</p>
                        <p class="text-2xl font-semibold text-stone-900 dark:text-white">{{ number_format($stats['cancelled']) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="pb-6 px-4">
        <div class="bg-white dark:bg-boxdark rounded-xl shadow-sm border border-stone-200 dark:border-strokedark p-6">
            <form method="GET" action="{{ admin_route('appointments.index') }}" class="flex flex-wrap items-end gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label for="search" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-2">Search</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" 
                           placeholder="Search customer, email, service..."
                           class="w-full px-3 py-2 border border-stone-300 dark:border-strokedark rounded-lg bg-white dark:bg-boxdark text-stone-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div class="w-48">
                    <label for="status" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-2">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-stone-300 dark:border-strokedark rounded-lg bg-white dark:bg-boxdark text-stone-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="w-48">
                    <label for="date" class="block text-sm font-medium text-stone-700 dark:text-stone-300 mb-2">Date</label>
                    <input type="date" id="date" name="date" value="{{ request('date') }}" 
                           class="w-full px-3 py-2 border border-stone-300 dark:border-strokedark rounded-lg bg-white dark:bg-boxdark text-stone-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="rounded-lg bg-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-primary/90 whitespace-nowrap">
                        Filter
                    </button>
                    <a href="{{ admin_route('appointments.index') }}" class="inline-flex items-center justify-center rounded-lg border border-stone-300 dark:border-strokedark px-4 py-2.5 text-sm text-stone-700 dark:text-stone-300 hover:bg-stone-50 dark:hover:bg-graydark">
                        <i data-lucide="refresh-cw" class="h-4 w-4"></i>
                    </a>
                </div>
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
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Customer</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Service</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Date & Time</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Location</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-stone-500 dark:text-gray-400 border-b border-stone-200 dark:border-strokedark leading-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-200 dark:divide-strokedark">
                        @forelse($appointments as $appointment)
                        <tr class="hover:bg-stone-50 dark:hover:bg-graydark/50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-stone-100 dark:bg-gray-700 rounded-full flex items-center justify-center text-stone-500 dark:text-gray-400 font-bold">
                                        {{ strtoupper(substr($appointment->first_name, 0, 1)) }}
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-stone-900 dark:text-white">{{ $appointment->first_name }} {{ $appointment->last_name }}</div>
                                        <div class="text-sm text-stone-500 dark:text-gray-400">{{ $appointment->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-900 dark:text-white">{{ $appointment->service_type }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-900 dark:text-white font-medium">{{ $appointment->appointment_date->format('M d, Y') }}</div>
                                <div class="text-sm text-stone-500 dark:text-gray-400">{{ date('h:i A', strtotime($appointment->appointment_time)) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-stone-900 dark:text-white">{{ $appointment->location }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-500',
                                        'confirmed' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-500',
                                        'completed' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/20 dark:text-emerald-500',
                                        'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-500',
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$appointment->status] ?? 'bg-stone-100 text-stone-800' }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ admin_route('appointments.show', $appointment) }}" class="p-2 text-stone-600 hover:text-primary dark:text-gray-400 dark:hover:text-primary transition-colors duration-200" title="View Details">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                    <form id="delete-appointment-{{ $appointment->id }}" action="{{ admin_route('appointments.destroy', $appointment) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" 
                                                onclick="window.confirmAction('Are you sure you want to delete this appointment? This action cannot be undone.', () => document.getElementById('delete-appointment-{{ $appointment->id }}').submit(), { confirmText: 'Delete Appointment' })"
                                                class="p-2 text-red-600 hover:bg-red-50 dark:hover:bg-red-900/10 rounded-lg transition-colors duration-200" 
                                                title="Delete">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-stone-500 dark:text-gray-400">
                                <div class="flex flex-col items-center">
                                    <i data-lucide="calendar-x" class="w-12 h-12 mb-4 text-stone-300"></i>
                                    <p>No appointments found.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-stone-200 dark:border-strokedark bg-stone-50 dark:bg-graydark">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateStatus(id, status) {
        if (!confirm(`Are you sure you want to update this appointment to ${status}?`)) return;

        fetch(`{{ url('/admin/appointments') }}/${id}/status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error updating status: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating status.');
        });
    }
</script>
@endpush
@endsection
