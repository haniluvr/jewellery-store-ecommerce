@extends('admin.layouts.app')

@section('title', 'Appointment Details')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 bg-emerald-600 rounded-xl shadow-lg shadow-emerald-200">
                    <i data-lucide="calendar-days" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-stone-900">Appointment Details</h1>
                    <p class="mt-1 text-sm text-stone-600 italic">Reference #{{ $appointment->id }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ admin_route('appointments.index') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-stone-200 bg-white text-sm font-medium text-stone-700 transition-all duration-200 hover:bg-stone-50 hover:border-stone-300 shadow-sm">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Back to Appointments
                </a>
                
                <button type="button" 
                        onclick="window.confirmAction('Are you sure you want to delete this appointment? This action cannot be undone.', () => { document.getElementById('delete-appointment-form').submit() }, { type: 'danger', confirmText: 'Delete Appointment' })"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-red-200 bg-red-50 text-sm font-medium text-red-600 transition-all duration-200 hover:bg-red-100 shadow-sm">
                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                    Delete
                </button>
                <form id="delete-appointment-form" action="{{ admin_route('appointments.destroy', $appointment) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- Left Column - Main Content -->
        <div class="xl:col-span-2 space-y-8">
            <!-- Appointment Information -->
            <div class="bg-white rounded-2xl shadow-xl border border-stone-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-stone-200 bg-emerald-50/30">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 bg-emerald-600 rounded-xl">
                            <i data-lucide="info" class="w-5 h-5 text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-stone-900">Appointment Information</h3>
                    </div>
                    <p class="mt-1 text-sm text-stone-600">Detailed overview of the boutique visit request</p>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Service Type</p>
                            <p class="text-lg text-stone-900 dark:text-white font-medium">{{ $appointment->service_type }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Location</p>
                            <p class="text-lg text-stone-900 dark:text-white font-medium">{{ $appointment->location }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Date</p>
                            <div class="flex items-center gap-2 text-lg text-stone-900 dark:text-white font-medium">
                                <i data-lucide="calendar" class="w-5 h-5 text-emerald-600"></i>
                                {{ $appointment->appointment_date->format('F d, Y') }}
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider">Time</p>
                            <div class="flex items-center gap-2 text-lg text-stone-900 font-medium">
                                <i data-lucide="clock" class="w-5 h-5 text-emerald-600"></i>
                                {{ date('h:i A', strtotime($appointment->appointment_time)) }}
                            </div>
                        </div>
                        <div class="col-span-1 md:col-span-2 space-y-2 mt-4">
                            <p class="text-xs font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Notes from Customer</p>
                            <div class="bg-stone-50 dark:bg-gray-800/50 rounded-xl p-6 border border-stone-100 dark:border-strokedark text-stone-700 dark:text-stone-300 italic shadow-inner">
                                <i data-lucide="quote" class="w-5 h-5 text-stone-300 dark:text-stone-600 mb-2"></i>
                                {{ $appointment->notes ?: 'No specific notes were provided for this appointment.' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customer Details -->
            <div class="bg-white rounded-2xl shadow-xl border border-stone-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-stone-200 bg-stone-50">
                    <div class="flex items-center gap-3">
                        <div class="flex items-center justify-center w-10 h-10 bg-stone-800 rounded-xl text-white">
                            <i data-lucide="user" class="w-5 h-5"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-stone-900">Customer Profile</h3>
                    </div>
                    <p class="mt-1 text-sm text-stone-600">Personal and contact information for the guest</p>
                </div>
                <div class="p-8">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        <div class="h-20 w-20 bg-stone-100 rounded-2xl flex items-center justify-center shadow-sm text-stone-800 text-3xl font-bold border border-stone-200">
                            {{ strtoupper(substr($appointment->first_name, 0, 1)) }}
                        </div>
                        <div class="flex-1 text-center md:text-left space-y-1">
                            <h4 class="text-2xl font-bold text-stone-900 dark:text-white">
                                {{ $appointment->first_name }} {{ $appointment->last_name }}
                            </h4>
                            <div class="flex flex-wrap justify-center md:justify-start gap-4 text-stone-600 dark:text-gray-400">
                                <div class="flex items-center gap-1.5 transition-colors hover:text-amber-600">
                                    <i data-lucide="mail" class="w-4 h-4"></i>
                                    <span class="text-sm">{{ $appointment->email }}</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <i data-lucide="smartphone" class="w-4 h-4"></i>
                                    <span class="text-sm">Contact Number Not Provided</span>
                                </div>
                            </div>
                        </div>
                        @if($appointment->user_id)
                            <a href="{{ admin_route('users.show', $appointment->user_id) }}" 
                               class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-amber-500 to-yellow-600 px-6 py-3 text-center font-medium text-white hover:from-amber-600 hover:to-yellow-700 transition-all duration-200 shadow-lg hover:shadow-xl">
                                <i data-lucide="id-card" class="w-5 h-5 mr-2"></i>
                                Full Profile
                            </a>
                        @else
                            <div class="inline-flex items-center px-4 py-2 rounded-xl bg-stone-100 dark:bg-stone-800 text-stone-500 text-sm font-medium">
                                <i data-lucide="user-x" class="w-4 h-4 mr-2"></i>
                                Guest Booking
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Sidebar -->
        <div class="xl:col-span-1 space-y-8">
            <!-- Status Management -->
            <div class="bg-white dark:bg-boxdark rounded-2xl shadow-xl border border-stone-200 dark:border-strokedark overflow-hidden">
                <div class="px-8 py-6 border-b border-stone-200 dark:border-strokedark bg-stone-50 dark:bg-gray-800">
                    <h3 class="text-sm font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Status Management</h3>
                </div>
                <div class="p-8">
                    @php
                        $statusConfig = [
                            'pending' => ['class' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300', 'icon' => 'clock'],
                            'confirmed' => ['class' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300', 'icon' => 'check-circle'],
                            'completed' => ['class' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/40 dark:text-emerald-300', 'icon' => 'award'],
                            'cancelled' => ['class' => 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300', 'icon' => 'x-circle'],
                        ];
                        $config = $statusConfig[$appointment->status] ?? ['class' => 'bg-stone-100 text-stone-800', 'icon' => 'help-circle'];
                    @endphp
                    
                    <div class="mb-8">
                        <label class="block text-xs font-semibold text-stone-500 uppercase tracking-widest mb-3">Current Status</label>
                        <div class="flex items-center gap-3">
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-base font-bold {{ $config['class'] }} border shadow-sm">
                                <i data-lucide="{{ $config['icon'] }}" class="w-5 h-5 mr-2"></i>
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </div>
                        <p class="mt-3 text-xs text-stone-400 dark:text-gray-500 flex items-center gap-1">
                            <i data-lucide="refresh-cw" class="w-3 h-3"></i>
                            Updated {{ $appointment->updated_at->diffForHumans() }}
                        </p>
                    </div>

                    <form action="{{ admin_route('appointments.update-status', $appointment) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-stone-700 dark:text-stone-300">Quick Status Update</label>
                            <select name="status" class="w-full rounded-xl border border-stone-200 bg-white px-4 py-3 text-sm text-stone-900 focus:border-teal-500 focus:outline-none dark:border-strokedark dark:bg-boxdark dark:text-white transition-all">
                                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending Approval</option>
                                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Service Completed</option>
                                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 text-center font-medium text-white hover:bg-emerald-700 transition-all duration-200 shadow-md hover:shadow-lg">
                            Apply Changes
                        </button>
                    </form>
                </div>
            </div>

            <!-- Booking Tracking -->
            <div class="bg-white dark:bg-boxdark rounded-2xl shadow-xl border border-stone-200 dark:border-strokedark overflow-hidden">
                <div class="px-8 py-6 border-b border-stone-200 dark:border-strokedark bg-stone-50 dark:bg-gray-800">
                    <h3 class="text-sm font-semibold text-stone-500 dark:text-gray-400 uppercase tracking-wider">Audit Log</h3>
                </div>
                <div class="p-8 space-y-6">
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-8 w-8 items-center justify-center rounded-full bg-teal-100 text-teal-600 dark:bg-teal-900/30">
                            <i data-lucide="plus-circle" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-stone-900 dark:text-white">Request Received</p>
                            <p class="text-xs text-stone-500">{{ $appointment->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900/30">
                            <i data-lucide="globe" class="w-4 h-4"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-stone-900 dark:text-white">Channel Source</p>
                            <p class="text-xs text-stone-500">Website Booking Engine</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
