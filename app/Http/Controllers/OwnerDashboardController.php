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
        $totalUsers = DB::table('users')->count();
        $totalOrders = DB::table('order')->count();
        $pendingPayments = DB::table('transactionpayment')
            ->where('PaymentStatus', 'Pending')
            ->sum('PaymentAmount');  
        $activeSuppliers = DB::table('supplier')->count();

        // Additional Metrics
        $employeeCount = DB::table('employee')->count();
        $pendingPaymentRequests = DB::table('paymentrequest')->where('ApprovalStatus', 'Pending')->count();
        $pendingPurchaseRequests = DB::table('purchaserequest')->where('ApprovalStatus', 'Pending')->count();
        $bulkOrders = DB::table('bulkorder')->where('ApprovalStatus', 'Pending')->count();

        // Notifications for logged-in user
        $notifications = DB::table('notification')
            ->join('receivenotification', 'notification.NotificationID', '=', 'receivenotification.NotificationID')
            ->where('receivenotification.UserID', Auth::id())
            ->orderByDesc('notification.Date')
            ->limit(5)
            ->select('notification.*')
            ->get();

        // Announcements
        $announcements = DB::table('announcement')
            ->orderByDesc('Date')
            ->limit(5)
            ->get();

        // Feedback count
        $feedbackCount = DB::table('customerfeedback')->count();

        // Reports count 
        $dailySalesCount = DB::table('salesreport')->count();
        $productionReportCount = DB::table('productionreport')->count();
        $financialReportCount = DB::table('financialreport')->count();
        $inventoryReportCount = DB::table('inventoryreport')->count();

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
