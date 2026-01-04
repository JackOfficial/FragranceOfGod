<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        $brands = 5;
        $vehicle_models = 5;
        $parts = 5;
        $users = 5;
        $recentOrders = 5;
        $salesMonths = ["Jan", "Feb", "Mar", "Apr", "May"];
        $salesData = [120, 190, 300, 500, 200];
        $inventoryData = [300, 50, 20]; // In Stock, Low Stock, Out of Stock

        $pendingOrders = 5;
        $lowStockParts = 5;
        $recentOrders;


        return view('admin.index', compact('brands', 'parts', 'vehicle_models', 'pendingOrders', 'lowStockParts', 'recentOrders', 'users', 'recentOrders', 'salesMonths', 'salesData', 'inventoryData'));
    }
}
