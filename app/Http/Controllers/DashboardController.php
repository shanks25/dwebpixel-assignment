<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = JobPost::with('skills')->get();

        return Inertia::render('Dashboard', [
            'jobs' => $jobs,
        ]);
    }
}
