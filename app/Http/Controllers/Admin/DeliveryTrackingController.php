<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryTrackingController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch Orders (Shipped/Delivered)
        $orderQuery = Order::whereIn('status', ['shipped', 'delivered'])
            ->whereNotNull('tracking_number')
            ->with(['user', 'orderItems.product']);

        // 2. Fetch Returns/Repairs (Approved/Received/Processing/Repaired)
        // Note: Using 'approved' as 'confirmed' based on model status definitions
        $returnQuery = \App\Models\ReturnRepair::whereIn('status', ['approved', 'received', 'processing', 'repaired'])
            ->with(['user', 'order']);

        // Apply Search to both
        if ($request->filled('search')) {
            $search = $request->search;

            $orderQuery->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('tracking_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });

            $returnQuery->where(function ($q) use ($search) {
                $q->where('rma_number', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        $orders = $orderQuery->orderBy('shipped_at', 'desc')->get()->map(function ($item) {
            $item->tracking_type = 'order';

            return $item;
        });

        $returns = $returnQuery->orderBy('updated_at', 'desc')->get()->map(function ($item) {
            $item->tracking_type = 'return';

            return $item;
        });

        // Combine and Paginate (Manual pagination for simplicity in this case or just combine collections)
        $combined = $orders->concat($returns)->sortByDesc(function ($item) {
            return $item->tracking_type === 'order' ? $item->shipped_at : $item->updated_at;
        });

        // Statistics
        $stats = [
            'total_shipped' => Order::where('status', 'shipped')->whereNotNull('tracking_number')->count(),
            'total_delivered' => Order::where('status', 'delivered')->whereNotNull('tracking_number')->count(),
            'active_returns' => \App\Models\ReturnRepair::whereIn('status', ['approved', 'received', 'processing', 'repaired'])->count(),
            'in_transit' => Order::where('status', 'shipped')
                ->whereNotNull('tracking_number')
                ->whereNull('delivered_at')
                ->count(),
        ];

        // Unique carriers for filter
        $carriers = Order::whereNotNull('carrier')
            ->whereIn('status', ['shipped', 'delivered'])
            ->distinct()
            ->pluck('carrier')
            ->filter()
            ->sort()
            ->values();

        return view('admin.delivery-tracking.index', [
            'items' => $combined,
            'carriers' => $carriers,
            'stats' => $stats,
        ]);
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'fulfillment']);

        return view('admin.delivery-tracking.show', compact('order'));
    }

    public function updateTracking(Request $request, Order $order)
    {
        $request->validate([
            'tracking_number' => 'nullable|string|max:255',
            'carrier' => 'nullable|string|max:255',
            'status' => 'required|in:shipped,delivered',
        ]);

        $updateData = [
            'tracking_number' => $request->tracking_number ?? $order->tracking_number,
            'carrier' => $request->carrier ?? $order->carrier,
        ];

        if ($request->status === 'shipped' && $order->status !== 'shipped') {
            $updateData['status'] = 'shipped';
            $updateData['fulfillment_status'] = 'shipped';
            $updateData['shipped_at'] = now();
        } elseif ($request->status === 'delivered' && $order->status !== 'delivered') {
            $updateData['status'] = 'delivered';
            $updateData['fulfillment_status'] = 'delivered';
            $updateData['delivered_at'] = now();
        }

        $order->update($updateData);

        return back()->with('success', 'Tracking information updated successfully.');
    }
}
