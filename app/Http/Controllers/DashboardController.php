<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::get(env('EQUIPMENTS_URL') . '/count_active_by_project');
        $count_active_by_project = $response->json();
        $projects = ['017C', '021C', '022C', '023C', 'APS'];

        return view('dashboard.index', [
            'count_active_by_project' => collect($count_active_by_project),
            'projects' => $projects
        ]);
    }
}
