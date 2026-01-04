<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | KPI DATA (Replace with real models later)
        |--------------------------------------------------------------------------
        */
        $programs        = 6;   // Total NGO programs
        $beneficiaries   = 245; // Total beneficiaries reached
        $activeProjects  = 4;   // Ongoing projects
        $staff           = 18;  // Staff + volunteers

        /*
        |--------------------------------------------------------------------------
        | CHART DATA
        |--------------------------------------------------------------------------
        */
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];

        // Beneficiaries reached per month
        $impactData = [25, 40, 55, 60, 35, 70];

        // Program distribution
        $programLabels = [
            'Education',
            'Health',
            'Gender-Based Violence',
            'Economic Empowerment'
        ];

        $programStats = [120, 60, 40, 25];

        return view('admin.dashboard', compact(
            'programs',
            'beneficiaries',
            'activeProjects',
            'staff',
            'months',
            'impactData',
            'programLabels',
            'programStats'
        ));
    }
}
