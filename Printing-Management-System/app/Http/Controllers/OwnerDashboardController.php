<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // Basic Metrics
        $totalUsers = DB::table('Users')->count();
        $totalOrders = DB::table('Order')->count();
        $pendingPayments = DB::table('TransactionPayment')
            ->where('PaymentStatus', 'Pending')
            ->sum('PaymentAmount');  
        $activeSuppliers = DB::table('Supplier')->count();

        // Additional Metrics
        $employeeCount = DB::table('Employee')->count();
        $pendingPaymentRequests = DB::table('PaymentRequest')->where('ApprovalStatus', 'Pending')->count();
        $pendingPurchaseRequests = DB::table('PurchaseRequest')->where('ApprovalStatus', 'Pending')->count();
        $bulkOrders = DB::table('BulkOrder')->where('ApprovalStatus', 'Pending')->count();

        // Notifications for logged-in user
        $notifications = DB::table('Notification')
            ->join('ReceiveNotification', 'Notification.NotificationID', '=', 'ReceiveNotification.NotificationID')
            ->where('ReceiveNotification.UserID', Auth::id())
            ->orderByDesc('Notification.Date')
            ->limit(5)
            ->select('Notification.*')
            ->get();

        // Announcements
        $announcements = DB::table('Announcement')
            ->orderByDesc('Date')
            ->limit(5)
            ->get();

        // Feedback count
        $feedbackCount = DB::table('CustomerFeedback')->count();

        // Reports count 
        $dailySalesCount = DB::table('SalesReport')->count();
        $productionReportCount = DB::table('ProductionReport')->count();
        $financialReportCount = DB::table('FinancialReport')->count();
        $inventoryReportCount = DB::table('InventoryReport')->count();

        return view('dashboards.owner', compact(
            'totalUsers',
            'totalOrders',
            'pendingPayments',
            'activeSuppliers',
            'employeeCount',
            'pendingPaymentRequests',
            'pendingPurchaseRequests',
            'bulkOrders',
            'notifications',
            'announcements',
            'feedbackCount',
            'dailySalesCount',
            'productionReportCount',
            'financialReportCount',
            'inventoryReportCount'
        ));
    }
}
